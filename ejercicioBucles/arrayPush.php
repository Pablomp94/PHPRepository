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
            font-size: 50px;
        }

        table, td{
            text-align: center;
            border: 20px, solid, black;
        }
        th{
            padding: 20px;
        }

        table{
            margin-bottom: 20px;
            margin-left: 8%;
        }

    </style>
    <body>
        <?php
        $empleados = [
            ["nombre" => "Juan", "edad" => 30, "departamento" => "IT"],
            ["nombre" => "María", "edad" => 28, "departamento" => "Marketing"],
            ["nombre" => "Carlos", "edad" => 35, "departamento" => "Ventas"]
        ];

        $frutas = ["manzana", "banana"];

        array_push($frutas, "cereza");

        for ($i = 0; $i < count($frutas); $i++) {
            echo $frutas[$i];
            echo "</br>";
        }
        
        echo "------------------------";
        echo "</br>";
        
        for ($x = 0; $x <= 2; $x++) {
            array_push($frutas, $empleados[$x]["nombre"]);
        }

        for ($i = 0; $i < count($frutas); $i++) {
            echo $frutas[$i];
            echo "</br>";
        }

        echo "---------------------------------";
        echo "</br>";

        array_pop($frutas); //ELIMINO LA ULTIMA POSICION

        for ($i = 0; $i < count($frutas); $i++) {
            echo $frutas[$i];
            echo "</br>";
        }

        $posicion = array_search("pera", $frutas); //DEVUELVE LA POSICION DE LO QUE SE BUSCA


        existe($posicion);

        function existe($posicion) {
            //DEVUELVE TRUE OR FALSE SI ES UN NUMERO O NO
            //TMBN SE PUEDE HACER CON != null PARA COMPROBAR SI POSICION NO ES NULO
            if (is_integer($posicion) == TRUE) {
                echo "El elemento esta en la posicion: " . $posicion . ".";
            } else {
                echo "El elemento no existe.";
            }
        }

        echo "</br>";
        echo "---------------------------------";
        echo "</br>";

        echo "ORDENAR ARRAYS";
        echo "</br>";

        $numeros = [3, 1, 4, 8, 2, 5, 7, 9, 6, 10];

        for ($i = 0; $i < count($numeros); $i++) {
            echo $numeros[$i] . ",";
        }

        echo "</br>";
        echo "------------------------";
        echo "</br>";

        //ORDENA NUMERICAMENTE Y ALFABETICAMENTE
        sort($numeros);

        for ($i = 0; $i < count($numeros); $i++) {
            echo $numeros[$i] . ",";
        }
        
        
        echo "</br>";
        echo "---------------------------------";
        echo "</br>";
        
        
        echo "-------------FUSION DE ARRAYS-------------";
        echo "</br>";
        
        
        $array1 = ["color" => "rojo", 2, 4];
        $array2 = ["a", "b", "color" => "verde", "forma" => "trapezoide", 4];
        
        //FUSIONA AMBOS ARRAYS
        $resultado = array_merge($array1, $array2);
        
        print_r($resultado);
        
        
        echo "</br>";
        echo "---------------------------------";
        echo "</br>";
        
        
        echo "-------------FILTRADO DE ARRAYS-------------";
        echo "</br>";
        
        
        $num = [1,2,3,4,5,6,7,8,9,10];
        
        //FILTRO QUE SACA SOLO LOS PARES HACIENDO USO DEL MODULO
        $pares = array_filter($num, function($n){return $n % 2 == 0;});
        
        print_r($pares);
        
        ?>
    </body>
</html>

