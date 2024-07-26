<?php 

print_r($_POST);

include '../connection.php';

$nombre = $_POST['nombre'];
$codigo = $_POST['codigo'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];
$categoria = $_POST['categoria'];

$sql = "INSERT INTO productos (nombre, codigo, precio, cantidad, id_categoria) VALUES ('$nombre', '$codigo', $precio, $cantidad, $categoria)";

$conn->query($sql);

header("Location: ../../productos.php");

?>