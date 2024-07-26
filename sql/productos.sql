CREATE TABLE categorias(
    id_categoria INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50)
);

CREATE TABLE productos(
    id_producto INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    codigo VARCHAR(10),
    precio DECIMAL(10,2),
    cantidad INT,
    id_categoria INT,
    FOREIGN KEY(id_categoria) REFERENCES categorias(id_categoria)
);