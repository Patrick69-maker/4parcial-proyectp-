<?php
include 'db.php'; // Asegúrate de que 'db.php' contenga la conexión a la base de datos

// Verificar si la conexión fue exitosa
if ($conexion->connect_error) {
    // Si hay error de conexión, muestra el mensaje de error
    echo "Error al conectar a la base de datos: " . $conexion->connect_error;
} else {
    // Si la conexión es exitosa
    echo "Conexión exitosa a la base de datos.";
}
?>
