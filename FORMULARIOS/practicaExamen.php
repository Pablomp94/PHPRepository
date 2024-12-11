<html>
    <head>
        <meta charset="UTF-8">
        <title>PracticaExamen</title>
    </head>
    <style>
        .error{
            color: red;
        }
        
        *{
            font-size: 30px;
        }
    </style>
    <body>

        <?php
        $nombreError = " ";

        //VALIDACION ERRORES
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
                $nombreError = "Nombre obligatorio </br>";
            }
        }
        ?>


        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
            <span class="error"><?php echo $nombreError ?></span>
            Nombre: <input type="text" name="name"></br>

            Kilos: <select name="patata" id="precios">
                <option value="0">0 Kg</option>
                <option value="1">1 Kg</option>
                <option value="2">2 Kg</option>
                <option value="3">3 Kg</option>
            </select> PATATA 1$/KILO
            </br>
            Kilos: <select name="tomate" id="precios">
                <option value="0">0 Kg</option>
                <option value="1">1 Kg</option>
                <option value="2">2 Kg</option>
                <option value="3">3 Kg</option>
            </select> TOMATE 3$/KILO
             
            </br>
            
            <select name="fruta">
                <option value="8">Peras (8$/Kg)</option>
                <option value="5">Manzanas (5$/Kg)</option>
            </select> 
            KG: <input type="number" name="kilos">
            </br>
            <button id="sub" type="submit" name="submit">Submit</button> 
        </form>

        


        <?php
        //Mostrar datos
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST["name"])) {
                echo "Hola " . $_POST["name"];
            }
            if (!empty($_POST["patata"])) {
                echo "Valor Total: " . $_POST["patata"] * 1 . " euros de Patatas.</br>";
            }
            if (!empty($_POST["tomate"])) {
                echo "Valor Total: " . $_POST["tomate"] * 3 . " euros de Tomates.</br>";
            }
            if (!empty($_POST["fruta"]) && !empty($_POST["kilos"])) {
                echo "Valor Total:" . $_POST["fruta"] * $_POST["kilos"] . " euros.</br>";
            }
        }
        ?>



    </body>
</html>
