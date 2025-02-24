<?php
session_start();
require_once 'config.php'; // Conexión a la base de datos
// Inicializar el carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

$mensaje = "";

// Procesar la adición de productos al carrito
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id_producto"], $_POST["cantidad"])) {
    $id_producto = $_POST["id_producto"];
    $cantidad = $_POST["cantidad"];

    // Validar que el ID exista
    $stmt = $pdo->prepare("SELECT id, nombre, precio FROM articulos WHERE id = ?");
    $stmt->execute([$id_producto]);
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($producto) {
        if (isset($_SESSION['carrito'][$id_producto])) {
            $_SESSION['carrito'][$id_producto]['cantidad'] += $cantidad;
        } else {
            $_SESSION['carrito'][$id_producto] = [
                'nombre' => $producto['nombre'],
                'precio' => $producto['precio'],
                'cantidad' => $cantidad
            ];
        }
        $mensaje = "<p style='color: green;'>Producto añadido correctamente.</p>";
    } else {
        $mensaje = "<p style='color: red;'>Error: El ID ingresado no existe.</p>";
    }
}

// Obtener artículos disponibles en la tienda
$stmt = $pdo->query("SELECT id, nombre, precio FROM articulos");
$articulos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Calcular el total del carrito
$total_compra = 0;
foreach ($_SESSION['carrito'] as $item) {
    $total_compra += $item['precio'] * $item['cantidad'];
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Compra de Artículos</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                text-align: center;
                background-color: #f4f4f4;
            }
            table {
                margin: 20px auto;
                border-collapse: collapse;
                width: 80%;
                background: white;
            }
            th, td {
                padding: 10px;
                border: 1px solid #ddd;
            }
            th {
                background: #6a11cb;
                color: white;
            }
            .carrito {
                background: #ffffff;
                padding: 15px;
                border-radius: 10px;
                box-shadow: 2px 2px 10px #999;
                margin: 20px auto;
                width: 50%;
            }
            .mensaje {
                font-weight: bold;
            }
        </style>
    </head>
    <body>

        <h2>Simulación de Compra</h2>

        <!-- Mensaje de error o éxito -->
        <div class="mensaje"><?php echo $mensaje; ?></div>

        <!-- Listado de Artículos Disponibles -->
        <h3>Lista de Artículos Disponibles</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
            </tr>
            <?php foreach ($articulos as $articulo) : ?>
                <tr>
                    <td><?php echo $articulo["id"]; ?></td>
                    <td><?php echo $articulo["nombre"]; ?></td>
                    <td><?php echo $articulo["precio"]; ?> €</td>
                </tr>
            <?php endforeach; ?>
        </table>

        <!-- Formulario de compra -->
        <h3>Añadir Producto al Carrito</h3>
        <form method="POST">
            <label for="id_producto">ID del Producto:</label>
            <input type="number" name="id_producto" required min="1">
            <label for="cantidad">Cantidad:</label>
            <input type="number" name="cantidad" required min="1">
            <button type="submit">Añadir</button>
        </form>

        <!-- Carrito de Compras -->
        <h3>Carrito de Compras</h3>
        <div class="carrito">
            <?php if (!empty($_SESSION['carrito'])) : ?>
                <table>
                    <tr>
                        <th>Producto</th>
                        <th>Precio Unitario</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                    <?php foreach ($_SESSION['carrito'] as $id => $item) : ?>
                        <tr>
                            <td><?php echo $item["nombre"]; ?></td>
                            <td><?php echo $item["precio"]; ?> €</td>
                            <td><?php echo $item["cantidad"]; ?></td>
                            <td><?php echo ($item["precio"] * $item["cantidad"]); ?> €</td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <h3>Total: <?php echo $total_compra; ?> €</h3>
                <form method="POST" action="vaciar_carrito.php">
                    <button type="submit">Vaciar Carrito</button>
                </form>
            <?php else : ?>
                <p>Tu carrito está vacío.</p>
            <?php endif; ?>
        </div>

    </body>
</html>
