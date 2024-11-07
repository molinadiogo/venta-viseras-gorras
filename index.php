<?php
include 'conexion.php';  // Incluye la conexión

$query = $conn->prepare("SELECT * FROM productos");
$query->execute();
$productos = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tienda de Gorras</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Tienda de Gorras</h1>
    <div class="productos">
        <?php foreach ($productos as $producto): ?>
            <div class="producto">
                <img src="img/<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>">
                <h2><?php echo $producto['nombre']; ?></h2>
                <p><?php echo $producto['descripcion']; ?></p>
                <p>Precio: $<?php echo $producto['precio']; ?></p>
                <a href="producto_detalle.php?id=<?php echo $producto['id']; ?>">Ver Detalle</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
