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
            font-size: 48px;
        }
    </style>
    <body>
        
        <?php
        
        $variable = "default";

        function crearVariable($nombre) {
            global $variable;

            if ($nombre != "default") {
                $variable = $nombre;
                $$variable = "default";
                echo "$$variable = " . $$variable . "</br>";
            }
        }

        //crearVariable($nombre = "default");
        
        
        crearVariable($nombre = "Paco");
        crearVariable($nombre = "Manolo");
        crearVariable($nombre = "Juan");
        
        ?>
    </body>
</html>
