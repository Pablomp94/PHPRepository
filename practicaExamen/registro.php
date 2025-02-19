<?php
$servername = "localhost:3306";
$username = "Pablo";
$password = "123";
$dbname = "prueba";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar conexión
if ($conn->connect_error) {
    die("La conexión ha fallado: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {


    $flag = 0;

    $sql = "SELECT * FROM pruebaExamen";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Extraemos la imagen
        $row = $result->fetch_assoc();
        echo $row["ID"];
    } else {
        $error = "No se encontró ninguna imagen con ese ID.";
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Subida de Archivo</title>
        <style>
            /* Reset básico */
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: Arial, sans-serif;
            }

            /* Estilos generales */
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                background: #f4f4f4;
            }

            .container {
                background: white;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
                text-align: center;
                width: 100%;
                max-width: 350px;
            }

            h1 {
                font-size: 20px;
                margin-bottom: 15px;
                color: #333;
            }

            input[type="file"] {
                display: block;
                width: 100%;
                margin: 10px 0;
                padding: 8px;
                border: 1px solid #ccc;
                border-radius: 3px;
                background: #fafafa;
            }

            button {
                width: 100%;
                padding: 10px;
                border: none;
                border-radius: 3px;
                background: #007bff;
                color: white;
                font-size: 16px;
                cursor: pointer;
            }

            button:hover {
                background: #0056b3;
            }

            .success {
                color: green;
                font-size: 14px;
                margin-top: 10px;
            }

            .error {
                color: red;
                font-size: 14px;
                margin-top: 10px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>REGISTRO DE USUARIO</h1>
            <form method="post" enctype="multipart/form-data">
                
                <button type="submit">Subir</button>
            </form>
        </div>
    </body>
</html>
