<?php
// Incluir la conexión a la base de datos desde el archivo de configuración
require_once 'config.php';

// Verificar si se ha proporcionado un nombre de usuario a través de la URL
if (!isset($_GET["usuario"])) {
    die("Error: No se proporcionó un usuario válido."); // Detener la ejecución si no hay un usuario
}

$nombreUsuario = $_GET["usuario"];

// Preparar y ejecutar una consulta para obtener los datos del usuario en la base de datos
$stmt = $pdo->prepare("SELECT Nombre, Apellidos, Email, Imagen FROM usuarios WHERE nombreUsuario = ?");
$stmt->execute([$nombreUsuario]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

// Verificar si el usuario existe en la base de datos
if (!$usuario) {
    die("Error: Usuario no encontrado."); // Si el usuario no existe, se detiene la ejecución del script
}

// Obtener la lista de todos los artículos almacenados en la base de datos
$stmt = $pdo->query("SELECT * FROM articulos");
$articulos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Contar el número total de artículos obtenidos y almacenarlo en una cookie
$total_articulos = count($articulos);
setcookie('total_articulos', $total_articulos, time() + (30 * 24 * 60 * 60), "/"); // Cookie con validez de 30 días
// Verificar si la solicitud recibida es de tipo POST (indica que se está enviando información desde un formulario)
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Agregar un nuevo artículo a la base de datos si el campo "nombre" está presente en la solicitud POST
    if (isset($_POST["nombre"])) {
        // Manejo de cookies para registrar el número de consultas realizadas
        $consultas = isset($_COOKIE['total_consultas']) ? $_COOKIE['total_consultas'] + 1 : 1;
        setcookie('total_consultas', $consultas, time() + (30 * 24 * 60 * 60), "/"); // Actualiza la cookie con el número de consultas
        // Preparar la consulta SQL para insertar un nuevo artículo en la base de datos
        $stmt = $pdo->prepare("INSERT INTO articulos (nombre, marca, descripcion, precio) VALUES (?, ?, ?, ?)");
        $stmt->execute([$_POST["nombre"], $_POST["marca"], $_POST["descripcion"], $_POST["precio"]]); // Ejecutar la consulta con los valores del formulario
        // Registrar la fecha y hora de la última modificación en una cookie
        setcookie('ultima_modificacion', date('Y-m-d H:i:s'), time() + (30 * 24 * 60 * 60), "/");

        // Actualizar la lista de artículos después de la inserción
        $stmt = $pdo->query("SELECT * FROM articulos");
        $articulos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Contar nuevamente el total de artículos y actualizar la cookie correspondiente
        $total_articulos = count($articulos);
        setcookie('total_articulos', $total_articulos, time() + (30 * 24 * 60 * 60), "/");
    }

    // Modificar un artículo existente si el campo "id_modificar" está presente en la solicitud POST
    if (isset($_POST["id_modificar"])) {
        // Manejo de cookies para registrar el número de consultas realizadas
        $consultas = isset($_COOKIE['total_consultas']) ? $_COOKIE['total_consultas'] + 1 : 0;
        setcookie('total_consultas', $consultas, time() + (30 * 24 * 60 * 60), "/");

        // Preparar la consulta SQL para actualizar un artículo en la base de datos
        $stmt = $pdo->prepare("UPDATE articulos SET nombre=?, marca=?, descripcion=?, precio=? WHERE id=?");
        $stmt->execute([$_POST["nuevo_nombre"], $_POST["nueva_marca"], $_POST["nueva_descripcion"], $_POST["nuevo_precio"], $_POST["id_modificar"]]);

        // Registrar la fecha y hora de la última modificación en una cookie
        setcookie('ultima_modificacion', date('Y-m-d H:i:s'), time() + (30 * 24 * 60 * 60), "/");
    }

    // Redirigir al usuario a la misma página para reflejar los cambios en la interfaz, manteniendo el usuario en la URL
    header("Location: " . $_SERVER['PHP_SELF'] . "?usuario=" . $nombreUsuario);
}

// Obtener la última modificación registrada en cookies (si existe, en caso contrario se muestra 'Sin modificaciones')
$ultima_modificacion = isset($_COOKIE['ultima_modificacion']) ? $_COOKIE['ultima_modificacion'] : 'Sin modificaciones';
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Gestión de Artículos</title>
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
        </style>
    </head>
    <body>
        <h2>Bienvenido, <?php echo htmlspecialchars($usuario["Nombre"] . " " . $usuario["Apellidos"]); ?></h2>
        <p>Email: <?php echo htmlspecialchars($usuario["Email"]); ?></p>
        <img src="<?php echo htmlspecialchars($usuario['Imagen']); ?>" width="100" height="100" alt="Perfil">

        <h3>Agregar Nuevo Artículo</h3>
        <form method="POST">
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="text" name="marca" placeholder="Marca" required>
            <input type="text" name="descripcion" placeholder="Descripción" required>
            <input type="number" name="precio" step="0.01" placeholder="Precio" required>
            <button type="submit">Agregar</button>
        </form>

        <h3>Modificar Artículo</h3>
        <form method="POST">
            <input type="number" name="id_modificar" placeholder="ID del artículo" required>
            <input type="text" name="nuevo_nombre" placeholder="Nuevo nombre" required>
            <input type="text" name="nueva_marca" placeholder="Nueva marca" required>
            <input type="text" name="nueva_descripcion" placeholder="Nueva descripción" required>
            <input type="number" name="nuevo_precio" step="0.01" placeholder="Nuevo precio" required>
            <button type="submit">Modificar</button>
        </form>

        <h3>Lista de Artículos</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Fecha Creación</th>
            </tr>
            <?php foreach ($articulos as $articulo) : ?>
                <tr>
                    <td><?php echo $articulo["id"]; ?></td>
                    <td><?php echo $articulo["nombre"]; ?></td>
                    <td><?php echo $articulo["marca"]; ?></td>
                    <td><?php echo $articulo["descripcion"]; ?></td>
                    <td><?php echo $articulo["precio"]; ?> €</td>
                    <td><?php echo $articulo["fecha_modificacion"]; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        
        <h3>Estadísticas</h3>
        <p>Total de consultas: <?php echo isset($_COOKIE['total_consultas']) ? $_COOKIE['total_consultas'] : 0; ?></p>
        <p>Total de registros: <?php echo isset($_COOKIE['total_articulos']) ? $_COOKIE['total_articulos'] : 0; ?></p>
        <p>Última modificación: <?php echo $ultima_modificacion; ?></p>
    </body>
</html>
