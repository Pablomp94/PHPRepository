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

        form{
            width: 60%;
        }



        div{
            margin-left: 20%;
            align-content: center;
            width: 80%;
        }

        #sub{
            margin-left: 30%;
            background-color: lightblue;
        }

        #sub:hover{
            background-color: lightcoral;
            cursor: pointer;
        }

        input{
            margin-bottom:10%;
        }

        button:hover{
            cursor: pointer;
        }


    </style>
    <body>

        <div>

            <h1>INTRODUCE TUS DATOS</h1>

            <!--Si pones en el action PHP_SELF puedes recojer los datos en el mismo archivo-->

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" enctype="multipart/form-data">
                Archivo: <input type="file" name="archivo"></br>
                <button id="sub" type="submit" name="submit">SUBMIT</button>
            </form>
        </div>



        <?php
        
        
        
        if (isset($_FILES["archivo"])) {

            $archivo = $_FILES["archivo"];

            $nombre = $archivo["name"]; //Nombre del archivo incluyendo el formato
            echo '$nombre: ' . $nombre;
            
            echo "</br>";
            
            $tipo = $archivo["type"]; //Tipo del archivo
            echo '$tipo: ' . $tipo;
            
            echo "</br>";
            $tmp_name = $archivo["tmp_name"];//Nos dice la ubicacion temporal en donde se guarda el archivo
            echo '$temp_name: ' . $tmp_name;
            
            echo "</br>";
            $error = $archivo["error"]; //Para saber si tengo algun error
            echo '$error: ' . $error;
            
            echo "</br>";
            if($error == 4){
                echo "No has subido ningun archivo";
            }
            
            
            $tamanyo = $archivo["size"]; //Muestra el tamaño del fichero en bytes
            echo 'Tu fichero ocupa: ' . $tamanyo . " bytes";
            echo "</br>";
            echo "Tu fichero ocupa: " . number_format(($tamanyo/1048576), 3) . " Megabytes";
            
            echo"</br>";
            
            //Subir el archivo a una carpeta
            if($error == 0){
                $destino = "uploads/" . $nombre; 
                move_uploaded_file($tmp_name, $destino);
            }
            
        }
        
        
        ?>
    </body>
</html>
