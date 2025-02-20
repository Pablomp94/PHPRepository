<?php
$error = "";

// Verificamos si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $nombreUsuario = $_POST['nombreUsuario'];
    $contraseña = $_POST['Contraseña'];

    
    
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Iniciar Sesión</title>
    </head>
    <style>

        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background-color: lightgray;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1{
            color: #333;
            text-align: center;
            margin: 20px;
        }

        /* Formulario */
        form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            margin-top: 20px;
        }

        label {
            font-size: 18px;
            margin-bottom: 10px;
            display: block;
            color: #333;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 4px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: darkgreen;
        }

        .error {
            color: red;
            font-size: 16px;
            text-align: center;
        }

    </style>
    <body>
        <h1>FORMULARIO DE LOGIN<h1>
                <!-- Formulario que se procesa en el mismo archivo -->
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <!-- Campo para el nombre de usuario -->
                    <label for="username">Nombre de Usuario:</label>
                    <input type="text" id="nombreUsuario" name="nombreUsuario">

                    <!-- Campo para la contraseña -->
                    <label for="password">Contraseña:</label>
                    <input type="password" id="Contraseña" name="Contraseña">

                    <span><?php echo $error ?></span>
                    <!-- Botón para enviar el formulario -->
                    <input type="submit" value="Iniciar sesión">
                </form>
                </body>
                </html>
