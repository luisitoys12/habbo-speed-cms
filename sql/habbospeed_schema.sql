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
