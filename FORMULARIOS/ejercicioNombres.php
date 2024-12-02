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
            font-size: 40px;
            
        }
        
        form{
            width: 60%;
        }
        
       
        
        div{
            margin-left: 30%;
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
        
    </style>
    <body>

        <div>
        
        <h1>INTRODUCE TUS DATOS</h1>

        <!--Si pones en el action PHP_SELF puedes recojer los datos en el mismo archivo-->
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
            Nombre <input type="text" name="name"></br>
            <input id="sub" type="submit">
        </form>
        
      
        <!--  -->
        
         <?php
        $formulario = $_POST["name"];

        $arch = fopen("nombres.txt", "r");

        $cont = fread($arch, filesize("nombres.txt"));
        fclose($arch);

        $archivoEs = fopen("nombres.txt", "w");
        fwrite($archivoEs, ($cont . " " . $formulario));
        fclose($archivoEs);
        $archivo = fopen("nombres.txt", "r");
        $contenido = fread($archivo, filesize("nombres.txt"));
        fclose($archivo);

        $array = explode(" ", $contenido);

        for ($i = 0; $i < sizeof($array); $i++) {
            if ($i == 0 && (sizeof($array) == 1)) {
                echo $array[$i] . ",";
            }
            if ($i < (sizeof($array) - 1)) {
                echo $array[$i] . ",";
            } else {
                echo $array[$i] . ".";
            }
        }
        ?>

        
        
        </div>

    </body>
</html>
