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
        table, tr, td, th{
            border: 2px, black, solid;
            font-size: 14px;
        }

        table{
            position:relative;
            margin: 2px;
            top:2px; 
            left:2px;
            float:left;
        }


       
    </style>
    <body>
        <?php
        $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
        $semana = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];
        for ($i = 0; $i < sizeof($meses); $i++) {
            echo "<table>";
            echo "<tr>";
            echo "<th>" . $meses[$i] . "</th>";
            echo "</tr>";
            $x = 1;
            if ($i % 2 != 0) {
                echo "<tr>";
                foreach ($semana as $sem) {
                    echo "<th>" . $sem . " " . "</th>";
                }
                echo "</tr>";
                echo "<tr>";
                while ($x <= 30) {
                    /*
                     * Si no es el primer numero,
                     *  y el modulo de la posicion 8 menos 1 de 7 es 0
                     * me crea una nueva fila en 8
                     * Ya que la nueva fila empieza en 8, pero el modulo lo tengo que hacer
                     * con 7
                     */
                    
                    if(($x != 0) && (($x - 1) % 7 == 0)){
                        echo"</tr>";
                        echo "<tr>";
                        echo "<td>" . $x . "</td>";
                    }else{
                        echo "<td>" . $x . "</td>";
                    }
                    $x++;
                }
                
                echo "</table>";
            } else {
                echo "<tr>";
                foreach ($semana as $sem) {
                    echo "<th>" . $sem . " " . "</th>";
                }
                echo "</tr>";
                echo "<tr>";
                while ($x <= 31) {
                    if(($x != 0) && (($x - 1) % 7 == 0)){
                        echo"</tr>";
                        echo "<tr>";
                        echo "<td>" . $x . "</td>";
                    }else{
                        echo "<td>" . $x . "</td>";
                    }
                    $x++;
                }
                
                echo "</table>";
            }
        }
        ?>
    </body>
</html>

