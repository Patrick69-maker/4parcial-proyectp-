<?php
session_start();

// Verificar si el usuario es administrador
if (!isset($_SESSION['id']) || $_SESSION['tipo_usuario'] != 'administrador') {
    header('Location: login.html');
    exit();
}

include 'db.php';

// Consultar todas las actividades
$sql = "SELECT id, nombre_actividad FROM actividades";
$resultado = $conexion->query($sql);

if (!$resultado) {
    die("Error en la consulta a la base de datos: " . $conexion->error);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Actividades</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Estilo para la tabla de actividades */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #f2f2f2;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        a {
            color: #d9534f;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        p {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Gestionar Actividades</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre de Actividad</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($actividad = $resultado->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $actividad['id']; ?></td>
                        <td><?php echo htmlspecialchars($actividad['nombre_actividad'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>
                            <!-- Confirmación antes de eliminar -->
                            <a href="eliminar_actividad.php?id=<?php echo $actividad['id']; ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar esta actividad?');">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <p><a href="agregar_actividad.php">Agregar Nueva Actividad</a></p>
        <p><a href="panel_administrador.php">Volver al Panel de Administración</a></p>
    </div>
</body>
</html>

<?php
$conexion->close();
?>
