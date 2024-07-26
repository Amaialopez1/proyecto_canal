CREATE DATABASE videos

USE videos

CREATE TABLE usuarios(
    nombre VARCHAR(20),
    email VARCHAR(20)
);
SELECT * FROM usuarios

Create TABLE `video`(
   `id`  int(11) NOT NULL,
    `nombre` VARCHAR(255) NOT NULL,
    `ubicacion` VARCHAR(255) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

USE videos;

ALTER TABLE video
MODIFY id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT; 
ALTER TABLE `video`
MODIFY `id`INT(11) NOT NULL AUTO_INCREMENT;




