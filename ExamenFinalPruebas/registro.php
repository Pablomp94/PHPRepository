
<!DOCTYPE html>
<!-- Documento HTML para el formulario de registro -->

<?php
require_once 'config.php'; // Incluir la conexión a la base de datos mediante PDO
// Inicialización de variables para manejar errores en la validación de datos
$errornombreUsuario = $errorContraseña = $errorNombre = $errorApellidos = $errorEmail = $errorDni = $errorTelefono = $errorImagen = "";

// Variables para almacenar los datos ingresados por el usuario
$nombreUsuario = $contraseña = $nombre = $apellidos = $email = $dni = $telefono = $imagen = "";

// Flags de control para la validación del formulario
$flagFormulario = 1; // Indica si el formulario pasó todas las validaciones
$flagDatos = 0; // Indica si se han insertado datos en la base de datos correctamente
$flagImagen = 1; // Indica si la imagen es válida
$flagDni = 0; // Indica si el DNI es válido
// Verifica si la solicitud se ha realizado a través de un formulario enviado por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Consulta para obtener todos los usuarios registrados en la base de datos
    $sql = "SELECT * FROM usuarios";
    $stmt = $pdo->query($sql);
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC); // Se obtiene un array asociativo con todos los usuarios

    /*     * * VALIDACIONES ** */

    // 1. Validación del nombre de usuario
    if (empty($_POST["nombreUsuario"])) {
        $errornombreUsuario = "El nombre del usuario es obligatorio";
        $flagFormulario = 0;
    } else {
        $nombreUsuario = $_POST["nombreUsuario"];
        // Verifica si el nombre de usuario ya está en uso
        foreach ($usuarios as $usuario) {
            if ($nombreUsuario == $usuario["nombreUsuario"]) {
                $flagFormulario = 0;
                $errornombreUsuario = "El nombre de usuario ya está en uso";
            }
        }
    }

    // 2. Validación de la contraseña
    if (empty($_POST["Contraseña"])) {
        $errorContraseña = "La contraseña es obligatoria";
        $flagFormulario = 0;
    } else {
        // Se cifra la contraseña antes de almacenarla
        $contraseña = password_hash($_POST["Contraseña"], PASSWORD_DEFAULT);
    }

    // 3. Validación del nombre
    if (empty($_POST["Nombre"])) {
        $errorNombre = "El nombre es obligatorio";
        $flagFormulario = 0;
    } else {
        $nombre = $_POST["Nombre"];
    }

    // 4. Validación de los apellidos
    if (empty($_POST["Apellidos"])) {
        $errorApellidos = "Los apellidos son obligatorios";
        $flagFormulario = 0;
    } else {
        $apellidos = $_POST["Apellidos"];
    }

    // 5. Validación del correo electrónico con una expresión regular
    if (empty($_POST["Email"])) {
        $errorEmail = "El Email es obligatorio";
        $flagFormulario = 0;
    } else {
        if (!preg_match("/^[a-zA-Z0-9._%+-]+@([a-zA-Z0-9.-]+)\\.([a-zA-Z]){2,}$/", $_POST["Email"])) {
            $errorEmail = "Formato de email inválido";
            $flagFormulario = 0;
        } else {
            $email = $_POST["Email"];
            // Verifica si el email ya está registrado
            foreach ($usuarios as $usuario) {
                if ($email == $usuario["Email"]) {
                    $flagFormulario = 0;
                    $errorEmail = "El Email ya está en uso";
                }
            }
        }
    }

    // 6. Validación del DNI (Documento Nacional de Identidad)
    if (empty($_POST["Dni"])) {
        $errorDni = "El DNI es obligatorio";
        $flagFormulario = 0;
    } else {
        if (!preg_match("/^[0-9]{8}$/", $_POST["Dni"])) {
            $errorDni = "El DNI debe contener 8 números";
            $flagFormulario = 0;
            $flagDni = 1;
        } else {
            $dni = $_POST["Dni"];
            // Verifica si el DNI ya está registrado
            foreach ($usuarios as $usuario) {
                if ($dni == $usuario["DNI"]) {
                    $flagFormulario = 0;
                    $flagDni = 1;
                    $errorDni = "El DNI ya está en uso";
                }
            }
            // Si el DNI es válido, se calcula la letra correspondiente
            if ($flagDni == 0) {
                $dniArray = ["T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E"];
                $numLetra = ($dni % 23);
                $letra = $dniArray[$numLetra];
                $dni = $dni . $letra;
            }
        }
    }

    // 7. Validación del teléfono
    if (empty($_POST["Telefono"])) {
        $errorTelefono = "El teléfono es obligatorio";
        $flagFormulario = 0;
    } else {
        if (!preg_match("/^[0-9]{9}$/", $_POST["Telefono"])) {
            $errorTelefono = "Formato de teléfono incorrecto";
            $flagFormulario = 0;
        } else {
            $telefono = $_POST["Telefono"];
            // Verifica si el número de teléfono ya está registrado
            foreach ($usuarios as $usuario) {
                if ($telefono == $usuario["Telefono"]) {
                    $flagFormulario = 0;
                    $errorTelefono = "El teléfono ya está en uso";
                }
            }
        }
    }

    // 8. Validación y almacenamiento de imagen subida
    if (empty($_FILES["Imagen"]["name"])) {
        $errorImagen = "La imagen es obligatoria";
        $flagFormulario = 0;
    } else {
        $permitidos = ['image/jpeg', 'image/png'];
        $archivo = $_FILES['Imagen'];

        if (!in_array($archivo['type'], $permitidos)) {
            $errorImagen = "Formato de imagen no permitido (solo JPG o PNG)";
            $flagImagen = 0;
        }

        if ($flagImagen == 1) {
            // Se genera un nombre de archivo único usando el DNI, teléfono y nombre de usuario
            $nombreImagen = $dni . "-" . $telefono . "_" . $nombreUsuario . ($archivo['type'] == 'image/jpeg' ? ".jpeg" : ".png");
            $destinoCarpeta = "C:/xampp/htdocs/PHPRepository/ExamenFinalPruebas/uploads/" . $nombreImagen;
            $destinoBase = "http://localhost/PHPRepository/ExamenFinalPruebas/uploads/" . $nombreImagen;
            move_uploaded_file($archivo['tmp_name'], $destinoCarpeta); // Se guarda la imagen en la carpeta del servidor
        }
    }

    /*     * * INSERCIÓN DE DATOS EN LA BASE DE DATOS ** */
    if ($flagFormulario == 1 && $flagImagen == 1) {
        $sql = "INSERT INTO usuarios (nombreUsuario, Nombre, Apellidos, Email, DNI, Telefono, Contraseña, Imagen) 
                VALUES ('$nombreUsuario', '$nombre', '$apellidos', '$email', '$dni', '$telefono', '$contraseña', '$destinoBase')";
        $stmt = $pdo->query($sql); // Se ejecuta la consulta de inserción
        $flagDatos = 1;
        header("refresh:3;url=login.php"); // Redirección al login tras 3 segundos
    }
}
?>



