-- Crear base de datos
CREATE DATABASE IF NOT EXISTS habbospeed CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE habbospeed;

-- Tabla: DJs personalizados
CREATE TABLE IF NOT EXISTS djs (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  habbo_user VARCHAR(50) NOT NULL,
  estilo VARCHAR(100),
  horario VARCHAR(50),
  frase TEXT,
  color_fondo VARCHAR(20) DEFAULT '#ffffff',
  emoji VARCHAR(10),
  redes TEXT,
  imagen_extra TEXT,
  avatar_url TEXT,
  creado TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  actualizado TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tabla: Agenda de DJs
CREATE TABLE IF NOT EXISTS djs_agenda (
  id INT AUTO_INCREMENT PRIMARY KEY,
  dj_id INT NOT NULL,
  fecha DATE NOT NULL,
  hora_inicio TIME NOT NULL,
  hora_fin TIME NOT NULL,
  programa VARCHAR(100),
  FOREIGN KEY (dj_id) REFERENCES djs(id) ON DELETE CASCADE
);

-- Tabla: Eventos
CREATE TABLE IF NOT EXISTS eventos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255) NOT NULL,
  descripcion TEXT,
  fecha_inicio DATETIME,
  fecha_fin DATETIME,
  imagen TEXT,
  activo BOOLEAN DEFAULT TRUE,
  creado TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla: Noticias
CREATE TABLE IF NOT EXISTS noticias (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(255) NOT NULL,
  contenido TEXT NOT NULL,
  autor VARCHAR(100),
  imagen TEXT,
  fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  activo BOOLEAN DEFAULT TRUE
);

-- Tabla: Slides (carrusel)
CREATE TABLE IF NOT EXISTS slides (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(255),
  subtitulo VARCHAR(255),
  imagen TEXT,
  enlace TEXT,
  orden INT DEFAULT 0,
  activo BOOLEAN DEFAULT TRUE
);

-- Tabla: Usuarios (para login y roles)
CREATE TABLE IF NOT EXISTS usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario VARCHAR(50) UNIQUE NOT NULL,
  contraseña VARCHAR(255) NOT NULL,
  rol ENUM('admin','dj','editor') DEFAULT 'dj',
  activo BOOLEAN DEFAULT TRUE,
  creado TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla: Estado de la radio (actual DJ, oyentes)
CREATE TABLE IF NOT EXISTS radio_estado (
  id INT AUTO_INCREMENT PRIMARY KEY,
  dj_actual VARCHAR(100),
  estilo_actual VARCHAR(100),
  oyentes INT DEFAULT 0,
  actualizado TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tabla: Estadísticas (dashboard)
CREATE TABLE IF NOT EXISTS estadisticas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  tipo VARCHAR(50),
  valor INT DEFAULT 0,
  fecha DATE,
  creado TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla: Logs de actividad
CREATE TABLE IF NOT EXISTS logs (
  id INT AUTO_INCREMENT PRIMARY KEY,
  modulo VARCHAR(50),
  accion TEXT,
  usuario VARCHAR(50),
  fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla: Configuración de mantenimiento
CREATE TABLE IF NOT EXISTS mantenimiento (
  id INT AUTO_INCREMENT PRIMARY KEY,
  activo BOOLEAN DEFAULT FALSE,
  mensaje TEXT,
  actualizado TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Datos de ejemplo para DJs
INSERT INTO djs (nombre, habbo_user, estilo, horario, frase, color_fondo, emoji, redes, imagen_extra)
VALUES (
  'Kusito',
  'Kusito',
  'Electro Latino',
  '20:00 - 22:00',
  '¡La música es mi lenguaje!',
  '#ffccff',
  '🌟',
  '@kusito.radio',
  'assets/kusito_banner.png'
);

-- Datos de ejemplo para radio
INSERT INTO radio_estado (dj_actual, estilo_actual, oyentes)
VALUES ('Kusito', 'Electro Latino', 12);

-- Datos de ejemplo para mantenimiento
INSERT INTO mantenimiento (activo, mensaje)
VALUES (FALSE, 'Estamos ajustando los cables y calibrando los beats. Vuelve pronto 🎶');

-- Tabla de insignias
CREATE TABLE insignias (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(50),
  descripcion TEXT,
  icono VARCHAR(100),
  tipo ENUM('dj', 'oyente')
);

-- Relación usuarios ↔ insignias
CREATE TABLE usuario_insignia (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario_id INT,
  insignia_id INT,
  fecha_asignacion DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
  FOREIGN KEY (insignia_id) REFERENCES insignias(id)
);

-- Añadir campo de caracolas a usuarios
ALTER TABLE usuarios ADD caracolas INT DEFAULT 0;

CREATE TABLE insignias (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(50),
  descripcion TEXT,
  icono VARCHAR(100),
  tipo ENUM('dj', 'oyente')
);

CREATE TABLE usuario_insignia (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario_id INT,
  insignia_id INT,
  fecha_asignacion DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
  FOREIGN KEY (insignia_id) REFERENCES insignias(id)
);

ALTER TABLE usuarios ADD caracolas INT DEFAULT 0;
ALTER TABLE usuarios ADD tipo ENUM('personal', 'invitado', 'oyente') DEFAULT 'oyente';

