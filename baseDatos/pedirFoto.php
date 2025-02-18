<?php
$servername = "localhost:3306";
$username = "Pablo";
$password = "123";
$dbname = "prueba";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar conexión
if ($conn->connect_error) {
    die("La conexión ha fallado: " . $conn->connect_error);
} else {
    echo "La conexión se ha realizado correctamente </br>";
}

$urlBase = "";
$error = "";

// Verificamos si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id = $_POST['id'];

    // Verificar que el ID sea un número válido
    if (!is_numeric($id) || $id <= 0) {
        $error = "Por favor, ingresa un ID válido.";
    } else {
        // Consulta SQL 
        $sql = "SELECT IMAGEN FROM ejercicioImagenes WHERE ID = '$id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Extraemos la imagen
            $row = $result->fetch_assoc();
            $urlBase = $row["IMAGEN"];
        } else {
            $error = "No se encontró ninguna imagen con ese ID.";
        }
    }
}

// Cerrar conexión
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Muestra de Imagen</title>
        <style>
            /* Estilos generales */
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
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

            input[type="number"] {
                width: 100%;
                padding: 10px;
                margin: 10px 0;
                border: 1px solid #ccc;
                border-radius: 3px;
                background: #fafafa;
                text-align: center;
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

            .error {
                color: red;
                font-size: 14px;
                margin-top: 10px;
            }

            img {
                width: 100%;
                max-height: 200px;
                object-fit: cover;
                margin-top: 10px;

            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>MUESTRA DE IMAGEN POR ID</h1>
            <form method="post">
                <label for="id">ID de la imagen:</label>
                <input type="number" id="id" name="id" required>
                <button type="submit">Mostrar Imagen</button>
            </form>

            <!-- Mostrar mensaje de error si existe -->
            <?php
            if (!empty($error)) {
                echo "<p class='error'>$error</p>";
            }
            ?>
            <!-- Mostrar imagen si se encontró -->
            <?php
            if (!empty($urlBase)) {
                echo "<img src='$urlBase' alt='Imagen encontrada'>";
            }
            ?>
        </div>
    </body>
</html>
