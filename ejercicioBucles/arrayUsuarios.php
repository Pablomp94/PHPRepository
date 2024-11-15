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
        
        $flag = 0;
        $usuario = 0;
        
        
        echo "<table>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>NOMBRE</th>";
        echo "<th>EDAD</th>";
        echo "<th>DEPARTAMENTO</th>";
        echo "</tr>";
        for($i=0; $i<count($empleados); $i++){
            echo "<tr>";
            echo "<td>" . $i + 1 . "</td>";
            echo "<td>" . $empleados[$i]["nombre"] . "</td>";
            echo "<td>" . $empleados[$i]["edad"] . "</td>";
            echo "<td>" . $empleados[$i]["departamento"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        
        
        for($i=0; $i<count($empleados); $i++){
            if($empleados[$i]["edad"] == 28){
                $flag = 1;
                $usuario = $i;
            }
        }
        
        if($flag == 1){
            echo "El usuario es: " . $empleados[$usuario]["nombre"];
        }else{
            echo "El usuario no existe.";
        }
        ?>
    </body>
</html>

