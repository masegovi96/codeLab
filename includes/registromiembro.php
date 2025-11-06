<?php
include "conexion.php";

// Registro de miembros
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $matricula = $_POST['matricula'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['email-institucional'];
    $cuatrimestre = $_POST['opciones-cuatrimestre'];
    $password = $_POST['contraseña'];
    $rol = $_POST['opciones-rol'];

    // Validar que los campos no estén vacíos
    if (empty($matricula) || empty($nombre) || empty($apellidos) || empty($correo) || empty($cuatrimestre) || empty($password) || empty($rol)) {
        echo "<script>alert('Todos los campos son obligatorios'); window.history.back();</script>";
        exit();
    }

    // Hashear la contraseña para mayor seguridad
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Preparar la consulta con prepared statements (seguridad contra SQL injection)
    $stmt = $conn->prepare("INSERT INTO miembro (matricula, nombre, apellidos, correo, cuatrimestre, password, rol) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $matricula, $nombre, $apellidos, $correo, $cuatrimestre, $password_hash, $rol);

    if($stmt->execute()){
        echo "<script>alert('¡Miembro registrado correctamente!'); window.location.href='../index.php';</script>";
    } else {
        echo "<script>alert('Error al registrar el miembro: " . $conn->error . "'); window.history.back();</script>";
    }

    $stmt->close();

} else {
    header("Location: ../registro.html");
}

mysqli_close($conn);
?>
