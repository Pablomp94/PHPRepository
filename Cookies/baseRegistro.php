<?php

// Verificamos si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $username = $_POST['username'];
    
    //Encriptamos la contraseña
    $contraseñaEncriptada = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Validamos las credenciales
    if(!empty($username) && !empty($contraseñaEncriptada)) {
        
        //Guardamos las credenciales en el archivo de texto
        $archivo = fopen("baseDatos.txt", "w");
        $texto = $username . "/n" . $contraseñaEncriptada;
        fwrite($archivo, $texto);
        fclose($archivo);
        
        // Esperamos 3 segundos y luego redirigimos a la página protegida
        header("refresh:3;url=baseLogin.php");
        
    } else {
        // Si las credenciales son incorrectas, mostramos mensaje de error
        echo "Usuario o contraseña en blanco.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registrar Sesión</title>
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
        <input type="submit" value="Registrar sesión">
    </form>
</body>
</html>
