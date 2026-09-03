CREATE DATABASE IF NOT EXISTS gestion_proyectos CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE gestion_proyectos;

CREATE TABLE categorias (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE productos (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    descripcion TEXT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL DEFAULT 0,
    categoria_id INT UNSIGNED NOT NULL,
    CONSTRAINT fk_productos_categorias
        FOREIGN KEY (categoria_id) 
        REFERENCES categorias(id) 
        ON DELETE CASCADE 
        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO categorias (nombre, descripcion) VALUES
('Hardware', 'Componentes físicos y periféricos informáticos'),
('Software', 'Licencias, sistemas y herramientas de desarrollo'),
('Servicios Cloud', 'Hosting, servidores virtuales y almacenamiento en la nube');

INSERT INTO productos (nombre, descripcion, precio, stock, categoria_id) VALUES
('Teclado Mecánico RGB', 'Teclado para desarrollo con switches mecánicos táctiles', 85.50, 15, 1),
('Licencia IDE Pro', 'Suscripción anual para entorno de desarrollo avanzado', 149.00, 30, 2),
('Servidor VPS Estándar', 'Instancia con 4 vCPUs, 8 GB RAM y SSD NVMe', 25.00, 50, 3);