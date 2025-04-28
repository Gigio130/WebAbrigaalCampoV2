-- Crear base de datos
CREATE DATABASE abriga_al_campo;
USE abriga_al_campo;

-- Tabla personas
CREATE TABLE personas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombres VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    edad INT,
    pais VARCHAR(100),
    ciudad VARCHAR(100),
    direccion VARCHAR(255),
    telefono VARCHAR(20),
    correo_electronico VARCHAR(100) UNIQUE,
    acepta_tratamiento_datos BOOLEAN NOT NULL DEFAULT 0,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla beneficiarios
CREATE TABLE beneficiarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    persona_id INT,
    descripcion TEXT,
    FOREIGN KEY (persona_id) REFERENCES personas(id) ON DELETE CASCADE
);

-- Tabla colaboradores
CREATE TABLE colaboradores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    persona_id INT,
    tipo_colaboracion ENUM('Administrativo', 'Mano de Obra') NOT NULL,
    descripcion TEXT,
    FOREIGN KEY (persona_id) REFERENCES personas(id) ON DELETE CASCADE
);

-- Tabla donantes
CREATE TABLE donantes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    persona_id INT,
    tipo_donacion ENUM('Especie', 'Efectivo') NOT NULL,
    descripcion TEXT,
    FOREIGN KEY (persona_id) REFERENCES personas(id) ON DELETE CASCADE
);
