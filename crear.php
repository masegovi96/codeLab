<?php
require_once 'config.php';
$errores = [];
$conn = getConnection();
$stmt_miembros = $conn->query("SELECT matricula, nombre, apellidos FROM miembro ORDER BY nombre");
$miembros = $stmt_miembros->fetch_all(MYSQLI_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = limpiarDato($_POST['nombre'] ?? '');
    $autor = intval($_POST['autor'] ?? 0);
    $descripcion = limpiarDato($_POST['descripcion'] ?? '');
    $colaboradores = limpiarDato($_POST['colaboradores'] ?? '');
    $fecha_inicio = $_POST['fecha_inicio'] ?? '';
    $fecha_finalizacion = $_POST['fecha_finalizacion'] ?? '';
    $estatus = $_POST['estatus'] ?? 'desarrollo';
    
    if (empty($nombre)) $errores[] = "El nombre del proyecto es obligatorio";
    if ($autor == 0) $errores[] = "Debes seleccionar un autor";
    if (empty($fecha_inicio)) $errores[] = "La fecha de inicio es obligatoria";
    
    $imagen = '';
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $archivo = $_FILES['imagen'];
        $extension = strtolower(pathinfo($archivo['name'], PATHINFO_EXTENSION));
        if (in_array($extension, ['jpg', 'jpeg', 'png'])) {
            $nombre_unico = sanitizarNombreArchivo($archivo['name']);
            if (!is_dir('uploads/imagenes')) mkdir('uploads/imagenes', 0777, true);
            if (move_uploaded_file($archivo['tmp_name'], 'uploads/imagenes/' . $nombre_unico)) {
                $imagen = 'uploads/imagenes/' . $nombre_unico;
            }
        }
    }
    
    if (empty($errores)) {
        $stmt = $conn->prepare("INSERT INTO proyectos (nombre, autor, descripcion, imagen, colaboradores, fecha_inicio, fecha_finalizacion, estatus) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sissssss", $nombre, $autor, $descripcion, $imagen, $colaboradores, $fecha_inicio, $fecha_finalizacion, $estatus);
        if ($stmt->execute()) {
            header("Location: index.php?mensaje=creado");
            exit();
        }
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Proyecto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>➕ Crear Nuevo Proyecto</h1>
            <a href="index.php" class="btn btn-secondary">← Volver</a>
        </header>
        <?php if (!empty($errores)): ?>
            <div class="alert alert-error"><ul><?php foreach ($errores as $error): ?><li><?php echo $error; ?></li><?php endforeach; ?></ul></div>
        <?php endif; ?>
        <div class="form-container">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nombre del Proyecto *</label>
                    <input type="text" name="nombre" value="<?php echo $_POST['nombre'] ?? ''; ?>" required>
                </div>
                <div class="form-group">
                    <label>Autor *</label>
                    <select name="autor" required>
                        <option value="">Selecciona un autor</option>
                        <?php foreach ($miembros as $miembro): ?>
                            <option value="<?php echo $miembro['matricula']; ?>"><?php echo htmlspecialchars($miembro['nombre'] . ' ' . $miembro['apellidos']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Descripción</label>
                    <textarea name="descripcion" rows="4" maxlength="280"><?php echo $_POST['descripcion'] ?? ''; ?></textarea>
                </div>
                <div class="form-group">
                    <label>Colaboradores</label>
                    <input type="text" name="colaboradores" value="<?php echo $_POST['colaboradores'] ?? ''; ?>">
                </div>
                <div class="form-group">
                    <label>Imagen del Proyecto</label>
                    <input type="file" name="imagen" accept="image/*">
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Fecha de Inicio *</label>
                        <input type="date" name="fecha_inicio" required>
                    </div>
                    <div class="form-group">
                        <label>Fecha de Finalización</label>
                        <input type="date" name="fecha_finalizacion">
                    </div>
                </div>
                <div class="form-group">
                    <label>Estatus</label>
                    <select name="estatus">
                        <option value="desarrollo">En Desarrollo</option>
                        <option value="finalizado">Finalizado</option>
                    </select>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">💾 Guardar</button>
                    <a href="index.php" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>