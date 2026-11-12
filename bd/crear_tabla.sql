USE libreria;

CREATE TABLE libros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    autor VARCHAR(100) NOT NULL,
    titulo VARCHAR(150) NOT NULL,
    fecha_publicacion DATE NOT NULL,
    portada MEDIUMBLOB NOT NULL
);
