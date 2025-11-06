<?php
require_once 'config.php';
$conn = getConnection();
$sql = "SELECT p.*, m.nombre as nombre_autor, m.apellidos as apellidos_autor 
        FROM proyectos p 
        LEFT JOIN miembro m ON p.autor = m.matricula 
        ORDER BY p.fecha_inicio DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CodeLab - Proyectos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>📁 Proyectos CodeLab</h1>
            <a href="crear.php" class="btn btn-primary">+ Nuevo Proyecto</a>
        </header>
        <?php if (isset($_GET['mensaje'])): ?>
            <div class="alert alert-success">
                <?php 
                    if ($_GET['mensaje'] == 'creado') echo '✅ Proyecto creado';
                    if ($_GET['mensaje'] == 'actualizado') echo '✅ Proyecto actualizado';
                    if ($_GET['mensaje'] == 'eliminado') echo '✅ Proyecto eliminado';
                ?>
            </div>
        <?php endif; ?>
        <div class="proyectos-grid">
            <?php if ($result && $result->num_rows > 0): while($proyecto = $result->fetch_assoc()): ?>
                <div class="proyecto-card">
                    <?php if (!empty($proyecto['imagen'])): ?>
                        <div class="proyecto-imagen">
                            <img src="<?php echo htmlspecialchars($proyecto['imagen']); ?>" alt="Proyecto">
                        </div>
                    <?php endif; ?>
                    <div class="proyecto-header">
                        <h2><?php echo htmlspecialchars($proyecto['nombre']); ?></h2>
                        <span class="estado estado-<?php echo $proyecto['estatus']; ?>">
                            <?php echo ucfirst($proyecto['estatus']); ?>
                        </span>
                    </div>
                    <div class="proyecto-body">
                        <p class="descripcion"><?php echo htmlspecialchars($proyecto['descripcion'] ?: 'Sin descripción'); ?></p>
                        <?php if ($proyecto['nombre_autor']): ?>
                            <div class="autor"><strong>👤</strong> <?php echo htmlspecialchars($proyecto['nombre_autor'] . ' ' . $proyecto['apellidos_autor']); ?></div>
                        <?php endif; ?>
                        <div class="fecha"><strong>📅</strong> <?php echo date('d/m/Y', strtotime($proyecto['fecha_inicio'])); ?></div>
                    </div>
                    <div class="proyecto-footer">
                        <a href="ver.php?id=<?php echo $proyecto['idProyecto']; ?>" class="btn btn-info">Ver</a>
                        <a href="editar.php?id=<?php echo $proyecto['idProyecto']; ?>" class="btn btn-warning">Editar</a>
                        <a href="eliminar.php?id=<?php echo $proyecto['idProyecto']; ?>" class="btn btn-danger" onclick="return confirm('¿Eliminar?')">Eliminar</a>
                    </div>
                </div>
            <?php endwhile; else: ?>
                <div class="no-proyectos">
                    <p>📭 No hay proyectos.</p>
                    <a href="crear.php" class="btn btn-primary">Crear proyecto</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
<?php $conn->close(); ?>