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
        table, td{
            border: 5px, black, solid;
            
        }
        *{
            font-size: 40px;
        }
        
        #normal{
            background-color: lightblue;
        }
        
        #reves{
            background-color: lightcoral;
        }
    </style>
    <body>
        <?php
        $numerosNormal = [1];
        $comp = True;
        $num = 2;
        $pos = sizeof($numerosNormal);
        $espacio = 0;
        $y = 1;
        echo "<table id=normal>";
        echo "<tr>";

        while ($y < 15) {
            for ($i = 0; $i < sizeof($numerosNormal); $i++) {

                if ($espacio == 15) {
                    echo "<tr>";
                    $espacio = 0;
                    $y++;
                    if ($y > 15) {
                        break;
                    }
                }

                echo "<td>" . $numerosNormal[$i] . "</td>";

                $espacio++;
            }
            if ($y < 15) {
                $numerosNormal[$pos] = $num;
                $pos++;
                $num++;
            }
        }

        echo "</tr>";

        echo "</table>";

        echo "<table id=reves>";
        echo "<tr>";

        $longt = sizeof($numerosNormal);

        $y = 1;
        $vuelta = 1;
        while ($y <= 15) {

            for ($i = ($longt - $vuelta); $i >= 0; $i--) {

                if ($espacio == 15) {
                    echo "<tr>";
                    $espacio = 0;
                    $y++;
                    if ($y > 15) {
                        break;
                    }
                }

                
                if($i == ($longt) ){
                    $i = $i - 1;
                }
                
                
                echo "<td>" . $numerosNormal[($i)] . "</td>";
                $espacio++;
                
            }
            $vuelta ++;
        }
        
        echo "</tr>";

        echo "</table>";
        ?>
    </body>
</html>


