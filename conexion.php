<?php
$host = "localhost";      // Servidor local
$dbname = "tienda_gorras"; // Nombre de la base de datos
$username = "root";       // Usuario por defecto
$password = "";           // Sin contraseña en XAMPP

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit();
}
?>
