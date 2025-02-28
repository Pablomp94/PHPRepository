
<?php

// Inicia la sesión para acceder a las variables de sesión
session_start();

// Elimina la variable de sesión 'carrito', vaciando así el carrito de compras
unset($_SESSION['carrito']);

// Redirige al usuario a la página de compra después de vaciar el carrito
header("Location: compra.php");

// Finaliza la ejecución del script para asegurar que no se ejecute código adicional después de la redirección
exit;
?>
