<?php

    $servername = "localhost";
    $username = "Pablo";
    $password = "123";
    $dbname = "prueba";
    
    //Me creo la conexion a mi base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    
    //Comprobacion de la conexion
    if($conn->connect_error){
        die("La conexion ha fallado: " . $conn->connect_error);
    }else{
        echo "La conexion se ha realizado correctamente";
    }
    
    
    //A continuacion almacenamos en una variable la consulta sql que queremos ejecutar
    $sql = "CREATE TABLE MyGuests (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR(30) NOT NULL,
            lastname VARCHAR(30) NOT NULL,
            email VARCHAR(50),
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";
    
    
    

?>

<html>
    <head>
        <title>title</title>
    </head>
    <style>
        *{
            font-size: 30px;
        }
    </style>
    <body>

    </body>
</html>
