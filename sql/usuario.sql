CREATE DATABASE inventario_db;

USE inventario_db;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    sexo ENUM('M', 'F', 'O') NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);


