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
            font-size: 30px;
        }
        h1{
            font-size: 50px;
        }
        .obligatorio{
            color:red;
        }
        #sp{
            border: 5px black solid;
            font-weight: bold;
        }
    </style>

    <body>

        <?php
        $flag = 0;
        $errorUno = $errorDos = $errorTres = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {


            if (empty($_POST["numeroUno"]) || ($_POST["numeroUno"] == null)) {
                $uno = 0;
                $errorUno = "No has introducido el 1º número";
            } else {
                $uno = $_POST["numeroUno"];
            }

            if (empty($_POST["numeroDos"]) || ($_POST["numeroDos"] == null)) {
                $dos = 0;
                $errorDos = "No has introducido el 2º número";
            } else {
                $dos = $_POST["numeroDos"];
            }



            if (empty($_POST["operacion"]) || ($_POST["operacion"] == null)) {
                $errorTres = "Tienes que seleccionar una operación.";
            } else {


                switch ($_POST["operacion"]) {
                    case "suma":

                        $total = ($uno + $dos);

                        break;
                    case "resta":

                        $total = ($uno - $dos);

                        break;
                    case "multiplicacion":

                        $total = ($uno * $dos);

                        break;
                    case "division":

                        $total = ($uno / $dos);

                        break;
                    case "modulo":

                        $total = ($uno % $dos);

                        break;
                    default:
                        break;
                }
                $flag = 1;
            }
        }
        ?>


        <h1>Mi Calculadora PHP</h1>
        <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
            <span class="obligatorio">* campo requerido</span></br>
            </br>Introduce el 1º número: <input type="number" name="numeroUno">
            <span class="obligatorio"><?php echo "* " . $errorUno ?></span>
            </br>

            Introduce el 2º número: <input type="number" name="numeroDos"> 
            <span class="obligatorio"><?php echo "* " . $errorDos ?></span>
            </br>
            Operación Matemática a relizar: 
            <input type="radio" name="operacion" value="suma">+ Suma
            <input type="radio" name="operacion" value="resta">- Resta
            <input type="radio" name="operacion" value="multiplicacion">* Multiplicación
            <input type="radio" name="operacion" value="division">/ División
            <input type="radio" name="operacion" value="modulo">% Modulo
            <span class="obligatorio"><?php echo "* " . $errorTres ?></span></br>
            </br>
            <button type="submit">Enviar</button>
        </form>



        <?php
        if ($flag == 1) {
            echo "</br><h1>Has introducido:</h1>";
            echo "</br>Número 1: " . $uno . "</br>";
            echo "Número 2: " . $dos . "</br>";
            echo "Resultado de la operación <span id=sp>" . $_POST["operacion"] . "</span>" . ": " . number_format($total, 3);
        } else {
            echo "</br><h1>Has introducido:</h1>";
            echo "</br>Número 1: " . 0 . "</br>";
            echo "Número 2: " . 0 . "</br>";
            echo "Resultado de la operación: " . 0;
        }
        ?>


    </body>
</html>
