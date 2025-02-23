<?php
// Incluir la conexión a la base de datos
require_once 'config.php';

// Verificar si el nombre de usuario está en la URL
if (!isset($_GET["usuario"])) {
    die("Error: No se proporcionó un usuario válido.");
}

$nombreUsuario = $_GET["usuario"];

// Consultar la base de datos para obtener los datos del usuario
$stmt = $pdo->prepare("SELECT Nombre, Apellidos, Email, Imagen FROM usuarios WHERE nombreUsuario = ?");
$stmt->execute([$nombreUsuario]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    die("Error: Usuario no encontrado.");
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestión de Artículos</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                text-align: center;
            }
            .perfil {
                margin: 20px auto;
                padding: 10px;
                background: white;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
                display: inline-block;
                text-align: left;
            }
            .perfil img {
                width: 100px;
                height: 100px;
                border-radius: 50%;
                object-fit: cover;
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
                text-align: left;
            }
            th {
                background: #6a11cb;
                color: white;
            }
            .add-article {
                margin: 20px;
            }
        </style>
    </head>
    <body>

        <!-- Datos del usuario -->
        <div class="perfil">
            <h2>Bienvenido, <?php echo htmlspecialchars($usuario["Nombre"] . " " . $usuario["Apellidos"]); ?></h2>
            <p>Email: <?php echo htmlspecialchars($usuario["Email"]); ?></p>
            <?php $usuarioImagen = $usuario["Imagen"]; ?>
            <?php echo "<img src='$usuarioImagen' alt='Imagen encontrada'>"; ?>
        </div>

        <!-- Formulario para agregar artículo -->
        <div class="add-article">
            <h3>Agregar Nuevo Artículo</h3>
            <form method="POST">
                <input type="text" name="nombre" placeholder="Nombre del artículo" required>
                <input type="number" name="precio" step="0.01" placeholder="Precio" required>
                <button type="submit">Guardar</button>
            </form>
        </div>

        <?php
        // Insertar artículo en la base de datos
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nombre"]) && isset($_POST["precio"])) {
            $nombreArticulo = $_POST["nombre"];
            $precio = $_POST["precio"];

            $stmt = $pdo->prepare("INSERT INTO articulos (nombre, precio) VALUES (?, ?)");
            $stmt->execute([$nombreArticulo, $precio]);
        }

        // Obtener y mostrar la lista de artículos
        $stmt = $pdo->query("SELECT * FROM articulos");
        $articulos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <!-- Lista de artículos -->
        <h3>Lista de Artículos</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Fecha Creación</th>
            </tr>
            <?php foreach ($articulos as $articulo) : ?>
                <tr>
                    <td><?php echo $articulo["id"]; ?></td>
                    <td><?php echo htmlspecialchars($articulo["nombre"]); ?></td>
                    <td><?php echo number_format($articulo["precio"], 2); ?> €</td>
                    <td><?php echo $articulo["fecha_creacion"]; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

    </body>
</html>
