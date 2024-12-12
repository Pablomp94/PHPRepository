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
        h1{
            font-size: 50px;
        }

        #error{
            border: 5px black solid;
            font-weight: bold;
            color:red;
        }
    </style>

    <body>

        <h1>EMAIL</h1>
        <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" enctype="multipart/form-data">
            E-MAIL: 
            </br><input type="text" name="email">
            </br></br>
            <button name="submit">ENVIAR</button>
            </br></br>
        </form>



        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<h1>Your Input:</br></h1>";
            echo "</br>";
            
            $email = $_POST["email"];  
            
            echo $email . "</br>";
            echo "</br></br>";
            
            $arroba = strpos($email, "@");
            $punto = strripos($email, ".");
            $longitud = strlen($email);
            
            
            $izq = substr($email,0, $arroba);
            $der = substr($email, $arroba+1, $punto-$arroba-1);
            
            
            echo "Izquierda: " . $izq;
            echo "</br>";
            echo "Derecha: " . $der;
            
        }
        ?>


    </body>
</html>
