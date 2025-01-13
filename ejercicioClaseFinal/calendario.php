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
            color: grey;
        }



        .festivo{
            color: red;
        }

        #diaActual{
            font-size: 200%;
            color: blue;
        }

    </style>
    <body>
        <?php

         $archivo = fopen("ficheroTexto.txt", "r");
        //Ahora para ver el contenido dentro del archivo
        $nuevoContenido = fread($archivo, filesize("ficheroTexto.txt"));
        //Cerramos el archivo
        fclose($archivo);
        //dia/mes&año
        $stringPos = strpos($nuevoCOntenido, "/");
        $diaAct = substr($nuevoContenido, 0,"/");
        $mesAct = substr($nuevoContenido, );
        
        
        
        //Para hacer este programa he usado el date(), el cual es usado para sacar informacion horaria del usuario
        
        function crearCalendario() {

            echo "<div class = calendario>";

            $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
            $diaMeses = [31, 0, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
            $semana = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];

            
            //Hago un condicional para saber si el año actual es bisiesto
                if($_POST["año"] % 4 == 0){
                    $diaMeses[1] = 29;
                }else{
                    $diaMeses[1] = 28;
                }
            
            $pos = 0;
            for ($i = 0; $i < sizeof($meses); $i++) {
                echo "<table>";
                echo "<tr>";
                echo "<th colspan=7>" . $meses[$i] . "</th>";
                echo "</tr>";
                //x es el valor de los dias, empezando como dia inicial 1
                $x = 1;

                echo "<tr>";
                //Recorro los dias de la semana y los muestro
                foreach ($semana as $sem) {
                    echo "<th>" . $sem . " " . "</th>";
                }
                echo "</tr>";
                echo "<tr>";

                $blanco = 0;

                //Si el mes en el que estamos no es enero, me guardo en una variable el ultimo dia del mes anterior
                if ($meses[$i] != "Enero") {
                    $ultimoNumero = $diaMeses[$i - 1] - ($pos - 1);
                } else {
                    $ultimoNumero = null;
                }

                //Mientras que mi variable blanco con valor 0 sea menor a la posicion del ultimo numero del mes anterior voy mostrando dichos dias
                while ($blanco < $pos) {
                    echo "<td class=nuevo>" . $ultimoNumero . "</td>";
                    $ultimoNumero++;
                    $blanco++;
                }

                $pos = 0;
                
                //Hago un bucle para ir mostrando los dias del mes actual sin pasarse del dia que tiene asociado dicho mes
                while ($x <= $diaMeses[$i]) {

                    //Si el dia actual mas los espacios que se le sume al añadirle los dias del mes anterior, menos uno da de modulo de 7 un 0 se crea una nueva fila
                    //Como explicacion del porque se calcula quitandole uno, es porque lo que queremos son columnas de 7, 
                    //por lo que en la posicion 8 queremos estar ya abajo en la nueva fila, si no se pone el menos 1 estariamos creando 
                    //columnas de 6, ya que en la 7º posicion se crearia la fila
                    
                    //Ahora que lo estoy comentando se podría poner sin el menos 1 mostrando en pantalla el dia actual y luego crear la fila
                    
                    //ejemplo:
                    
                    /* if (((($x + $blanco)) % 7 == 0)) {
                     * 
                     * ponerDias($x, $i, $blanco);
                      echo"</tr>";
                      echo "<tr>";
                      //Si creo una fila la posicion vuelve a 0
                      $pos = 0;
                      } else { 

                     *                      */
                    
                    if (((($x + $blanco) - 1) % 7 == 0)) {
                        echo"</tr>";
                        echo "<tr>";
                        ponerDias($x, $i, $blanco);
                        //Si creo una columna la posicion vuelve a 0
                        $pos = 0;
                    } else {
                        ponerDias($x, $i, $blanco);
                    }
                    //Voy sumando los dias y la posicion en la que estoy para luego mostrar en el siguiente mes los ultimos dias de este mes
                    $x++;
                    $pos++;
                }

                ponerAño();

                echo "</table>";
            }
            echo "</div class = calendario>";
        }

        crearCalendario();

        //Funcion para poner los dias y comprueba tambien el dia en el que estamos
        //Si es domingo lo pone como festivo en rojo
        function ponerDias($dia, $numMes, $blanco) {
            //Si es el dia, se marca en el calendario en grande y azul
            if ((($numMes + 1) == $mesAct) && ($dia == $diaAct)) {
                echo "<td id = diaActual>" . $dia . "</td>";
            } else {
                //Si no se cumple la condicion anterior
                //Si el modulo del dia mas los numeros añadidos del mes anterior es 0, va a ser domingo
                //Ya que esta en la 7º columna
                if ((($dia) + $blanco) % 7 == 0){
                    echo "<td class = festivo>" . $dia . "</td>";
                } else {
                    //Si no se cumple ninguna de las dos condiciones
                    //Se muestra el dia sin nada especial
                    echo "<td>" . $dia . "</td>";
                }
            }
        }
        
        //Funcion para poner el año actual
        function ponerAño() {
            echo "<tr>";
            if($_POST["año"] % 4 == 0){
                echo "<th colspan=7>AÑO: " . $_POST["año"] . " BISIESTO</th>";
            }else{
                echo "<th colspan=7>AÑO: " . $_POST["año"] . "</th>";
            }
            echo "</tr>";
        }
        
        
        
        
        
        function pasarCalendario(){
             $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
            $diaMeses = [31, 0, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
            $semana = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];

            
            //Hago un condicional para saber si el año actual es bisiesto
                if($_POST["año"] % 4 == 0){
                    $diaMeses[1] = 29;
                }else{
                    $diaMeses[1] = 28;
                }
            
            $pos = 0;
            for ($i = 0; $i < sizeof($meses); $i++) {
                echo "<table>";
                echo "<tr>";
                echo "<th colspan=7>" . $meses[$numBoton] . "</th>";
                echo "</tr>";
                //x es el valor de los dias, empezando como dia inicial 1
                $x = 1;

                echo "<tr>";
                //Recorro los dias de la semana y los muestro
                foreach ($semana as $sem) {
                    echo "<th>" . $sem . " " . "</th>";
                }
                echo "</tr>";
                echo "<tr>";

                $blanco = 0;

                //Si el mes en el que estamos no es enero, me guardo en una variable el ultimo dia del mes anterior
                if ($meses[$numBoton] != "Enero") {
                    $ultimoNumero = $diaMeses[$i - 1] - ($pos - 1);
                } else {
                    $ultimoNumero = null;
                }

                //Mientras que mi variable blanco con valor 0 sea menor a la posicion del ultimo numero del mes anterior voy mostrando dichos dias
                while ($blanco < $pos) {
                    echo "<td class=nuevo>" . $ultimoNumero . "</td>";
                    $ultimoNumero++;
                    $blanco++;
                }

                $pos = 0;
                
                //Hago un bucle para ir mostrando los dias del mes actual sin pasarse del dia que tiene asociado dicho mes
                while ($x <= $diaMeses[$numBoton]) {

                    //Si el dia actual mas los espacios que se le sume al añadirle los dias del mes anterior, menos uno da de modulo de 7 un 0 se crea una nueva fila
                    //Como explicacion del porque se calcula quitandole uno, es porque lo que queremos son columnas de 7, 
                    //por lo que en la posicion 8 queremos estar ya abajo en la nueva fila, si no se pone el menos 1 estariamos creando 
                    //columnas de 6, ya que en la 7º posicion se crearia la fila
                    
                    //Ahora que lo estoy comentando se podría poner sin el menos 1 mostrando en pantalla el dia actual y luego crear la fila
                    
                    //ejemplo:
                    
                    /* if (((($x + $blanco)) % 7 == 0)) {
                     * 
                     * ponerDias($x, $i, $blanco);
                      echo"</tr>";
                      echo "<tr>";
                      //Si creo una fila la posicion vuelve a 0
                      $pos = 0;
                      } else { 

                     *                      */
                    
                    if (((($x + $blanco) - 1) % 7 == 0)) {
                        echo"</tr>";
                        echo "<tr>";
                        ponerDias($x, $numBoton, $blanco);
                        //Si creo una columna la posicion vuelve a 0
                        $pos = 0;
                    } else {
                        ponerDias($x, $numBoton, $blanco);
                    }
                    //Voy sumando los dias y la posicion en la que estoy para luego mostrar en el siguiente mes los ultimos dias de este mes
                    $x++;
                    $pos++;
                }

                ponerAño();

                echo "</table>";
            }
        }
        
        
        
        
        
        ?>
    </body>
</html>

