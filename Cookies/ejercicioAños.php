<?php
//DESDE EL AÑO 01/01/20 al 30/01/25

/* - 2 primeros dígitos representan número del día.
  - 2 dígitos del medio el número de mes.
  - 2 dígitos finales número de año.
  - Hacer todos los meses de 30 días.
  - 12 meses.
  A posteriori, desarrolla el código para extraer cada línea del .txt e ir verificando contra una
  contraseña de muestra “231123” hasheada, hacerlo con el password_verify(…);
 * 
 */


$flag = 0;
$texto = "";
$textoCifrado ="";

for ($a = 23; $a <= (25); $a++) {
    for ($m = 1; $m <= (12); $m++) {
        for ($d = 1; $d <= (30); $d++) {
            if ($flag == 0) {
                if ($d < 10) {
                    echo "0" . $d . "/";
                    $texto = $texto . "0" . $d . "/";
                    
                } else {
                    echo $d . "/";
                    $texto = $texto . $d . "/";
                }
                if ($m < 10) {
                    echo "0" . $m . "/";
                    $texto = $texto . "0" . $m . "/";
                } else {
                    echo $m . "/";
                    $texto = $texto . $m . "/";
                }
                echo $a . "</br>";
                $texto = $texto . $a;
                $textoCifrado = $textoCifrado . password_hash($texto, PASSWORD_DEFAULT);
                $texto = $texto . "\n";
                $textoCifrado = $textoCifrado . "\n";
                if (($a == 25) && ($d == 30) && ($m == 1)) {
                    $flag = 1;
                }
            }
        }
    }
}

        //Guardamos las credenciales en el archivo de texto
        $archivo = fopen("ejercicioAños.txt", "w");
        //fwrite($archivo, $texto);
        fwrite($archivo, $textoCifrado);
        fclose($archivo);

        
        
        
        $lineas = file("ejercicioAños.txt");
        
        $flagFecha = 0;
        
        
        $fechaResolver = ("0" . 2 . "/" . 10 . "/" . 24 . "\n");
        
            
        
        foreach ($lineas as $linea) {   
            if($flagFecha == 0){
                if(password_verify($fechaResolver, $linea)){
                    echo "FECHA ENCONTRADA";
                    $flagFecha = 1;
                }
            }
        }
        
        if($flagFecha == 0){
            echo "FECHA NO ENCONTRADA";
        }
    

        
        
        
?>

<html>
    <head>
        <title>Sacar año</title>
    </head>
    <body>

    </body>
</html>

