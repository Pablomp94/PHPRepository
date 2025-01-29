<?php
$error = "";

// Verificamos si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $num = $_POST["numero"];

    session_start();

    $_SESSION["numero"] = $num;
    
    
    if($_SESSION["numero"] != null){
        
    }
    
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Introducir numero</title>
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


        input[type="number"] {
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
        <h1>JUEGO DE ADIVINAR EL NUMERO<h1>
                <!-- Formulario que se procesa en el mismo archivo -->
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <!-- Campo para el nombre de usuario -->
                    <label for="username">INTRODUCE UN NUMERO A ADIVINAR:</label>
                    <input type="number" id="numero" name="numero">


                    <span><?php echo $error ?></span>
                    <!-- Botón para enviar el formulario -->
                    <input type="submit" value="Introducir Numero">
                </form>
                

              </body>
                </html>
