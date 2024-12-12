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
            margin-left: 10px;
        }
        h1{
            font-size: 50px;
        }
        div{
            margin-top: 10px;
            border: black solid 3px;
        }
    </style>
    
    <body>
        <h1>BIENVENIDO A SUPERMECADOS ALBARES</h1>
        <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
            <input type="number" name="kilosUno"> 
            <select name="frutaUno"> 
                <option value="1">Manzanas (1$/Kg)</option>
                <option value="3">Tomates (3$/Kg)</option>
                <option value="5">Aguacates (5$/Kg)</option>
            </select>
            </br>
            <input type="number" name="kilosDos"> 
            <select name="frutaDos"> 
                <option value="1">Manzanas (1$/Kg)</option>
                <option value="3">Tomates (3$/Kg)</option>
                <option value="5">Aguacates (5$/Kg)</option>
            </select>
            </br>
            <input type="number" name="kilosTres"> 
            <select name="frutaTres"> 
                <option value="1">Manzanas (1$/Kg)</option>
                <option value="3">Tomates (3$/Kg)</option>
                <option value="5">Aguacates (5$/Kg)</option>
            </select>
            </br></br>
            <button type="submit">Enviar</button>
        </form>

        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $fUno = $_POST["frutaUno"];
            $kUno = $_POST["kilosUno"];
            
            switch ($fUno) {
                case 1:
                    $frutaUno = "manzanas";

                    break;
                
                case 3:
                    $frutaUno = "tomates";
                    break;
                
                case 5:
                    $frutaUno = "aguacates";
                    break;
                
                
                default:
                    break;
            }
            
            
            

            $totalUno = ($fUno * $kUno);

            $fDos = $_POST["frutaDos"];
            $kDos = $_POST["kilosDos"];

            switch ($fDos) {
                case 1:
                    $frutaDos = "manzanas";

                    break;
                
                case 3:
                    $frutaDos = "tomates";
                    break;
                
                case 5:
                    $frutaDos = "aguacates";
                    break;
                
                
                default:
                    break;
            }
            
            
            
            
            
            $totalDos = ($fDos * $kDos);

            $fTres = $_POST["frutaTres"];
            $kTres = $_POST["kilosTres"];

            
            switch ($fTres) {
                case 1:
                    $frutaTres = "manzanas";

                    break;
                
                case 3:
                    $frutaTres = "tomates";
                    break;
                
                case 5:
                    $frutaTres = "aguacates";
                    break;
                
                
                default:
                    break;
            }
            
            
            $totalTres = ($fTres * $kTres);
            
            $total = ($totalUno + $totalDos + $totalTres);
            
            echo "<div>";
            echo "<h1>Su carrito de la compra es:</h1></br>";
            
            if($frutaUno == "manzanas"){
                 echo "Ha seleccionado " . $kUno . " kg. de " . $frutaUno . ".Precio total de las " . $frutaUno . ": " . $totalUno . "€.</br>";
            }else{
                echo "Ha seleccionado " . $kUno . " kg. de " . $frutaUno . ".Precio total de los " . $frutaUno . ": " . $totalUno . "€.</br>";
            }
            
           if($frutaDos == "manzanas"){
               echo "Ha seleccionado " . $kDos . " kg. de " . $frutaDos . ".Precio total de las " . $frutaDos . ": " . $totalDos . "€.</br>";
           }else{
               echo "Ha seleccionado " . $kDos . " kg. de " . $frutaDos . ".Precio total de los " . $frutaDos . ": " . $totalDos . "€.</br>";
           }
            
           if($frutaTres == "manzanas"){
               echo "Ha seleccionado " . $kTres . " kg. de " . $frutaTres . ".Precio total de las " . $frutaTres . ": " . $totalTres . "€.";
           }else{
               echo "Ha seleccionado " . $kTres . " kg. de " . $frutaTres . ".Precio total de los " . $frutaTres . ": " . $totalTres . "€.";
           }
            
            echo "</br>";
            
            echo "-----------------------------------------------------</br>";
            echo "El precio total es: " .  $total . "€.";
            echo "</div>";
        }
        ?>
    </body>
</html>
