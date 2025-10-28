<?php
include "conexion.php";
// Registro de miembros
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $matricula = isset($_POST['matricula']);
    $nombre = isset($_POST['nombre']);
    $apellidos = isset($_POST['apellidos']);
    $correo = isset($_POST['correo']);
    $cuatrimestre = isset($_POST['cuatrimestre']);
    $password = isset($_POST['password']);
    $sugerencia = isset($_POST['sugerencia']);
    $rol = "miembro";


    // Preparar la consulta
    $sql = "INSERT INTO miembro (matricula, nombre, apellidos, correo, password, rol) VALUES ('$matricula', '$nombre', '$apellidos', '$correo', '$password', '$rol')";

    if(mysqli_query($conn, $sql)){
        echo "Miembro registrado correctamente";

    } else {
        echo "Error al registrar el miembro: " . mysqli_error($conn);
    }

} else {
    header("Location: index.html");
}

mysqli_close($conn);
?>
