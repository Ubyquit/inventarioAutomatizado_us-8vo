<?php 

print_r($_POST);

include '../connection.php';

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$ubicacion = $_POST['ubicacion'];

$sql = "INSERT INTO clientes (nombre, correo, telefono, ubicacion) VALUES ('$nombre', '$correo', '$telefono', '$ubicacion')";

if ($conn->query($sql) === TRUE) {
    echo "Nuevo registro creado exitosamente";
    header('Location: ../../clientes.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>