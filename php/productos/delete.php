<?php 
print_r($_GET);

include '../connection.php';

$id = $_GET['id'];

$sql = "DELETE FROM productos WHERE id_producto = $id";

$conn->query($sql);

header("Location: ../../productos.php")

?>