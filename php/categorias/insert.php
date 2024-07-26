<?php 

print_r($_POST);

include '../connection.php';

$nombre = $_POST['nombre'];

$sql = "INSERT INTO categorias (nombre) VALUES ('$nombre')";

if ($conn->query($sql) === TRUE) {
    echo "Nuevo registro creado exitosamente";
    header('Location: ../../categorias.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>