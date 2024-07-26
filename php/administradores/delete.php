<?php 
print_r($_GET);

include '../connection.php';

$id = $_GET['id'];

$sql = "DELETE FROM usuarios WHERE id = $id";

$conn->query($sql);

header("Location: ../../administradores.php")

?>