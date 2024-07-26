<?php
include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $sexo = $_POST['sexo'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nombre, sexo, fecha_nacimiento, username, password) VALUES ('$nombre', '$sexo', '$fecha_nacimiento', '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../../administradores.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Método no permitido";
}
?>
