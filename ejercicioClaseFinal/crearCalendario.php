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
        button{
            margin-left: 15%;
            font-size: 18px;
        }
        button:hover{
            cursor: pointer;
            color: red;
        }
        form{

            font-size: 20px;

        }



        #sub{
            margin-left: 30%;
            background-color: lightblue;
        }

        #sub:hover{
            background-color: lightcoral;
            cursor: pointer;
        }

        input{
            margin-bottom:3%;
        }

        button:hover{
            cursor: pointer;
        }


        .error{
            color: red;
            font-weight: bold;
        }

    </style>
    <body>

        <?php
        $errorDia = $errorMes = $errorAño = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $diaForm = $_POST["dia"];
            $mesForm = $_POST["mes"];
            $añoForm = $_POST["año"];

            if (empty($diaForm)) {
                $errorDia = "El dia es obligatorio";
            } else {
                if (($diaForm > 31) || ($diaForm <= 0)) {
                    $errorDia = "El dia introducido no es correcto";
                }
            }


            if (empty($mesForm)) {
                $errorMes = "El mes es obligatorio";
            } else {
                if (($mesForm > 12) || ($mesForm <= 0)) {
                    $errorMes = "El mes introducido no es correcto";
                }
            }


            if (empty($añoForm)) {
                $errorAño = "El año es obligatorio";
            } else {
                if (($añoForm < 0)) {
                    $errorDia = "El año introducido no es correcto";
                }
            }


            //AÑADIR LAS VARIABLES A UN ARCHIVO TXT PARA LUEGO USARLO EN EL CALENDARIO

            $archivoEscribir = fopen("ficheroTexto.txt", "w");
            $texto = $diaForm . "/" . $mesForm . "&" . $añoForm;
            fwrite($archivoEscribir, $texto);
            fclose($archivoEscribir);
        }
        ?>




        <div>
            <table>
                <tr>
                <button><a href="subidaImagenes.php"></a>Subida de Imágenes</button>
                <button><a href="crearCalendario.php"></a>Crear calendario</button>
                <button><a href="eventoHistorico.php"></a>Evento Histórico</button>
                </tr>
            </table>
            <h1>Introduce los datos para el calendario</h1></br>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" enctype="multipart/form-data">
                <span class="error"><?php echo $errorDia ?></span></br>
                Dia: <input type="number" name="dia"></br>

                <span class="error"><?php echo $errorMes ?></span></br>
                Mes: <input type="number" name="mes"></br>

                <span class="error"><?php echo $errorAño ?></span></br>
                Año: <input type="number" name="año"></br>


                <button id="sub" type="submit" name="submit">Send</button>
                <button> <a href="calendario.php"></a>VER CALENDARIO</button>
            </form>


        </div>
    </body>
</html>
