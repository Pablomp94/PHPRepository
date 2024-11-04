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
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 10px;
            background-color: #f9f9f9;
        }

        /* Contenedor del calendario */
        .calendario {
            display: grid;
            gap: 80px;
            grid-template-columns: repeat(auto-fit, minmax(30%, 1fr));
            width: 100%;
            max-width: 100%;
            margin: 20px;
        }

        /* Estilos de cada tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ccc;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Encabezado del mes */
        th {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            font-size: 16px;
            text-align: center;
        }

        /* Estilo de celdas de días */
        td, th {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
            font-size: 100%;
        }
        
        td:hover{
            font-size: 150%;
            cursor: pointer;
        }

        /* Fines de semana en rojo */
        .nuevo {
            color: red;
        }

        .diaActual{
            font-size: 200%;
            color: blue;
        }


    </style>
    <body>
        <?php

        function crearCalendario() {
            
            echo "<div class = calendario>";

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

                if ($meses[$i] != "Enero") {
                    $ultimoNumero = $diaMeses[$i - 1] - ($pos - 1);
                } else {
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
                        ponerDias($x, $i);
                        $pos = 0;
                    } else {
                        ponerDias($x, $i);
                    }
                    $x++;
                    $pos++;
                }


                echo "</table>";
                
            }
            echo "</div class = calendario>";
        }

        crearCalendario();
        
        
        //Funcion para poner los dias y comprueba tambien el dia en el que estamos
        
        
        function ponerDias($dia, $diaMes){
            //Si es el dia, se marca en el calendario en grande y azul
            if((($diaMes + 1) == date("n"))&& ($dia == date("j"))){
                echo "<td class = diaActual>" . $dia . "</td>";
            }else{
                echo "<td>" . $dia . "</td>";
            }
        }
        
        ?>
    </body>
</html>

