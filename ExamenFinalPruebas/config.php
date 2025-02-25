<?php

// Configuración de la base de datos
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "examen";

try {
    // Conexión a la base de datos con PDO
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Creación de la tabla usuarios si no existe
    $sqlUsuarios = "CREATE TABLE IF NOT EXISTS usuarios (
        nombreUsuario VARCHAR(100) NOT NULL,
        Nombre VARCHAR(100) NOT NULL,
        Apellidos VARCHAR(200) NOT NULL,
        Email VARCHAR(200) NOT NULL,
        DNI VARCHAR(9) NOT NULL,
        Telefono INT NOT NULL,
        Contraseña VARCHAR(500) NOT NULL,
        Imagen VARCHAR(255) NOT NULL,
        PRIMARY KEY (nombreUsuario)
    )";
    $pdo->exec($sqlUsuarios);

    // Creación de la tabla artículos si no existe
    $sqlArticulos = "CREATE TABLE IF NOT EXISTS articulos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(255) NOT NULL,
        marca VARCHAR(255) NOT NULL,
        descripcion VARCHAR(500) NOT NULL,
        precio DECIMAL(10,2) NOT NULL,
        fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($sqlArticulos);

    //echo "Configuración completada con éxito.";
} catch (PDOException $e) {
    die ("Error en la conexión o configuración: " . $e->getMessage());
}

?>
