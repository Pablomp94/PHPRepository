
<?php

session_start();
unset($_SESSION['carrito']); // Elimina el carrito
header("Location: compra.php");
exit;
?>