<html>
    <head>
        <meta charset="UTF-8">
        <title>REGISTRO</title>
    </head>
    <style>
        /* Estilos generales */
        body {
            font-family: 'Arial', sans-serif;
            background: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Asegura que ocupe toda la altura de la pantalla */
            color: #333;
            overflow: hidden; /* Evita el scroll horizontal */
            flex-direction: column;
        }

        h1 {
            color: #333;
            font-size: 1.8rem;
            text-align: center;
            margin-bottom: 15px;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            background: #ffffff;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px; /* Ancho reducido */
            box-sizing: border-box;
        }

        .form-group {
            margin-bottom: 10px;
            width: 100%;
            text-align: left;
        }

        label {
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 4px;
            display: block;
            color: #333;
        }

        input {
            width: 100%;
            padding: 8px;
            margin: 6px 0;
            border-radius: 4px;
            border: 1px solid #ddd;
            font-size: 14px;
            transition: border-color 0.3s ease-in-out;
            box-sizing: border-box;
        }

        input:focus {
            border-color: #6a11cb;
            outline: none;
        }

        input[type="submit"] {
            background: #6a11cb;
            color: white;
            border: none;
            padding: 10px;
            font-size: 14px;
            cursor: pointer;
            transition: background 0.3s ease;
            width: 100%;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background: #2575fc;
        }

        .error {
            color: #e74c3c;
            font-size: 12px;
            margin-top: -5px;
            margin-bottom: 8px;
            text-align: left;
        }

        /* Estilo de datos registrados */
        #datos {
            background: #f4f4f4;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
            text-align: left;
            width: 100%;
            box-sizing: border-box;
        }

        #datos h3 {
            font-size: 1.1rem;
            margin-bottom: 15px;
        }

        /* Diseño responsive */
        @media (max-width: 768px) {
            h1 {
                font-size: 1.5rem;
            }

            .container {
                padding: 15px;
                width: 90%; /* Ajuste a pantallas más pequeñas */
            }

            label {
                font-size: 0.85rem;
            }

            input {
                padding: 10px;
                font-size: 14px;
            }

            input[type="submit"] {
                padding: 10px;
                font-size: 14px;
            }
        }

        /* Para pantallas pequeñas, como móviles */
        @media (max-width: 480px) {
            h1 {
                font-size: 1.2rem;
            }

            .container {
                padding: 10px;
                width: 95%; /* Más estrecho en pantallas móviles */
            }

            label {
                font-size: 0.8rem;
            }

            input {
                padding: 8px;
                font-size: 12px;
            }

            input[type="submit"] {
                padding: 8px;
                font-size: 12px;
            }

            .form-group {
                margin-bottom: 8px;
            }
        }

    </style>
