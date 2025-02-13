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
        echo "La conexion se ha realizado correctamente </br>";
    }
    
    
    //A continuacion almacenamos en una variable la consulta sql que queremos ejecutar
    //CREAMOS LA TABLA
    $sql = "CREATE TABLE MyGuests (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR(30) NOT NULL,
            lastname VARCHAR(30) NOT NULL,
            email VARCHAR(50),
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";
    
    //INSERTAMOS DATOS EN LA TABLA
    /*$sql = "INSERT INTO myguests (firstname, lastname, email) 
            VALUES('Pablo', 'asdd','asd@gmail.com') ";*/
    
    
    /*$sql = "INSERT INTO myguests(firstname,lastname,email)
            VALUES('Pepe', 'asddddsd', 'fasjdsa@gmail.com')";*/
    
    
    $sql = "SELECT * FROM myguests ORDER BY id LIMIT 3 OFFSET 5";
    
    
    
    $result = mysqli_query($conn, $sql);
   
    
    if(mysqli_num_rows($result) > 0){
        
        while($row = mysqli_fetch_assoc($result)){
            echo "Id: " . $row["id"] . ". Nombre: " . $row["firstname"] . ". Apellidos: " . $row["firstname"] . $row["lastname"] . ". Fecha: " . $row["reg_date"] . "</br>";
        }  
    }
    
   
    
    //Ejecutamos la consulta sql
    
    if($conn->query($sql) == TRUE){
        $last_id = mysqli_insert_id($conn); //DEVUELVE EL ID DEL ULTIMO REGISTRO QUE SE INSERTO EN UNA TABLA CON UNA COLUMNA AUTO-INCREMENT
        echo "La consulta: " . $sql . " se ha iniciado con exito.</br>";
        echo "El ultimo id insertado es: " . $last_id;
    }else{
        echo "Error ejecutando la consulta: " . $conn->error;
    }
   
    
    
    
    //CERRAMOS LA CONEXION
    mysqli_close($conn);  
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
