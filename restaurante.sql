DROP DATABASE IF EXISTS restaurante;
CREATE DATABASE restaurante;
USE restaurante;

CREATE TABLE zona (
    id_zona INT PRIMARY KEY,
    nombre VARCHAR(20),
    aforo VARCHAR(50)
);

CREATE TABLE reserva (
    id_reserva INT PRIMARY KEY,
    nombre VARCHAR(100),
    zona INT,
    fecha DATE,
    personas INT,
    FOREIGN KEY (zona) REFERENCES zona(id_zona)
);

INSERT INTO zona(id_zona, nombre, aforo)
Values (1, "Interior", 20);

INSERT INTO zona(id_zona, nombre, aforo) VALUES (2, "Terraza", 10);