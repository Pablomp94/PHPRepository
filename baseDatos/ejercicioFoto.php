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

// Manejo de subida de archivos
if (isset($_FILES['archivo'])) {
    $permitidos = ['image/jpeg', 'image/png', 'application/pdf'];
    $archivo = $_FILES['archivo'];
    $nombre = $archivo['name'];
    $error = $archivo['error'];
    $tmp_name = $archivo['tmp_name'];

    $rutaUno = "http://localhost/PHPRepository/baseDatos/Imagenes";
    $rutaDos = "C:/xampp/htdocs/PHPRepository/baseDatos/Imagenes";
    $destinoCarpeta = $rutaDos . "/" . $nombre;
    $destinoBase = $rutaUno . "/" . $nombre;

    if (!in_array($archivo['type'], $permitidos)) {
        die('<p class="error">Tipo de archivo no permitido.</p>');
    }

    move_uploaded_file($tmp_name, $destinoCarpeta);

    if ($error == 0) {
        $sql = "INSERT INTO ejercicioImagenes(IMAGEN) VALUES('$destinoBase')";
        if ($conn->query($sql) === TRUE) {
            echo "<p class='success'>Imagen subida correctamente.</p>";
        } else {
            echo "<p class='error'>Error al guardar en la base de datos: " . $conn->error . "</p>";
        }
    } else {
        echo "<p class='error'>Error al subir el archivo.</p>";
    }

    header("refresh:3;url=pedirFoto.php");
    echo "Redirigiendo...";
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
            <h1>Subir Archivo</h1>
            <form method="post" enctype="multipart/form-data">
                <input type="file" name="archivo" required>
                <button type="submit">Subir</button>
            </form>
        </div>
    </body>
</html>
