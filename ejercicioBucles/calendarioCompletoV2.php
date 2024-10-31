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
        $semana = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];

        $pos = 0;
        $posImpar = 0;
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

                $blanco = 0;
                $atras = $posImpar;
                $ultimoNumero = 31 - ($posImpar - 1);
                while ($blanco < $posImpar) {
                    
                    echo "<td class=nuevo>" . $ultimoNumero . "</td>";
                    $ultimoNumero ++;
                    $blanco++;
                    
                }

                $pos = 0;

                while ($x <= 31) {

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

                //Ahora que tengo la posicion del ultimo dia
                //Empiezo a poner los dias en su posicion
            } else {
                echo "<tr>";
                foreach ($semana as $sem) {
                    echo "<th>" . $sem . " " . "</th>";
                }
                echo "</tr>";
                echo "<tr>";

                $blanco = 0;
                $atras = $pos;
                $ultimoNumero = 31 - ($pos - 1);
                while ($blanco < $pos) {
                    
                    echo "<td class=nuevo>" . $ultimoNumero . "</td>";
                    $ultimoNumero ++;
                    $blanco++;
                    
                }

                $posImpar = 0;

                while ($x <= 31) {

                    if (($x != 0) && ((($x + $blanco) - 1) % 7 == 0)) {
                        echo"</tr>";
                        echo "<tr>";
                        echo "<td>" . $x . "</td>";
                        $posImpar = 0;
                    } else {
                        echo "<td>" . $x . "</td>";
                    }
                    $x++;
                    $posImpar++;
                }

                echo "</table>";
            }
        }
        ?>
    </body>
</html>

