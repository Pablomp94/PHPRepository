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

        
        .error{
            color: red;
            font-weight: bold;
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
        $arrayErrores = ["No hay error, fichero subido con éxito.", "El fichero subido excede la directiva upload_max_filesize", "El fichero subido excede la directiva MAX_FILE_SIZE especificada en el formulario HTML.", "El fichero fue sólo parcialmente subido.", "No se subió ningún fichero.", 0, "Falta la carpeta temporal.", "No se pudo escribir el fichero en el disco.", "Una extensión de PHP detuvo la subida de ficheros."];

        if (isset($_FILES["archivo"])) {

            $archivo = $_FILES["archivo"];

            $nombre = $archivo["name"]; //Nombre del archivo incluyendo el formato
            echo '$nombre: ' . $nombre;

            echo "</br>";

            $tipo = $archivo["type"]; //Tipo del archivo
            echo '$tipo: ' . $tipo;

            echo "</br>";
            $tmp_name = $archivo["tmp_name"]; //Nos dice la ubicacion temporal en donde se guarda el archivo
            echo '$temp_name: ' . $tmp_name;

            echo "</br>";
            $error = $archivo["error"]; //Para saber si tengo algun error
            echo '$error: ' . $error;

            echo "</br>";
            if ($error == 4) {
                echo "No has subido ningun archivo";
            }
            echo "</br>";

            $tamanyo = $archivo["size"]; //Muestra el tamaño del fichero en bytes
            echo 'Tu fichero ocupa: ' . $tamanyo . " bytes";
            $tam = ($tamanyo / 1048576);
            echo "</br>";
            echo "Tu fichero ocupa: " . number_format(($tam), 3) . " Megabytes";

            echo"</br>";

            //Subir el archivo a una carpeta si no hay ningun error
            /*
              if($error == 0){
              $destino = "uploads/" . $nombre;
              move_uploaded_file($tmp_name, $destino);
              } */

            //Ejercicio1: Si el archivo ocupa mas de 5mb, 
            //mostrar mensaje de error y no subir el archivo.
            /*
              if(($error == 0) && ($tam <= 5)){
              $destino = "uploads/" . $nombre;
              move_uploaded_file($tmp_name, $destino);
              }else{
              echo "Error al subir el archivo debido a que el tamaño es mayor a 5 megabytes";
              }
             */

            //Ejercicio2: Solo subir el archivo si estas dentro de las 14h

            echo "</br>";
            
            /*
            if($error == 0){
                $hora = date("H");
            }
            if ($hora <= 14) {
                $destino = "uploads/" . $nombre;
                move_uploaded_file($tmp_name, $destino);
                echo "Subido a las " . date("H:i") . ".";
            } else {
                echo "Error al subir el archivo debido a fuera de hora";
            }
            */
            
            echo "</br>";

            //VALIDACION por tipo de archivo

            $permitidos = ["image/jpeg", "image/png", "application/pdf"];

            if (!in_array($tipo, $permitidos)) {
                die("El archivo subido no cumple con el formato correcto");
            } else {
                $destino = "uploads/" . $nombre;
                move_uploaded_file($tmp_name, $destino);
                echo $arrayErrores[$error];
                echo "</br>";
                echo "Subido";
            }

            echo "</br>";

            //CONTROL DE ERRORES
            /*
              if ($error != 0) {
              echo $arrayErrores[$error];
              } else {
              $destino = "uploads/" . $nombre;
              move_uploaded_file($tmp_name, $destino);
              echo $arrayErrores[$error];
              echo "</br>";
              echo "Subido";
              } */
        }
        ?>
    </body>
</html>
