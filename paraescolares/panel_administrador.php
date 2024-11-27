<?php
session_start();

// Verificar si el usuario es administrador
if (!isset($_SESSION['id']) || $_SESSION['tipo_usuario'] != 'administrador') {
    header('Location: login.html');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 50px auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #3f51b5;
        }

        p {
            font-size: 1.1em;
            color: #555;
        }

        nav {
            margin-top: 20px;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            margin: 10px 0;
        }

        nav ul li a {
            text-decoration: none;
            color: #ffffff;
            background-color: #3f51b5;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        nav ul li a:hover {
            background-color: #303f9f;
        }

        nav ul li a.logout {
            background-color: #e91e63;
        }

        nav ul li a.logout:hover {
            background-color: #c2185b;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Panel de Administración</h2>
        <p>Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre'], ENT_QUOTES, 'UTF-8'); ?> (Administrador)</p>
        <nav>
            <ul>
                <li><a href="gestionar_usuarios.php">Gestionar Usuarios</a></li>
                <li><a href="gestionar_actividades.php">Gestionar Actividades</a></li>
                <li><a href="informes.php">Ver Informes</a></li>
                <li><a href="agregar_actividad.php">Agregar Nueva Actividad</a></li>
                <li><a href="logout.php" class="logout">Cerrar sesión</a></li>
            </ul>
        </nav>
    </div>
</body>
</html>
