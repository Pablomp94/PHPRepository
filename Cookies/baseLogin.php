<?php

// Verificamos si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    
    //Te guarda en un array el contenido del texto por lineas
    $lineas = file("baseDatos.txt");
    
    //Linea 1 de usuario
    $usuarioBase = $lineas[0];
    //Linea 2 de contraseña
    $contraseñaBase = $lineas[1];

    // Validamos las credenciales
    if (($username == $usuarioBase) && (password_verify($password, $contraseñaBase))) {
        // Mostramos mensaje de bienvenida personalizado
        echo "<h2>Bienvenido/a " . htmlspecialchars($username) . "</h2>";

        // Esperamos 3 segundos y luego redirigimos a la página protegida
        header("refresh:3;url=pagina_protegida.php");
        exit; // Terminamos la ejecución del script
    } else {
        // Si las credenciales son incorrectas, mostramos mensaje de error
        echo "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
</head>
<body>
    <!-- Formulario que se procesa en el mismo archivo -->
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <!-- Campo para el nombre de usuario -->
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username">

        <!-- Campo para la contraseña -->
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password">

        <!-- Botón para enviar el formulario -->
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>
