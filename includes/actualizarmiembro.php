<?php
require "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $id_miembro = $_POST['id_miembro'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];
    $rol = $_POST['rol'];

    // Actualizar los datos
    if (!empty($password)) {
        // Hashear la nueva contraseña si se proporciona
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE miembro SET nombre = ?, apellidos = ?, correo = ?, password = ?, rol = ? WHERE id = ?");
        $stmt->bind_param("sssssi", $nombre, $apellidos, $correo, $hashed_password, $rol, $id_miembro);
    } else {
        // Si no se proporciona una nueva contraseña, no se actualiza
        $stmt = $conn->prepare("UPDATE miembro SET nombre = ?, apellidos = ?, correo = ?, rol = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $nombre, $apellidos, $correo, $rol, $id_miembro);
    }

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Miembro actualizado correctamente.";
    } else {
        echo "Error al actualizar el miembro: " . $stmt->error;
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
} else {
    header("Location: ../../index.html");
}