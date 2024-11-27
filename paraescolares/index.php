<!-- index.php -->
<?php
// Aquí podrías tener lógica PHP si la necesitas
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Sistema de Paraescolares</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #e0f7fa, #f1f8e9);
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .index-container {
            text-align: center;
            background-color: #ffffff;
            padding: 50px 70px;
            border-radius: 12px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            width: 100%;
        }

        h1 {
            font-size: 2.5em;
            color: #3f51b5;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.2em;
            color: #555;
            margin-bottom: 30px;
        }

        .buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        button {
            padding: 12px 30px;
            margin: 10px;
            font-size: 1em;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
            color: #fff;
            box-shadow: 0 4px 8px rgba(63, 81, 181, 0.3);
        }

        button#login-btn {
            background-color: #3f51b5;
        }

        button#login-btn:hover {
            background-color: #303f9f;
        }

        button#register-btn {
            background-color: #673ab7;
        }

        button#register-btn:hover {
            background-color: #5e35b1;
        }
    </style>
</head>
<body>
    <div class="index-container">
        <h1>Bienvenido al Sistema de Paraescolares</h1>
        <p>Gestiona y controla tus actividades extraescolares de forma rápida y segura.</p>
        <div class="buttons">
            <a href="registro.html"><button id="register-btn"><i class="fas fa-user-plus"></i> Registro</button></a>
            <a href="login.html"><button id="login-btn"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</button></a>
        </div>
    </div>
</body>
</html>
