CREATE USER usuarioCrud@'%' IDENTIFIED BY 'crud';

GRANT ALL PRIVILEGES ON *.* TO usuarioCrud@'%' WITH GRANT OPTION;

CREATE DATABASE crud;

CREATE TABLE clientes(
    id INT AUTO_INCREMENT PRIMARY KEY
    nome VARCHAR(255),
    sobrenome VARCHAR(255),
    email VARCHAR(255),
    idade INT
);


