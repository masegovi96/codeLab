<?php
// Configuración de la base de datos
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', ''); // En XAMPP por defecto la contraseña está vacía
define('DB_NAME', 'codelab');

// Crear conexión
function getConnection() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    // Verificar conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }
    
    // Establecer charset UTF-8
    $conn->set_charset("utf8mb4");
    
    return $conn;
}

// Función para limpiar datos de entrada
function limpiarDato($dato) {
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato);
    return $dato;
}

// Función para sanitizar nombres de archivo
function sanitizarNombreArchivo($nombre) {
    // Obtener la extensión
    $extension = pathinfo($nombre, PATHINFO_EXTENSION);
    $nombreSinExt = pathinfo($nombre, PATHINFO_FILENAME);
    
    // Remover caracteres especiales y espacios
    $nombreSinExt = preg_replace('/[^A-Za-z0-9_-]/', '_', $nombreSinExt);
    
    // Limitar longitud
    $nombreSinExt = substr($nombreSinExt, 0, 50);
    
    // Retornar nombre limpio con timestamp
    return uniqid() . '_' . $nombreSinExt . '.' . $extension;
}
?>
