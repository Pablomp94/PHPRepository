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

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" enctype="multipart/form-data">
            Archivo: <input type="file" name="archivo"></br>

            EMAIL: <input type="text" name="email"></br>
            <button id="sub" type="submit" name="submit">SUBMIT</button>
        </form>

        <?php
        if (isset($_FILES["archivo"])) {


            $archivo = $_FILES["archivo"];

            $nombre = $archivo["name"]; //Nombre del archivo incluyendo el formato
            echo '$nombre: ' . $nombre;

            $tmp_name = $archivo["tmp_name"];
            $destino = "uploads/" . $nombre;
            move_uploaded_file($tmp_name, $destino);

            $tama = $archivo["size"];
            echo "</br>";
            echo "Tamaño : " . $tama;
        }

        echo "</br>";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (!empty($_POST["email"])) {
                echo "Email: " . $_POST["email"] . "</br>";

                $email = $_POST["email"];

                $arroba = strpos($email, "@");
                echo "Izq arroba: " . substr($email, 0, $arroba) . "</br>";
                $despuesArroba = substr($email, $arroba + 1, (strlen($email) - ($arroba)));
                echo "Der arroba: " . $despuesArroba . "</br>";
                
                $ultimoPunto = strpos($email, ".");
                
                echo "Der punto: " . substr($email,$ultimoPunto+1, (strlen($email)-$ultimoPunto)). "</br>";
                        
                if ($ultimoPunto != false) {
                    echo "Entre arroba y punto: " . substr($email, $arroba+1, ((strlen($email)-$arroba)-$ultimoPunto));
                }
                
            }
        }
        ?>

    </body>
</html>
