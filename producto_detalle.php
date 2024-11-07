<?php
include 'conexion.php';  // Incluye la conexión

$id = $_GET['id'];
$query = $conn->prepare("SELECT * FROM productos WHERE id = :id");
$query->bindParam(':id', $id);
$query->execute();
$producto = $query->fetch(PDO::FETCH_ASSOC);

if (!$producto) {
    echo "Producto no encontrado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo $producto['nombre']; ?></title>
</head>
<body>
    <h1><?php echo $producto['nombre']; ?></h1>
    <img src="img/<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>">
    <p><?php echo $producto['descripcion']; ?></p>
    <p>Precio: $<?php echo $producto['precio']; ?></p>
    <form action="carrito.php" method="post">
        <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
        <input type="hidden" name="nombre" value="<?php echo $producto['nombre']; ?>">
        <input type="hidden" name="precio" value="<?php echo $producto['precio']; ?>">
        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" id="cantidad" min="1" value="1">
        <button type="submit">Agregar al Carrito</button>
    </form>
</body>
</html>
