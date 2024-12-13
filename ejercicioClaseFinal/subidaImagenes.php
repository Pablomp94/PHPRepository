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
        
       
        div{
            margin-left: 15%;
        }
        
       
        button:hover{
            cursor: pointer;
            color: red;
        }
        h1{
            font-size: 50px;
            text-align: center;
        }
        form{
            text-align:center;
        }

        
        
        #error{
            border: 5px black solid;
            font-weight: bold;
            color:red;
        }
    </style>
    <body>
        <div>
            <table>
                <tr>
                <button><a href="subidaImagenes.php"></a>Subida de Imágenes</button>
                <button><a href="crearCalendario.php"></a>Crear calendario</button>
                <button><a href="eventoHistorico.php"></a>Evento Histórico</button>
                </tr>
            </table>
        </div>


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

            $flagUno = 0;
            $flagDos = 0;

            $nombre = $archivo["name"];

            $error = $archivo["error"];

            $tmp_name = $archivo["tmp_name"];

            $archivosPermitidos = ["image/jpeg", "image/bmp", "image/png"];

            $tipo = $archivo["type"];

            if (!in_array($tipo, $archivosPermitidos)) {
                echo "</br><span id=error>Este formato no está permitido.</span>";
            } else {
                $flagUno = 1;
            }

            
            $punto = strpos($nombre, ".");
            $nom = substr($nombre, 0,$punto);

            
            if($nom == "calendario"){
                $flagUno = 1;
            }else{
                echo "<span id='error'>El nombre del archivo tiene que ser calendario</span>";
            }
            
            if ($error == 0 && $flagUno == 1 && $flagDos) {
                $destino = "uploads/" . $nombre;
                move_uploaded_file($tmp_name, $destino);
                echo"</br>";
                echo '<img src="uploads/' . $nombre . ' "alt="Descripcion">';
                echo "</br>";
                echo "Tamaño del archivo: " . $archivo["size"] . " bytes.</br>";
            }
        }
        ?>






    </body>
</html>
