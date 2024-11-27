<?php
session_start();
include 'db.php'; // Incluir la conexión a la base de datos

// Mostrar errores para depuración (desactiva esta línea en producción)
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    $tipo_usuario = 'estudiante'; // Puedes cambiarlo a 'administrador' si es necesario

    // Verificar si el correo ya está registrado
    $sql_check = "SELECT * FROM usuarios WHERE correo = ?";
    $stmt_check = $conexion->prepare($sql_check);
    $stmt_check->bind_param("s", $correo);
    $stmt_check->execute();
    $resultado_check = $stmt_check->get_result();

    if ($resultado_check->num_rows > 0) {
        echo "El correo ya está registrado. <a href='login.html'>Iniciar sesión</a>";
    } else {
        // Hashear la contraseña
        $contraseña_hash = password_hash($contraseña, PASSWORD_BCRYPT);

        // Insertar el nuevo usuario
        $sql = "INSERT INTO usuarios (correo, contraseña, tipo_usuario) VALUES (?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sss", $correo, $contraseña_hash, $tipo_usuario);
        if ($stmt->execute()) {
            echo "Registro exitoso. <a href='login.html'>Iniciar sesión</a>";
        } else {
            echo "Error al registrar el usuario. <a href='registro.html'>Intentar de nuevo</a>";
        }
        $stmt->close();
    }

    // Cerrar la conexión
    $conexion->close();
}
?>
