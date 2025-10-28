<!-- Procesar Login Admin -->
<?php
session_start();
include "../../includes/conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $username = $_POST['correo'];
    $password = $_POST['contrasena'];

    $sql = "SELECT * FROM miembro WHERE correo = '$username' AND contrasena = '$password'";

    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);

        if ($password === $fila['password']) {
            $_SESSION['id'] = $fila['id'];
            $_SESSION['correo'] = $fila['correo'];
            $_SESSION['nombre'] = $fila['nombre'];
            $_SESSION['apellido'] = $fila['apellidos'];
            $_SESSION['rol'] = $fila['rol'];

            exit();
        } else {
            echo "Contraseña incorrecta";
        }
    } else {
        echo "Correo no encontrado";
    }
} else {
    // Redirigir si no es una solicitud POST
    header("Location: login.php");
    exit();
}

mysqli_close($conn);

?>