</head>
<body>

    <div class="container">
        <h1>Formulario de Registro</h1>

        <form method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>">

            <!-- Nombre de Usuario -->
            <div class="form-group">
                <label for="nombreUsuario">Nombre de Usuario:</label>
                <input type="text" id="nombreUsuario" name="nombreUsuario" value="<?php echo $nombreUsuario; ?>">
                <span class="error"><?php echo $errornombreUsuario; ?></span>
            </div>

            <!-- Contraseña -->
            <div class="form-group">
                <label for="Contraseña">Contraseña:</label>
                <input type="password" id="Contraseña" name="Contraseña">
                <span class="error"><?php echo $errorContraseña; ?></span>
            </div>

            <!-- Nombre -->
            <div class="form-group">
                <label for="Nombre">Nombre:</label>
                <input type="text" id="Nombre" name="Nombre" value="<?php echo $nombre; ?>">
                <span class="error"><?php echo $errorNombre; ?></span>
            </div>

            <!-- Apellidos -->
            <div class="form-group">
                <label for="Apellidos">Apellidos:</label>
                <input type="text" id="Apellidos" name="Apellidos" value="<?php echo $apellidos; ?>">
                <span class="error"><?php echo $errorApellidos; ?></span>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="Email">Email:</label>
                <input type="email" id="Email" name="Email" value="<?php echo $email; ?>">
                <span class="error"><?php echo $errorEmail; ?></span>
            </div>

            <!-- DNI -->
            <div class="form-group">
                <label for="Dni">DNI:</label>
                <input type="text" id="Dni" name="Dni" value="<?php echo $dni; ?>">
                <span class="error"><?php echo $errorDni; ?></span>
            </div>

            <!-- Teléfono -->
            <div class="form-group">
                <label for="Telefono">Teléfono:</label>
                <input type="text" id="Telefono" name="Telefono" value="<?php echo $telefono; ?>">
                <span class="error"><?php echo $errorTelefono; ?></span>
            </div>

            <!-- Imagen -->
            <div class="form-group">
                <label for="Imagen">Imagen:</label>
                <input type="file" name="Imagen">
                <span class="error"><?php echo $errorImagen; ?></span>
            </div>

            <!-- Botón de Envío -->
            <div class="form-group">
                <input type="submit" value="Registrar">
            </div>

        </form>

<?php
// Verifica si el formulario ha sido enviado mediante el método POST y si los datos han sido registrados correctamente
if (($_SERVER["REQUEST_METHOD"] == "POST") && ($flagDatos == 1)) {
    // Muestra un contenedor con los datos registrados del usuario
    echo "<div id='datos'>";
    echo "<h3>Datos registrados:</h3>";

    // Imprime cada dato ingresado en el formulario
    echo "Nombre de usuario: $nombreUsuario<br>";
    echo "Contraseña: $contraseña<br>";
    echo "Nombre: $nombre<br>";
    echo "Apellidos: $apellidos<br>";
    echo "Email: $email<br>";
    echo "DNI: $dni<br>";
    echo "Teléfono: $telefono<br>";
    echo "Imagen: $nombreImagen<br>";

    echo "</div>";

    // Mensaje de redirección para el usuario
    echo "<p>Redirigiendo...</p>";
}
?>

    </div>

</body>
</html>
