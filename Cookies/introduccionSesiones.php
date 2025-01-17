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
         *                      -SESIONES-
         * 
         * -Mecanismo que permite almacenar informacion sobre un usuario
         *  a lo largo de multiples solicitudes HTTP.
         * 
         * 
         * -Las COOKIES se cargan en el navegador
         * -Las SESIONES se cargan en el servidor
         * 
         * 
         * -FUNCIONAMIENTO
         * 
         *      1. Inicio de sesion de un usuario => Visita web por 1º vez.
         *          PHP genera un ID de sesion unico y lo envia al navegador.
         *              
         *      2. Almacenamiento de datos:
         *          Se guardan los datos de la sesion en un archivo
         *          en el servidor, asociado al ID de la sesion.
         * 
         *      
         *      3. Acceso a datos:
         *          El navegador envia la ID de sesion al servidor.
         *          PHP usa esta ID para recuperar los datos de la sesion
         *          y ponerlo a disposicion de vuestro codigo => $_SESSION .
         * 
         *  
         *      4. Finalizacion de sesion:
         *          De forma automatica al cerrar el navegador.
         *          O de forma manual con la funcion session_destroy();
         *          
         * 
         * 
         * -Funciones principales sesiones PHP
         * 
         *      session_start() => Inicia una nueva sesion o reanuda una existente.
         *      
         *      session_id() => Devuelve o establece el ID de sesion actual.
         * 
         *      sesion_destroy() => Destruye la sesion.
         * 
         * 
         */
        
        
        
        
        ?>
    </body>
</html>
