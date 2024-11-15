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

        table, td{
            text-align: center;
            border: 20px, solid, black;
        }
        th{
            padding: 20px;
        }
        
        table{
            margin-bottom: 20px;
            margin-left: 8%;
        }
       
    </style>
    <body>
        <?php
         
        $empleados=[
            ["nombre" => "Juan", "edad" => 30, "departamento" => "IT"],
            ["nombre" => "María", "edad" => 28, "departamento" => "Marketing"],
            ["nombre" => "Carlos", "edad" => 35, "departamento" => "Ventas"]
        ];
       
        $frutas = ["manzana", "banana"];
        
        array_push($frutas, "cereza");
        
        for($i = 0; $i<count($frutas); $i++){
            echo $frutas[$i];
            echo "</br>";
        }
        
        for($x=0;$x<=2;$x++){
            array_push($frutas, $empleados[$x]["nombre"]);
        }
        
        for($i = 0; $i<count($frutas); $i++){
            echo $frutas[$i];
            echo "</br>";
        }
        
        
         
        
        ?>
    </body>
</html>

