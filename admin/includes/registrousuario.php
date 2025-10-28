<?php
include "../../includes/conexion.php";
// Registro de miembros desde el panel administrativo
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $matricula = isset($_POST['matricula']);
    $nombre = isset($_POST['nombre']);
    $apellidos = isset($_POST['apellidos']);
    $correo = isset($_POST['correo']);
    $cuatrimestre = isset($_POST['cuatrimestre']);
    $password = isset($_POST['password']);
    $rol = isset($_POST['rol']);
    $sugerencia = isset($_POST['sugerencia']);


    // Preparar la consulta
    $sql = "INSERT INTO miembro (matricula, nombre, apellidos, correo, password, rol, sugerencia) VALUES ('$matricula', '$nombre', '$apellidos', '$correo', '$password', '$rol', '$sugerencia')";

    if(mysqli_query($conn, $sql)){
        echo "Miembro registrado correctamente";

    } else {
        echo "Error al registrar el miembro: " . mysqli_error($conn);
    }

} else {
    header("Location: ../../index.html");
}

mysqli_close($conn);
?>
