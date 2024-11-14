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
        $frutas = ["manzana", "pera", "aguacate"];

        foreach ($frutas as $key => $value) {
        
            $$value = 5;
            
            echo "Nombre de la variable: " . $value.": " . "Valor: " . $$value;
            echo "</br>";
        }
        
        echo "COMPROBACION:";
        echo "</br>"; 
        echo $manzana;
        echo "</br>"; 
        echo $pera; 
        echo "</br>";
        echo $aguacate;
        ?>
    </body>
</html>
