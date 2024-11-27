<?php
$servidor = 'localhost'; // Tu servidor de base de datos (localhost si es en tu máquina)
$usuario = 'root'; // Usuario de la base de datos
$contraseña = ''; // Contraseña de la base de datos (deja vacío si no tienes)
$base_de_datos = 'paraescolares'; // El nombre de la base de datos

// Crear conexión
$conexion = new mysqli($servidor, $usuario, $contraseña, $base_de_datos);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>
