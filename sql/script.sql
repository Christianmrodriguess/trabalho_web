create database votacao;
use votacao;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL
);

INSERT INTO usuarios (nome, email, senha) VALUES (
	'admin', 
    'admin',
    '123'
);

CREATE TABLE candidatos (
	id INT AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(255) NOT NULL,
    partido VARCHAR(255) NOT NULL,
    votos INT NOT NULL DEFAULT 0
);

CREATE TABLE eleitores (
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    cpf VARCHAR(11) NOT NULL,
    votou TINYINT(1) DEFAULT 0
);

CREATE TABLE votos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_eleitor INT,
    id_candidato INT
);