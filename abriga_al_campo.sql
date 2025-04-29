-- 1. Primero eliminamos las tablas si ya existen
DROP TABLE IF EXISTS donantes;
DROP TABLE IF EXISTS colaboradores;
DROP TABLE IF EXISTS beneficiarios;
DROP TABLE IF EXISTS personas;

-- 2. Creamos la tabla personas
CREATE TABLE personas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombres VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    edad INT,
    pais VARCHAR(100),
    ciudad VARCHAR(100),
    direccion VARCHAR(255),
    telefono VARCHAR(20),
    correo_electronico VARCHAR(100), -- Ya sin UNIQUE
    acepta_tratamiento_datos BOOLEAN NOT NULL DEFAULT 0,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 3. Creamos la tabla beneficiarios
CREATE TABLE beneficiarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    persona_id INT NOT NULL,
    descripcion TEXT,
    FOREIGN KEY (persona_id) REFERENCES personas(id) ON DELETE CASCADE
);

-- 4. Creamos la tabla colaboradores
CREATE TABLE colaboradores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    persona_id INT NOT NULL,
    tipo_colaboracion ENUM('Administrativo', 'Mano de Obra') NOT NULL,
    descripcion TEXT,
    FOREIGN KEY (persona_id) REFERENCES personas(id) ON DELETE CASCADE
);

-- 5. Creamos la tabla donantes
CREATE TABLE donantes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    persona_id INT NOT NULL,
    tipo_donacion ENUM('Especie', 'Efectivo') NOT NULL,
    descripcion TEXT,
    FOREIGN KEY (persona_id) REFERENCES personas(id) ON DELETE CASCADE
);

