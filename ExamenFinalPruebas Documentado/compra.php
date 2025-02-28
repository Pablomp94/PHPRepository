<?php
session_start(); // Inicia o reanuda la sesión, permitiendo que los datos se almacenen entre las páginas
require_once 'config.php'; // Incluye el archivo de configuración para la conexión a la base de datos
// Inicializar el carrito si no existe en la sesión
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = []; // Si no hay carrito, se crea como un arreglo vacío
}

$mensaje = ""; // Variable para almacenar mensajes de éxito o error
// Procesar la adición de productos al carrito
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id_producto"], $_POST["cantidad"])) {
    // Se verifica que el formulario haya sido enviado por POST y que los datos necesarios estén presentes

    $id_producto = $_POST["id_producto"]; // ID del producto que se quiere agregar
    $cantidad = $_POST["cantidad"]; // Cantidad del producto que se quiere agregar
    // Validar que el producto con ese ID exista en la base de datos
    $stmt = $pdo->prepare("SELECT id, nombre, precio FROM articulos WHERE id = ?");
    // Prepara la consulta SQL para buscar el producto por su ID
    $stmt->execute([$id_producto]); // Ejecuta la consulta pasando el ID como parámetro
    $producto = $stmt->fetch(PDO::FETCH_ASSOC); // Recupera los datos del producto en un arreglo asociativo

    if ($producto) { // Si el producto existe en la base de datos
        if (isset($_SESSION['carrito'][$id_producto])) {
            // Si el producto ya está en el carrito, solo se actualiza la cantidad
            $_SESSION['carrito'][$id_producto]['cantidad'] += $cantidad;
        } else {
            // Si el producto no está en el carrito, se agrega con su nombre, precio y cantidad
            $_SESSION['carrito'][$id_producto] = [
                'nombre' => $producto['nombre'],
                'precio' => $producto['precio'],
                'cantidad' => $cantidad
            ];
        }
        // Mensaje de éxito si el producto se añadió correctamente al carrito
        $mensaje = "<p style='color: green;'>Producto añadido correctamente.</p>";
    } else {
        // Si el producto no existe en la base de datos, se muestra un mensaje de error
        $mensaje = "<p style='color: red;'>Error: El ID ingresado no existe.</p>";
    }
}

// Obtener todos los artículos disponibles en la tienda
$stmt = $pdo->query("SELECT id, nombre, precio FROM articulos");
// Ejecuta una consulta para obtener todos los productos con su ID, nombre y precio
$articulos = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Almacena todos los resultados en un arreglo asociativo
// Calcular el total de la compra sumando el precio de cada producto por su cantidad
$total_compra = 0;
foreach ($_SESSION['carrito'] as $item) {
    $total_compra += $item['precio'] * $item['cantidad']; // Acumula el total sumando precio * cantidad
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
