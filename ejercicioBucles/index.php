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
        table{
            border: 2px, black, solid;
            font-size: 30px;
            margin-right: 20px;
            margin-left: 20px;
            padding: 20px;
            margin-top: 2px;
            background-color:white;
        }

        div{
            position:relative; 
            top:23px; 
            left:20px;
            float:left;
        }
        
        body{
            background-image:linear-gradient(blue, red);
        }
    </style>
    <body>
        <?php
        for ($i = 1; $i <= 10; $i++) {
            echo "<div>";
            echo "<table> <tr>";
            echo "<th> Tabla del: " . $i . "</th>";
            echo "</tr>";
            
            for ($x = 1; $x <= 10; $x++) {
                echo "<tr>";
                echo "<td>" . $i . " * " . $x . " = " . $i * $x . "</td>";
                echo"</tr>";
            }
            
            echo"</table>";
            echo "</div>";
        }
        ?>
    </body>
</html>
