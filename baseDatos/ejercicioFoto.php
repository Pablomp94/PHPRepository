
<?php
$servername = "localhost";
$username = "Pablo";
$password = "123";
$dbname = "prueba";

//Me creo la conexion a mi base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

//Comprobacion de la conexion
if ($conn->connect_error) {
    die("La conexion ha fallado: " . $conn->connect_error);
} else {
    echo "La conexion se ha realizado correctamente </br>";
}


// Verificamos si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $imagen = $_POST['archivo'];


    $sql = "INSERT INTO myguests(firstname,lastname,email,IMAGEN)
            VALUES('Pepe', 'asddddsd', 'fasjdsa@gmail.com', '$imagen')";

    $sqlMostrar = "SELECT * FROM myguests";

    $result = mysqli_query($conn, $sqlMostrar);

    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)){
            echo "Id: " . $row["id"] . ". Nombre: " . $row["firstname"] . ". Apellidos: " . $row["firstname"] . $row["lastname"] . ". Fecha: " . $row["reg_date"] . ". Imagen:  " . $row["IMAGEN"] . "</br>";
        }  
    }

    //Ejecutamos la consulta sql

    if ($conn->query($sql) == TRUE) {
        echo "La consulta: " . $sql . " se ha iniciado con exito.</br>";
    } else {
        echo "Error ejecutando la consulta: " . $conn->error;
    }
}


//CERRAMOS LA CONEXION
mysqli_close($conn); 
?>
<html>
    <head>
        <title>title</title>
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
        <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">  
            Archivo: <input type="image" name="archivo">
            </br>
            
            <button type="submit" name="submit" value="Submit"> Subir </button>
        </form>

    </body>
</html>

