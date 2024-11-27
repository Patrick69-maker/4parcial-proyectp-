<?php
session_start();

// Verificar si el usuario es administrador
if (!isset($_SESSION['id']) || $_SESSION['tipo_usuario'] != 'administrador') {
    header('Location: login.html');
    exit();
}

include 'db.php';

// Verificar si el parámetro 'id' está presente y es un número válido
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_usuario = $_GET['id'];

    // Preparar la consulta para eliminar el usuario
    $sql = "DELETE FROM usuarios WHERE id = ?";
    $stmt = $conexion->prepare($sql);

    if ($stmt === false) {
        die('Error en la preparación de la consulta: ' . $conexion->error);
    }

    $stmt->bind_param("i", $id_usuario);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Redirigir a la página de gestión de usuarios después de la eliminación
        header("Location: gestionar_usuarios.php?mensaje=Usuario eliminado con éxito");
        exit();
    } else {
        echo "Error al eliminar el usuario. <a href='gestionar_usuarios.php'>Volver</a>";
    }

    // Cerrar la declaración
    $stmt->close();
} else {
    echo "No se ha especificado un usuario válido para eliminar.";
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
