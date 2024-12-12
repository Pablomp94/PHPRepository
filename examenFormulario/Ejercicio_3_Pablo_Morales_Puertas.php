<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>

    <style>
        *{
            font-size: 30px;
        }
        h1{
            font-size: 50px;
        }

        #error{
            border: 5px black solid;
            font-weight: bold;
            color:red;
        }
    </style>

    <body>

        <h1>Subida Archivos</h1>
        <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" enctype="multipart/form-data">
            Archivo: <input type="file" name="archivo">
            </br></br>
            <button name="submit">ENVIAR</button>
            </br></br>
        </form>



        <?php
        if (isset($_FILES["archivo"])) {

            $archivo = $_FILES["archivo"];

            $flag = 0;

            $nombre = $archivo["name"];

            $error = $archivo["error"];

            $tmp_name = $archivo["tmp_name"];

            $archivosPermitidos = ["image/jpeg", "image/bmp"];

            $tipo = $archivo["type"];
            
            
            
            if(!in_array($tipo, $archivosPermitidos)){
                echo "</br><span id=error>Este formato no está permitido.</span>";
            }else{
                $flag = 1;
            }
            
            
            if ($error == 0 && $flag == 1) {
                $destino = "uploads/" . $nombre;
                move_uploaded_file($tmp_name, $destino);
                echo"</br>";
                echo '<img src="uploads/'.$nombre.' "alt="Descripcion">'; 
                echo "</br>";
                echo "Tamaño del archivo: " . $archivo["size"] . " bytes.</br>";
            }  
            
        }
        ?>


    </body>
</html>
