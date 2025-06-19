-- Tabla 1: Ubicación
CREATE TABLE ubicacion (
    id_ubicacion INT AUTO_INCREMENT PRIMARY KEY,
    latitud DECIMAL(9,6) NOT NULL,
    longitud DECIMAL(9,6) NOT NULL,
    direccion_textual TEXT NOT NULL
);

-- Tabla 2: Quiosco
CREATE TABLE quiosco (
    id_quiosco INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    horario VARCHAR(100),
    id_ubicacion INT NOT NULL,
    FOREIGN KEY (id_ubicacion) REFERENCES ubicacion(id_ubicacion)
);

-- Tabla 3: Comida
CREATE TABLE comida (
    id_comida INT AUTO_INCREMENT PRIMARY KEY,
    nombre_tipo VARCHAR(100) NOT NULL
);

-- Tabla 4: Menú (ítems del menú)
CREATE TABLE menu_item (
    id_menu_item INT AUTO_INCREMENT PRIMARY KEY,
    id_quiosco INT NOT NULL,
    id_comida INT NOT NULL,
    nombre_item VARCHAR(100) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (id_quiosco) REFERENCES quiosco(id_quiosco),
    FOREIGN KEY (id_comida) REFERENCES comida(id_comida)
);

-- Tabla 5: Usuario
CREATE TABLE usuario (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(150) UNIQUE NOT NULL,
    rol ENUM('admin', 'visitante') NOT NULL,
    password_hash VARCHAR(255)
);

-- Tabla 6: Reseña
CREATE TABLE resena (
    id_resena INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_quiosco INT NOT NULL,
    puntuacion INT NOT NULL CHECK (puntuacion BETWEEN 1 AND 5),
    comentario TEXT,
    fecha DATE NOT NULL DEFAULT (CURRENT_DATE),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_quiosco) REFERENCES quiosco(id_quiosco)
);
