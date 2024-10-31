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
            font-weight: bolder;
            text-align: center;
        }

        h1{
            color: blue;
        }
    </style>
    <body>
        <?php
        /* Los nombres de las variables tienen que empezar con 1 letra o
         * con un guion bajo.
         * Las variables pueden tener letras, numeros y _ 
         * diferenciando entre mayusculas y minusculas.
         */
        $nombre = "Juan"; //El nombre de la persona
        $_edad = 30; //La edad de la persona

        /* Es mas rapido que el print, por lo que mas aconsejable usar echo.
          Se pueden poner etiquetas html dentro de ambas. */
        echo"-------------------------------</br>";
        echo "Hola, $nombre. </br>";
        print "Tengo $_edad años.</br>";
        echo"-------------------------------</br>";

        /*
         *         -Ambito de las variables-
         * 
         * Locales:
         *     Variable dentro de una funcion.
         *     Solo accediendo dentro de la funcion.
         *     Se crean y se destruyen con la funcion.
         * 
         * 
         * Globales:
         *     Fuera de cualquier funcion.
         *     Se puede acceder desde cualquier parte del script de php.
         *     No se puede acceder dentro de las funciones, a no ser que 
         *     asignemos la variable como 'global'.
         */

        $y = 5;

        //Creamos la funcion 
        function nombreFuncion() {
            $x = 10; //Variable local
            echo $x . "</br>";
            global $y; //Se mete una variable global dentro de la funcion
            echo $y . "<br>";
            $y = 31231; //Se guarda el valor en la variable de forma global
            echo $y . "<br>";
        }

        //Llamamos a la funcion
        nombreFuncion();

        echo"-------------------------------</br>";

        //Si llamamos a la variable de la funcion fuera de esta sale error.

        /*
         *         -Buenas Practicas-
         * 
         * Nombres de las variables descriptivas
         * 
         * Convenciones:
         *     camelCase
         *     camel_case
         * 
         * Definir las variables comentando su funcionamiento breve
         * 
         */




        /*         -Variables estaticas-
         * 
         * Permite mantener su valor entre llamadas a funciones
         * Se declara usando la palabra 'static' delante de la variable
         * 
         */


        function incremento() {
            static $cuenta = 0;
            $cuenta++;
            echo $cuenta . "</br>";
        }

        incremento();
        incremento();
        incremento();

        echo"-------------------------------</br>";

        /*
         *          -Recomendaciones-
         * 
         * Priorizar variables locales 
         * Globales solamente cuando sea necesario
         * Usar variables estaticas solo cuando se necesite su uso recursivo
         * 
         */

        echo"<h1>-----CREACION DE VARIABLES A PARTIR DE OTRAS-----</br></h1>";

        //Creacion de vaiables a partir de otras
        $fruta = "manzana";
        $tipo = "fruta";

        "Esto en realidad seria como poner $fruta = naranja";
        "Ya que $tipo = fruta $$tipo es igual a $fruta";
        $$tipo = "naranja";

        echo $fruta;
        echo"</br>-------------------------------</br>";

        /*
         *          -Constantes Magicas-
         * 
         * __Line__ -> Nº Linea actual del archivo
         * __File__ -> Ruta y nombre del archivo
         * __Dir__ -> Directorio
         * __Function__ -> Nombre de la funcion
         * __Class__ -> Nombre de la clase 
         * __Method__ -> Nombre del metodo
         * 
         */


        /*
         *      -Buenas Practicas-
         * 
         * Constantes Magicas
         *      -Valores que nunca cambiaran
         *      -Variables en mayusculas
         */

        echo"<h1>-----------CONSTANTES MAGICAS----------</br></h1>";

        echo "Estamos en la linea: " . __Line__ . " del archivo: " . __File__;
        echo"</br>-------------------------------</br>";

        /*
         *      -Boolean-
         * $algo = True  ---> 1
         * $algo = False ---> Null
         * 
         *      -Float-
         * $cientifico = 2.5e5 => 2.5x10(elevado a)5 --> 250000
         * 
         */


        echo"<h1>-----------ARRAYS----------</br></h1>";

        $array = array(1, 2, 3);
        
        echo "Array con foreach:";
        echo "</br>";
        
        foreach ($array as $valor) {
            echo $valor . ", ";
        }
        
        echo "</br>";
        echo "Array con bucle for:";
        echo "</br>";
        
        for($i = 0; $i < sizeof($array); $i++){
            echo $array[$i] . " ";
        }

        echo "</br>Tamaño del array: " . sizeof($array);

        echo"</br>-------------------------------</br>";

        //Array Asociativo
        $arrayAsociativo = ["nombre" => "Juan", "edad" => 30];
        
        echo $arrayAsociativo["nombre"];
        echo "</br>";
        foreach ($arrayAsociativo as $clave => $valor) {
            echo $clave . " : " . $valor . "</br>";
        }

        
        echo"-------------------------------</br>";

        /*
         *           -CLASES-
         * 
         * Programacion Orientada a Objetos en PHP
         * 
         * Clase
         *  -Plantilla que define: Propiedades y Comportamientos (metodos)
         *  -Objetos son las creadas a partir de una clase
         *  
         * 
         */


        echo"<h1>-----------CLASES----------</br></h1>";

        //Llamamos a la clase Persona del archivo Persona.php
        //Lo ideal es usar la importacion arriba del todo
        require_once 'Persona.php';

        //Creamos una persona a partir de la clase
        $personaUno = new Persona();
        $personaUno->nombre = "David";
        $personaUno->edad = 20;
        //Usamos la funcion dentro de la clase para imprimir
        $personaUno->imprimirDatos();
        
        echo "</br>";
        
        $personaDos = new Persona();
        $personaDos->nombre = "Pablo";
        $personaDos->edad = 20;
        $personaDos->imprimirDatos();
        
        echo"-------------------------------</br>";

        echo"<h1>-----------ARCHIVO TXT----------</br></h1>";

        /*
         * Hay funcionalidades interesantes y utiles
         * como puede ser la de abrir un archivo txt y ver su contenido
         */



        //Abrimos el archivo
        //La r es de modo de lectura
        $archivo = fopen("ficheroTexto.txt", "r");

        //Ahora para ver el contenido dentro del archivo
        $contenido = fread($archivo, filesize("ficheroTexto.txt"));
        //Cerramos el archivo
        fclose($archivo);

        /* //Se puede escribir en el fichero desde aqui
          $archivoEscribir = fopen("ficheroTexto.txt", "w");
          $texto = $contenido . " " . " Nuevo texto a añadir.";
          fwrite($archivoEscribir, $texto);
          fclose($archivoEscribir); */

        //La r es de modo de lectura
        $archivo = fopen("ficheroTexto.txt", "r");
        //Ahora para ver el contenido dentro del archivo
        $nuevoContenido = fread($archivo, filesize("ficheroTexto.txt"));
        //Cerramos el archivo
        fclose($archivo);

        //Para mostrar el contenido por pantalla
        echo $nuevoContenido;

        
        echo"<h1>-----------CONVERSION DE VARIABLES----------</br></h1>";
        
        /*
         *  Importante para la gestion de usuarios y base de datos.
         *  Asi como la validacion de entradas y salidas. 
         */
        
        $numero = 5;
        $cadena = (string)$numero;
        //$cadena = "5";
        
        //PHP realiza conversiones automaticas cuando es necesario
        $resultado = "10" + 5;
        echo $resultado; //15;
        
        echo "</br>";
        //Puedes saber el tipo de una variable 
        $valor = 42;
        var_dump($valor); //int(42);
        
        
        echo"<h1>-----------------BUCLES-----------------</br></h1>";
        
        echo "Saltarte una posicion en el bucle for: </br>";
        
        for($i = 0; $i<=10; $i++){
            
            if($i == 5){
                continue;
            }
            
            echo $i . " ";
        }
        
        echo "</br>";
        
        ?>
    </body>
</html>
