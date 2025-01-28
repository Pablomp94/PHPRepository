<?php
$error = null;
// Verificamos si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST['username'];
    

    //Encriptamos la contraseña
    $contraseñaEncriptada = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Validamos las credenciales
    if (!empty($username) && !empty($contraseñaEncriptada)) {

        //Guardamos las credenciales en el archivo de texto
        $archivo = fopen("baseDatos.txt", "w");
        $texto = $username . "\n" . $contraseñaEncriptada;
        fwrite($archivo, $texto);
        fclose($archivo);

        // Esperamos 3 segundos y luego redirigimos a la página protegida
        header("refresh:3;url=baseLogin.php");
    } else {
        // Si las credenciales son incorrectas, mostramos mensaje de error
        $error = "<h2 class = error>Usuario o contraseña en blanco.</h2>";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registrar Sesión</title>
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

        h1 {
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
            background-color: lightpink; 
            border: 2px solid black;
            padding: 12px;
            width: 100%;
            border-radius: 4px;
            font-size: 18px;
            text-align: center;
            disoplay: block;
            box-sizing: border-box;
        }
    </style>
    <body>

        <h1>FORMULARIO DE REGISTRO</h1></br>
        <!-- Formulario que se procesa en el mismo archivo -->
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            
            <!-- Campo para el nombre de usuario -->
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username">

            <!-- Campo para la contraseña -->
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password">

            <span><?php echo $error ?></span>
            <!-- Botón para enviar el formulario -->
            <input type="submit" value="Registrar sesión">
        </form>

    </body>
</html>
