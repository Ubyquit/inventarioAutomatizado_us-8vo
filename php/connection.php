<?php
$servername = "localhost";  // Servidor de la base de datos
$username = "root";         // Nombre de usuario de la base de datos
$password = "root";             // Contraseña del usuario de la base de datos
$dbname = "inventario_db";  // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}else{
    echo "Conexión exitosa";
}
