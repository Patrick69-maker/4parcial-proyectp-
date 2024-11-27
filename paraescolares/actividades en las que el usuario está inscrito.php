<?php
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: login.html');
    exit();
}

include 'db.php';

$usuario_id = $_SESSION['id']; // ID del usuario logueado

// Consultar las actividades en las que el usuario está inscrito
$sql = "SELECT a.nombre_actividad 
        FROM actividades a 
        INNER JOIN inscripciones i ON a.id = i.actividad_id 
        WHERE i.usuario_id = ?";
$stmt = $conexion->prepare($sql);

if (!$stmt) {
    die('Error en la preparación de la consulta: ' . $conexion->error);
}

$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Actividades</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 50px auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #3f51b5;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            font-size: 1.2em;
            margin: 10px 0;
            background-color: #e0f7fa;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        p {
            color: #555;
            font-size: 1.1em;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Actividades en las que estás inscrito</h2>
        <ul>
            <?php 
            if ($result->num_rows > 0) {
                // Mostrar las actividades
                while ($actividad = $result->fetch_assoc()) {
                    echo "<li>" . htmlspecialchars($actividad['nombre_actividad'], ENT_QUOTES, 'UTF-8') . "</li>";
                }
            } else {
                echo "<p>No estás inscrito en ninguna actividad.</p>";
            }
            ?>
        </ul>
    </div>
</body>
</html>

<?php
$stmt->close();  // Cerrar la declaración correctamente
$conexion->close();  // Cerrar la conexión a la base de datos
?>
