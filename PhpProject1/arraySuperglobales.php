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
        
     
        
    </style>
    <body>

        <?php
        /*
         *
         * ARRAYS SUPERGLOBALES EN PHP
         * 
         * $_SERVER -> Informacion sobre servidor web y entorno de ejecucion
         * 
         * $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; //URL ACTUAL
         * 
         * $_SERVER['REQUEST_METHOD']; //METODO USADO (GET O POST)
         * 
         * $_SERVER['REMOTE_ADDR']; //OBTENER IP DEL CLIENTE
         * 
         * 
         * $_SERVER['HTTP_USER_AGENT']; //OBTENER NAVEGADOR DEL USUARIO
         * 
         * 
         * $_GET[ ] //CONTIENE VARIABLES PASADAS AL SCRIPT ACTUAL A TRAVES DE PARAMETROS DE LA URL
         * 
         * 
         * USOS:
         *  Redirecciones segun dispositivo
         *  Loggin de accesos
         *  Validaciones de seguridad
         *  Personalizacion segun el cliente
         *  
         * 
         * 
         */
        
        echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; // URL ACTUAL
        
        echo "</br>";
        
        echo $_SERVER['REQUEST_METHOD'];
        
        echo "</br>";
        
        echo $_SERVER['REMOTE_ADDR']; //OBTENER IP DEL CLIENTE
        
        echo "</br>";
        
        echo $_SERVER['HTTP_USER_AGENT']; //OBTENER NAVEGADOR DEL USUARIO
        
        ?>
        
    </body>
</html>
