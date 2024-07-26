<?php 
print_r($_GET);

include '../connection.php';

$id = $_GET['id'];

$sql = "DELETE FROM clientes WHERE id_cliente = $id";

$conn->query($sql);

header("Location: ../../clientes.php")

?>