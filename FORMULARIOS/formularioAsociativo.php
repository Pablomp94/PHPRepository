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
        $arrayDatos = ["nombre" =>$_POST["name"], "email" => $_POST["email"]];

        
        if(array_key_exists("nombre", $arrayDatos) == True){
            echo "El valor nombre existe.";
        }else{
            echo "El valor nombre no existe";
        }
        ?>


    </body>
</html>

