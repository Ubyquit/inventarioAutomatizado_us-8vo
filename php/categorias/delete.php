<?php 
print_r($_GET);

include '../connection.php';

$id = $_GET['id'];

$sql = "DELETE FROM categorias WHERE id_categoria = $id";

$conn->query($sql);

header("Location: ../../categorias.php")

?>