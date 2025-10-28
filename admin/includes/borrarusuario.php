<?php
require "../../includes/conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el ID del miembro a borrar
    $id_miembro = $_POST['id_miembro'];

    // Preparar la consulta para borrar el miembro
    $stmt = $conn->prepare("DELETE FROM miembro WHERE id = ?");
    $stmt->bind_param("i", $id_miembro);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Miembro borrado correctamente.";
    } else {
        echo "Error al borrar el miembro: " . $stmt->error;
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
} else {
    header("Location: index.html");
}
mysqli_close($conn);
?>