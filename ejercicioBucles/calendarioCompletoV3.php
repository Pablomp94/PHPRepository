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

        .nuevo{
            color: red;
        }



    </style>
    <body>
        <?php
        $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
        $diaMeses = [31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
        $semana = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];

        $pos = 0;
        for ($i = 0; $i < sizeof($meses); $i++) {
            echo "<table>";
            echo "<tr>";
            echo "<th>" . $meses[$i] . "</th>";
            echo "</tr>";
            $x = 1;

            echo "<tr>";
            foreach ($semana as $sem) {
                echo "<th>" . $sem . " " . "</th>";
            }
            echo "</tr>";
            echo "<tr>";

            $blanco = 0;
            $atras = $pos;

            if($meses[$i] != "Enero"){
                $ultimoNumero = $diaMeses[$i - 1] - ($pos - 1);
            }else{
              $ultimoNumero = null;  
            }
            
            while ($blanco < $pos) {
                echo "<td class=nuevo>" . $ultimoNumero . "</td>";
                $ultimoNumero++;
                $blanco++;
            }

            $pos = 0;

            while ($x <= $diaMeses[$i]) {

                if (($x != 0) && ((($x + $blanco) - 1) % 7 == 0)) {
                    echo"</tr>";
                    echo "<tr>";
                    echo "<td>" . $x . "</td>";
                    $pos = 0;
                } else {
                    echo "<td>" . $x . "</td>";
                }
                $x++;
                $pos++;
            }


            echo "</table>";
        }
        ?>
    </body>
</html>

