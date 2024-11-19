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


    </style>
    <body>
        <?php
        /*
         * FORMULARIOS HTML: GET Y POST
         * 
         * GET:
         * 
         * Los datos van en la URL (ejemplo.com/pagina.php?nombre="Juan"&edad=30)
         * Visibilidad: Visibles para el usuario en la barra de direcciones.(Problemas seguridad).
         * Limitacion de tamaño: Si.
         * Usos: Envio de pequeñas cantidades de datos.
         * 
         * 
         * 
         * 
         * POST:
         * 
         * Los datos estan en el cuerpo de la solicitud HTTP.
         * No es visible para el usuario. Y no es visible en la barra de direcciones.
         * Seguridad: Mas seguro ante datos sensibles.(contraseñas, etc).
         * Mayor capacidad que el metodo GET: Grandes catidades de datos.
         * 
         * 
         * 
         * 
         * ESTOS METODOS LOS UTILIZAMOS PARA:
         * 
         * Enviar formularios
         * Subir archivos
         * Transacciones seguras
         * etc
         * 
         * 
         * HTTP puerto 80 y HTTPS puerto 443
         * 
         */
        ?>

        <form action="paginasDinamicas.php" method="POST">
            Name: <input type="text" name="name"></br>
            E-mail:  <input type="text" name="email"></br>
            <input type="submit">
        </form>

        <?php
        
        //Si llamamos al mismo fichero nos dara warning mientras los valores no existan
        echo "Hola: " . $_POST["name"] . "</br>";
        echo "Tu email es: " . $_POST["email"] . "</br>";
        
        
        ?>
    </body>
</html>

