<?php
require_once 'config.php'; // Incluir el archivo de configuración para la conexión a la base de datos

// Variables para almacenar errores y estados
$error = ""; // Mensaje de error si la autenticación falla
$existeUsuario = FALSE; // FLAG para verificar si el usuario existe en la base de datos
$contraseñaError = 0; // Contador de errores de contraseña (actualmente no usado)

$usuarioServer = ""; // Variable para almacenar el usuario en sesión (opcional, no utilizada)
$contraseñaServer = ""; // Variable para almacenar la contraseña en sesión (opcional, no utilizada)

// Verificamos si se envió el formulario con el método POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // Capturamos los datos del formulario
    $nombreUsuario = $_POST['nombreUsuario']; // Nombre de usuario ingresado
    $contraseña = $_POST['Contraseña']; // Contraseña ingresada

    // Consultamos la base de datos para verificar si el usuario existe
    $sql = "SELECT * FROM usuarios WHERE nombreUsuario = ?"; // Consulta SQL
    $stmt = $pdo->prepare($sql); // Preparamos la consulta 
    $stmt->execute([$nombreUsuario]); // Ejecutamos la consulta con el nombre de usuario ingresado
    
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtenemos los resultados como un array asociativo

    // Iteramos sobre los resultados para verificar el usuario y la contraseña
    foreach ($usuarios as $usuario) {
        if ($nombreUsuario == $usuario["nombreUsuario"]) { // Si el usuario existe en la base de datos
            $existeUsuario = TRUE; // Marcamos que el usuario existe

            if ((password_verify($contraseña, $usuario["Contraseña"]))) { // Verificamos la contraseña encriptada
                echo "<h1>Bienvenido/a " . $nombreUsuario . "</h1>"; // Mensaje de bienvenida
                header("Location: gestion_articulos.php?usuario=" . urlencode($nombreUsuario)); // Redirigir al usuario a la gestión de artículos
                exit(); // Detenemos la ejecución del script
            } else {
                $error = "<h2 class='error'>Contraseña incorrecta.</h2>"; // Mensaje de error si la contraseña es incorrecta
            }
        }
    }

    // Si el usuario no existe en la base de datos
    if ($existeUsuario == FALSE) {
        $error = "El usuario introducido no existe"; // Mensaje de error
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Iniciar Sesión</title>
    </head>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background-color: lightgray;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        h1 {
            color: #333;
            text-align: center;
            margin: 20px;
        }

        /* Estilos del formulario */
        form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            margin-top: 20px;
        }

        label {
            font-size: 18px;
            margin-bottom: 10px;
            display: block;
            color: #333;
        }

        /* Campos de entrada */
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 16px;
        }

        /* Botón de inicio de sesión */
        input[type="submit"],
        .registro-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 4px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
            text-align: center;
            text-decoration: none;
            display: block;
        }

        input[type="submit"]:hover,
        .registro-btn:hover {
            background-color: darkgreen;
        }

        /* Mensaje de error */
        .error {
            color: red;
            font-size: 16px;
            text-align: center;
        }

    </style>
    <body>
        <h1>FORMULARIO DE LOGIN</h1>
        <!-- Formulario que se procesa en el mismo archivo -->
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <!-- Campo para el nombre de usuario -->
            <label for="username">Nombre de Usuario:</label>
            <input type="text" id="nombreUsuario" name="nombreUsuario">

            <!-- Campo para la contraseña -->
            <label for="password">Contraseña:</label>
            <input type="password" id="Contraseña" name="Contraseña">

            <!-- Mostrar mensaje de error si existe -->
            <span class="error"><?php echo $error; ?></span>
            
            <!-- Botón para enviar el formulario -->
            <input type="submit" value="Iniciar sesión">
        </form>

        <!-- Mostrar el botón de registro solo si el usuario no existe -->
        <?php if (!$existeUsuario && $_SERVER["REQUEST_METHOD"] === "POST"): ?>
            <a href="registro.php" class="registro-btn">Registrarse</a>
        <?php endif; ?>
    </body>
</html>
