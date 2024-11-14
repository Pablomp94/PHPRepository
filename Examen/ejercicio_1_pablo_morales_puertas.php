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
            font-size: 80px;
        }
    </style>
    <body>
        <?php
        
        echo "<table>";
        for($y=1;$y<10;$y++){
            echo "<tr>";
            for($x=1;$x<=10;$x++){
                echo "<td>";
                if($y == 1 || $y == 5 || $y == 9){
                    echo "T";
                }else{
                    if($x == 1 || $x == 10){
                        echo "P";   
                    }
                }
                echo "</td>";
            }
        }
        echo "<table>";
        
        
        
        ?>
    </body>
</html>
