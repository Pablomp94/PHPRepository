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
            font-size: 40px;

        }


       
       

    </style>
    <body>

        <?php
        
        $arrayDatos = [$_POST["name"], $_POST["email"]];

        echo "Hola: " . $arrayDatos[0] . "</br>";
        

        if(empty($arrayDatos[1]) == True){
            echo "No has introducido un email";
        }else{
            echo "Tu email es: " . $arrayDatos[1] . "</br>";
            sacarDatos($arrayDatos[1]);
        }
        
        
        function sacarDatos($email) {
            $arrayEmail = str_split($email);

            for ($i = (count($arrayEmail) - 1); $i >= 0; $i--) {
                if ($arrayEmail[$i] == ".") {
                    $punto = $i;
                    break;
                }
            }


            $numArroba = strpos($email, "@");

            $derecha = substr($email, $numArroba + 1, ($punto - ($numArroba + 1)));

            $izquierda = substr($email, 0, ($numArroba));

            echo "Derecha: " . $derecha;

            echo "</br>";

            echo "Izquierda: " . $izquierda;
        }
        ?>


    </body>
</html>

