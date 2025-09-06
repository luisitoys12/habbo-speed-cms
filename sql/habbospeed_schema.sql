CREATE TABLE noticias (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(255),
  contenido TEXT,
  fecha DATE
);

CREATE TABLE eventos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255),
  descripcion TEXT,
  fecha DATE
);

CREATE TABLE djs (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255),
  habbo_user VARCHAR(255),
  horario VARCHAR(255)
);

CREATE TABLE slides (
  id INT AUTO_INCREMENT PRIMARY KEY,
  archivo VARCHAR(255),
  fecha_subida DATE
);

CREATE TABLE djs_agenda (
  id INT AUTO_INCREMENT PRIMARY KEY,
  dj_id INT NOT NULL,
  fecha DATE NOT NULL,
  hora_inicio TIME NOT NULL,
  hora_fin TIME NOT NULL,
  programa VARCHAR(100),
  FOREIGN KEY (dj_id) REFERENCES djs(id)
);
