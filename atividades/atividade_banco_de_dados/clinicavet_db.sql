CREATE DATABASE clinicavet_db;

USE clinicavet_db;

CREATE TABLE clientes (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    cpf VARCHAR(11) NOT NULL,
    telefone VARCHAR(11) NOT NULL
);

CREATE TABLE pets (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    raca VARCHAR(100) NOT NULL,
    porte ENUM('pequeno', 'medio', 'grande'),
    data_nascimento DATE NOT NULL,
    dono_id INT NOT NULL,
    FOREIGN KEY (dono_id) REFERENCES clientes(id)
);

CREATE TABLE servico(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    preco DECIMAL(10,2) NOT NULL,
    duracao_min VARCHAR(50) NOT NULL
);

CREATE TABLE agendamento(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    data_hora DATETIME NOT NULL,
    status ENUM('agendado', 'concluido', 'cancelado'),
    observacoes VARCHAR(100) NOT NULL,
    pet_id INT NOT NULL,
    servico_id INT NOT NULL,
    FOREIGN KEY (pet_id) REFERENCES pets(id),
    FOREIGN KEY (servico_id) REFERENCES servico(id)
); 