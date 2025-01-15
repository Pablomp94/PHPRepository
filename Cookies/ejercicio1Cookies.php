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

        .error{
            color: red;
        }

        *{
            font-size: 30px;
            margin: auto;
            text-align: center;
            background-color: lightgrey;
        }
        
        input{
            margin-right: 20px;
            position: relative;
            margin-bottom: 10px;
        }
        
        
        
        h1{
            border: solid 3px black;
            margin-bottom: 15px; 
        }

    </style>
    <body>

        <?php
        //Inicializacion de variables
        //Variables de errores
        $nombreError = $apunoError = $apedosError = $dniError = $telefonoError = $correoError = $tarjetaError = " ";

        //Creo una serie de flags para ayudarme a la verificacion de pasos anteriores en la comprobacion de los datos introducidos
        /* Si la flag esta a 0 es que hay error, y si esta a 1 significa que esta bien introducido, ya que en la comprobacion al estar
         * bien introducido lo igualare a 1 */
        $nombreFlag = $apeunoFlag = $apedosFlag = $dniFlag = $telefonoFlag = $correoFlag = $tarjetaFlag = 0;

        //VALIDACION ERRORES
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            //Nombre
            if (empty($_POST["name"])) {
                $nombreError = "Nombre obligatorio </br>";
            } else {
                $nombreFlag = 1;
            }

            //ApellidoUno
            if (empty($_POST["apellidoUno"])) {
                $apunoError = "1º Apellido obligatorio </br>";
            } else {
                $apeunoFlag = 1;
            }

            //ApellidoDos
            if (empty($_POST["apellidoDos"])) {
                $apedosError = "2º Apellido obligatorio </br>";
            } else {
                $apedosFlag = 1;
            }

            //DNI
            //Aqui hay que hacer dos comprobaciones, de si esta vacio que lo introduzca, 
            //y tiene que comprobarse que tiene 8 números seguidos de una letra.
            if (empty($_POST["dni"])) {
                $dniError = "Dni obligatorio </br>";
            } else {
                $dni = $_POST["dni"];
                // Validar el formato del DNI (8 números seguidos de una letra)
                //Si la comprobacion no es correcta que salte el error, si lo es, activo mi variable de Flag
                if (!preg_match("/^[0-9]{8}[A-Za-z]$/", $dni)) {
                    $dniError = "El DNI debe contener 8 números seguidos de una letra. </br>";
                } else {
                    $dniFlag = 1;
                }
            }

            //Telefono
            //Aqui hay que hacer dos comprobaciones, de si esta vacio que lo introduzca, 
            //y tiene que comprobarse que tiene 9 digitos.
            if (empty($_POST["telefono"])) {
                $telefonoError = "Telefono obligatorio </br>";
            } else {
                $telef = $_POST["telefono"];
                // Validar el formato del telefono (tiene que tener 9 digitos)
                //Si la comprobacion no es correcta que salte el error, si lo es, activo mi variable de Flag
                if (!preg_match("/^[0-9]{9}$/", $telef)) {
                    $telefonoError = "El Telefono debe contener 9 digitos. </br>";
                } else {
                    $telefonoFlag = 1;
                }
            }


            //Correo
            //Aqui hay que hacer dos comprobaciones, de si esta vacio que lo introduzca, 
            //y tiene que comprobarse que tiene un nombre_de_usuario@dominio.xyz 
            if (empty($_POST["email"])) {
                $correoError = "Correo obligatorio </br>";
            } else {
                $correo = $_POST["email"];
                // Validar el formato del email (tiene que tener un nombre_de_usuario@dominio.xyz)
                //Si la comprobacion no es correcta que salte el error, si lo es, activo mi variable de Flag
                //
                // Lista de dominios permitidos
                $dominiosPermitidos = ["gmail", "yahoo", "hotmail", "outlook"];

                // Validar el formato general del correo
                if (preg_match("/^[a-zA-Z0-9._%+-]+@([a-zA-Z0-9.-]+)\.([a-zA-Z]{3})$/", $correo, $matches)) {
                    // Extraer el dominio principal (antes del ".xyz")
                    $dominioExtraido = explode('.', $matches[1])[0];

                    // Comprobar si el dominio está en la lista de permitidos
                    if (in_array($dominioExtraido, $dominiosPermitidos)) {
                        $correoFlag = 1; // Activar flag si es válido
                    } else {
                        $correoError = "El dominio '$dominioExtraido' no está permitido. </br>";
                    }
                } else {
                    $correoError = "El correo debe tener el formato nombre_de_usuario@dominio.xyz </br>";
                }
            }

            //Tarjeta
            //Aqui hay que hacer dos comprobaciones, de si esta vacio que lo introduzca, 
            //y tiene que comprobarse que tiene 16 números, de 4 en 4 separados por un espacio.
            if (empty($_POST["tarjeta"])) {
                $tarjetaError = "Numero de tarjeta obligatorio </br>";
            } else {
                $tarjet = $_POST["tarjeta"];
                // Validar el formato de la tarjeta (tiene que tener 16 números, de 4 en 4 separados por un espacio.)
                //Si la comprobacion no es correcta que salte el error, si lo es, activo mi variable de Flag
                if (!preg_match("/^(\d{4} ){3}\d{4}$/", $tarjet)) {
                    $tarjetaError = "La tarjeta debe contener 16 números, de 4 en 4 separados por un espacio. </br>";
                } else {
                    $tarjetaFlag = 1;
                }
            }
        }
        ?>



        <div>

            <h1>INTRODUCE TUS DATOS</h1>

            <!--Si pones en el action PHP_SELF puedes recojer los datos en el mismo archivo-->

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">

                <span class="error"><?php echo $nombreError ?></span>
                Nombre <input type="text" name="name"></br>

                <span class="error"><?php echo $apunoError ?></span>
                1º Apellido <input type="text" name="apellidoUno"></br>

                <span class="error"><?php echo $apedosError ?></span>
                2º Apellido <input type="text" name="apellidoDos"></br>

                <span class="error"><?php echo $dniError ?></span>
                DNI  <input type="text" name="dni"></br>

                <span class="error"><?php echo $telefonoError ?></span>
                Telefono  <input type="number" name="telefono"></br>

                <span class="error"><?php echo $correoError ?></span>
                E-mail  <input type="text" name="email"></br>

                <span class="error"><?php echo $tarjetaError ?></span>
                Tarjeta de Credito  <input type="text" name="tarjeta"></br>
                <input id="sub" type="submit">
            </form>
        </div>






        <?php
        /*
         *                      -COOKIES-
         * 
         * Son pequeños archivos de texto que los sitios web 
         * almacenan en el navegador del usuario.
         * 
         * Son una memoria temporal.
         * 
         * Permite que una app web recuerde informacion sobre la visita 
         * de un usuario.
         * 
         * 
         * 
         * EJEMPLO: Preferencias de usuario / contenido del carrito de la compra
         *          Configuracion del usuario 
         * 
         * UTILIDAD: Personalizacion / Sesiones / Seguimiento / Publicidad 
         * 
         * COMO FUNCIONAN: 
         * 
         *      setcookie(); =>  Para crear o modificar una cookie.
         * 
         *      $_COOKIE => Array superglobal que contiene todas las cookies 
         *                  enviadas al navegador.
         * 
         */



        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            //Arrays con los datos necesarios para ir creando las cookies
            $nombresCookies = ["nombreCookie", "apeunoCookie", "apedosCookie", "dniCookie", "telefonoCookie", "correoCookie", "tarjetaCookie"];
            $flags = [$nombreFlag, $apeunoFlag, $apedosFlag, $dniFlag, $telefonoFlag, $correoFlag, $tarjetaFlag];
            $datos = ["name", "apellidoUno", "apellidoDos", "dni", "telefono", "email", "tarjeta"];
            $description = ["Nombre", "1º Apellido", "2º Apellido", "DNI", "Telefono", "Email", "Tarjeta"];
            
            //Creo un bucle que recorra todos los flags y que vaya creando las cookies
            //Valido que la flag me indique si esta todo bien 
            for ($i = 0; $i < sizeof($flags); $i++) {
                if ($flags[$i] == 1) {
                    //Ponemos el valor de la variable que nos va a servir para crear la cookie, siendo el nombre que va a tener la cookie
                    $nameCookie = $nombresCookies[$i];
                    //Validamos si la cookie ya ha sido creada o no
                    //Si no ha sido creada la creamos 
                    if (!isset($_COOKIE[$nameCookie])) {
                        //Llamo a la funcion con el nombre que le quiero poner a la cookie
                        crearCookie($nameCookie, $datos[$i]);
                    } else {
                        //Si ha sido ya creada tenemos que eliminarla para volver a crearla nuevamente, 
                        //Para que su tiempo de existencia se reinicie
                        eliminarCookie($nameCookie, $datos[$i]);
                    }
                    //Ponemos la variable a null para evitar errores
                    $nameCookie = null;
                }
            }

            //Muestro los resultados si todos los flags estan bien

            if ($nombreFlag == 1 && $apeunoFlag == 1 && $apedosFlag == 1 && $dniFlag == 1 && $telefonoFlag == 1 && $correoFlag == 1 && $tarjetaFlag == 1) {
                // Código a ejecutar si todas las variables son iguales a 1
                //Hago un bucle para recorrer todos las cookies y mostrarlas:
                for($x = 0; $x < sizeof($nombresCookies); $x++){
                    echo "<h1> " . $description[$x] . ": " . $_COOKIE[$nombresCookies[$x]] . "</h1>";
                }
            }
        }

        //FUNCIONES
        //Como vamos a estar creando y eliminando varias veces COOKIES me voy a crear unas funciones,
        //para facilitar y optimizar el codigo
        //Funcion de la creacion de la Cookie
        function crearCookie($nameCookie, $valor) {
            //La creamos con setcookie y 60*60*24 seg*min*h para la duracion de un dia
            setcookie("$nameCookie", $_POST[$valor], (time() + (60 * 60 * 24)), "/");
        }

        //Funcion de la eliminacion de la Cookie
        function eliminarCookie($nameCookie, $valor) {
            //Eliminamos la cookie correspondiente
            setcookie("$nameCookie", $_POST[$valor], time() - (60 * 60 * 24)); // Para eliminarla le restamos el tiempo de vida que se le asigno

            /* Como se va a volver a crear la cookie despues de eliminarla, en vez de llamar a la otra
             * funcion para crear la cookie, directamente la crearemos dentro de esta misma funcion
             * justo despues de eliminarla.
             */

            //La creamos con setcookie y 60*60*24 seg*min*h para la duracion de un dia
            setcookie("$nameCookie", $_POST[$valor], (time() + (60 * 60 * 24)), "/");
        }
        ?>
    </body>
</html>
