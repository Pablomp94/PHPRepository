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
            font-size: 50px;
        }
        </style>
    <body>
        <?php
        $emails = ["pepe@yahoo.es", "teresa@terra.es", "manolo@google.com"];

        foreach ($emails as $key => $value) {
        
            $longitud = strlen($value);
            
            $posicionArroba = strpos($value, "@");
            
            $izquierda = substr($value, 0, $posicionArroba);
            $derecha = substr($value, $posicionArroba + 1, $longitud);
            
            echo "Tengo a la izquierda del @: " . $izquierda . ". Tengo a la dereha del @: ". $derecha; 
            echo "</br>";
        }
        ?>
    </body>
</html>
