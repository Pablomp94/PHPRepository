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
    <body>
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
         * 
         */
        
        
        setcookie("usuario", "Juan", (time() + 3600), "/");
        setcookie("correo", "juan@gmail.com", (time() + 3600), "/");
        
        
        echo "Bienvenido: " . $_COOKIE["usuario"] . "</br>";
        
        echo "Correo: " . $_COOKIE["correo"];
        
        
        
        ?>
    </body>
</html>
