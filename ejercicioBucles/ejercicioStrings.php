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
            font-size: 20px;
            justify-content: center;
            margin: 20%;
        }



    </style>
    <body>
        <?php
        /*
         * EJERCICIO: 
         * 
         * 
         * Repetir Paco
         * Que cuente las veces que sale Paco
         * Que en ultimo Paco de todos sea Luis
         * Primera letra en minuscula
         * En la 3º linea, añadir cada 4 caracteres una coma
         */
        $num = 0;
        $palabra = "Paco";
        $nuevaPalabra = "Luis";
        $numLuis = 0;
        $long = strlen($palabra);

        for ($i = 0; $i <= 15; $i++) {
            if ($i % 2 != 0) {
                $frase = str_repeat($palabra, $i);
                $longitud = strlen($frase);

                $frasesinUlt = substr($frase, 0, ($longitud - $long));
                $nuevoString = $nuevaPalabra;

                $fraseFinal = $frasesinUlt . $nuevoString;

                $longitud2 = strlen($fraseFinal);
                $primeraLetra = substr($fraseFinal, 0, 1);

                $frasesinPrimera = substr($fraseFinal, 1, $longitud2);

                $fraseFinal2 = (strtolower($primeraLetra) . $frasesinPrimera);

                if ($i == 5) {



                    $j = 0;

                    for ($x = 0; $x < $longitud2; $x++) {

                        if ($x % 4 == 0) {

                            $str = substr($fraseFinal2, $x, 4);

                            $array[$j] = $str;
                            $j++;
                        }

                        $x++;
                    }

                    for ($j = 0; $j < sizeof($array); $j++) {
                        echo $array[$j] . ",";
                    }
                } else {
                    echo $fraseFinal2;
                }


                $num = $num + ($i - 1);
                echo "</br>";

                $numLuis++;
            }
        }
        echo "Paco sale: " . $num . " veces.</br>";
        echo "Luis sale: " . $numLuis . " veces.";
        ?>
    </body>
</html>

