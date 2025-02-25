<?php
require_once 'config.php'; // Incluir la conexión


$error = "";
$existeUsuario = FALSE;
$contraseñaError = 0;

$usuarioServer = "";
$contraseñaServer = "";

// Verificamos si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nombreUsuario = $_POST['nombreUsuario'];
    $contraseña = $_POST['Contraseña'];

    $sql = "SELECT * FROM usuarios WHERE nombreUsuario = '$nombreUsuario'";
    $stmt = $pdo->query($sql);

    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($usuarios as $usuario) {
        if ($nombreUsuario == $usuario["nombreUsuario"]) {
            $existeUsuario = TRUE;

            if ((password_verify($contraseña, $usuario["Contraseña"]))) {
                echo "<h1>Bienvenido/a " . $nombreUsuario . "</h1>";
                header("Location: gestion_articulos.php?usuario=" . urlencode($nombreUsuario));
            } else {
                $error = "<h2 class = error>Contraseña incorrecta.</h2>";
            }
        }
    }

    if ($existeUsuario == FALSE) {
        $error = "El usuario introducido no existe";
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

        /* Formulario */
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
