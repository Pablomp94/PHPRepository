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
        
        
        <div>
        
        <h1>INTRODUCE TUS DATOS</h1>

        <!--Si pones en el action PHP_SELF puedes recojer los datos en el mismo archivo-->
        
        <form action="PHP_SELF" method="POST">
            Nombre <input type="text" name="name"></br>
            E-mail  <input type="text" name="email"></br>
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
        
        
        
        
        
        
        if (isset($_FILES["name"])) {
        
        
        setcookie("usuario", $_FILES["name"], (time() + 3600), "/");
        setcookie("correo", $_FILES["email"], (time() + 3600), "/");
        
        
        echo "Bienvenido: " . $_COOKIE["usuario"] . "</br>";
        
        echo "Correo: " . $_COOKIE["correo"];
        
        }
        
        ?>
    </body>
</html>
