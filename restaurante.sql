DROP DATABASE IF EXISTS restaurante;
CREATE DATABASE restaurante;
USE restaurante;

CREATE TABLE mesa (
    id_mesa INT PRIMARY KEY,
    personas INT,
    zona VARCHAR(50)
);

CREATE TABLE reserva (
    id_reserva INT PRIMARY KEY,
    nombre VARCHAR(100),
    mesa INT,
    fecha DATE,
    FOREIGN KEY (mesa) REFERENCES mesa(id_mesa)
);

INSERT INTO mesa (id_mesa, personas, zona) VALUES (1, 2, 'Terraza');
INSERT INTO mesa (id_mesa, personas, zona) VALUES (2, 4, 'Terraza');
INSERT INTO mesa (id_mesa, personas, zona) VALUES (3, 6, 'Terraza');

INSERT INTO mesa (id_mesa, personas, zona) VALUES (4, 10, 'Interior');
INSERT INTO mesa (id_mesa, personas, zona) VALUES (5, 4, 'Interior');
INSERT INTO mesa (id_mesa, personas, zona) VALUES (6, 4, 'Interior');
INSERT INTO mesa (id_mesa, personas, zona) VALUES (7, 4, 'Interior');
INSERT INTO mesa (id_mesa, personas, zona) VALUES (8, 4, 'Interior');