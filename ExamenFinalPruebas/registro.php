<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->

<?php
require_once 'config.php'; // Incluir la conexión


$errornombreUsuario = $errorContraseña = $errorNombre = $errorApellidos = $errorEmail = $errorDni = $errorTelefono = $errorImagen = "";

$nombreUsuario = $contraseña = $nombre = $apellidos = $email = $dni = $telefono = $imagen = "";

$flagFormulario = 1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["nombreUsuario"])) {
        $errornombreUsuario = "El nombre del usuario es obligatorio";
        $nombreUsuario = "";
        $flagFormulario = 0;
    } else {

        $nombreUsuario = ($_POST["nombreUsuario"]);

        $sql = "SELECT * FROM usuarios";
        $stmt = $pdo->query($sql);

        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($usuarios as $usuario) {
            if ($nombreUsuario == $usuario["nombreUsuario"]) {
                $flagFormulario = 0;
                $errornombreUsuario = "El nombre de usuario ya esta en uso";
            }
        }
    }

    if (empty($_POST["Contraseña"])) {
        $errorContraseña = "La contraseña es obligatoria";
        $contraseña = "";
        $flagFormulario = 0;
    } else {
        $contraseña = ($_POST["Contraseña"]);
    }

    if (empty($_POST["Nombre"])) {
        $errorNombre = "El nombre es obligatorio";
        $nombre = "";
        $flagFormulario = 0;
    } else {
        $nombre = ($_POST["Nombre"]);
    }


    if (empty($_POST["Apellidos"])) {
        $errorApellidos = "Los Apellidos son obligatorios";
        $apellidos = "";
        $flagFormulario = 0;
    } else {
        $apellidos = ($_POST["Apellidos"]);
    }

    if (empty($_POST["Email"])) {
        $errorEmail = "El Email es obligatorio";
        $email = "";
        $flagFormulario = 0;
    } else {
        if (!preg_match("/^[a-zA-Z0-9._%+-]+@([a-zA-Z0-9.-]+)\.([a-zA-Z]{3})$/", $_POST["Email"])) {
            $errorEmail = "CREDENCIALES INCORRECTAS, -----@----.----";
            $flagFormulario = 0;
        } else {
            $email = $_POST["Email"];
        }
    }

    if (empty($_POST["Dni"])) {
        $errorDni = "El DNI es obligatorio";
        $dni = "";
        $flagFormulario = 0;
    } else {
        if (!preg_match("/^[0-9]{8}$/", $_POST["Dni"])) {
            $errorDni = "CREDENCIALES INCORRECTAS, debe de contener los 8 numeros";
            $flagFormulario = 0;
        } else {
            $dni = $_POST["Dni"];
        }
    }

    if (empty($_POST["Telefono"])) {
        $errorTelefono = "El Telefono es obligatorio";
        $telefono = "";
        $flagFormulario = 0;
    } else {
        if (!preg_match("/^[0-9]{9}$/", $_POST["Telefono"])) {
            $errorTelefono = "Credenciales Incorrectas";
            $flagFormulario = 0;
        } else {
            $telefono = $_POST["Telefono"];
        }
    }

    if (empty($_POST["Imagen"])) {
        $errorImagen = "La imagen es obligatoria";
        $imagen = "";
        $flagFormulario = 0;
    } else {
        $imagen = ($_POST["Imagen"]);
    }
}

if ($flagFormulario == 1) {


    $sql = "INSERT INTO usuarios (nombreUsuario, Nombre, Apellidos, E-mail, DNI, Telefono, Contraseña, Imagen) VALUES ('$nombreUsuario', '$nombre', '$apellidos', '$email', '$dni', '$telefono', '$contraseña', '$imagen')";
    $stmt = $pdo->query($sql);

    echo "<div id=datos>";
    echo $nombreUsuario . "</br>";
    echo $contraseña . "</br>";
    echo $nombre . "</br>";
    echo $apellidos . "</br>";
    echo $email . "</br>";
    echo $dni . "</br>";
    echo $telefono . "</br>";
    echo $imagen . "</br>";
    echo "</div>";
    header("refresh:3;url=login.php");
    echo "Redirigiendo...";
}
?>





<html>
    <head>
        <meta charset="UTF-8">
        <title>REGISTRO</title>
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
            max-width: 600px;
            margin-top: 20px;
        }

        label {
            font-size: 18px;
            margin-bottom: 2px;
            display: block;
            color: #333;
        }


        input {
            width: 100%;
            padding: 10px;
            margin: 3px 0;
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
        }
    </style>
    <body>


        <h1>FORMULARIO DE REGISTRO</h1></br>
        <!-- Formulario que se procesa en el mismo archivo -->
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

            <!-- Campo para el nombre de usuario -->
            <label for="username">Nombre de Usuario:</label>
            <span class =error><?php echo $errornombreUsuario ?></p></br>
                <input type="text" id="nombreUsuario" name="nombreUsuario">

                <!-- Campo para la contraseña -->
                <label for="password">Contraseña:</label>
                <span class ='error'><?php echo $errorContraseña ?></p></br>
                    <input type="password" id="Contraseña" name="Contraseña">

                    <!--Campo para el nombre-->
                    <label for="username">Nombre:</label>
                    <span class =error><?php echo $errorNombre ?></p></br>
                        <input type="text" id="Nombre" name="Nombre">

                        <!--Campo para el Apellidos-->
                        <label for="username">Apellidos:</label>
                        <span class =error><?php echo $errorApellidos ?></p></br>
                            <input type="text" id="Apellidos" name="Apellidos">

                            <!--Campo para el E-mail-->
                            <label for="username">E-mail:</label>
                            <span class =error><?php echo $errorEmail ?></p></br>
                                <input type="text" id="Email" name="Email">

                                <!--Campo para el DNI-->
                                <label for="username">DNI:</label>
                                <span class =error><?php echo $errorDni ?></p></br>
                                    <input type="text" id="Dni" name="Dni">

                                    <!--Campo para el Telefono-->
                                    <label for="username">Telefono:</label>
                                    <span class =error><?php echo $errorTelefono ?></p></br>
                                        <input type="number" id="Telefono" name="Telefono">

                                        <!--Campo para la imagen-->
                                        <label for="username">Imagen:</label>
                                        <span class =error><?php echo $errorImagen ?></span></br>
                                        <input type="file" name="Imagen">



                                        <!-- Botón para enviar el formulario -->
                                        <input type="submit" value="Registrar sesión">
                                        </form>

                                        </body>
                                        </html>
