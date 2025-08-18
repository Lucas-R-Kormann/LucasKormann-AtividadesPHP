CREATE DATABASE futebol_db;
USE futebol_db;

CREATE TABLE times (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cidade VARCHAR(100) NOT NULL
);

CREATE TABLE jogadores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    posicao VARCHAR(30) NOT NULL,
    numero_camisa INT NOT NULL,
    time_id INT,
    FOREIGN KEY (time_id) REFERENCES times(id)
);

CREATE TABLE partidas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    time_casa_id INT NOT NULL,
    time_fora_id INT NOT NULL,
    data_jogo DATE NOT NULL,
    gols_casa INT DEFAULT 0,
    gols_fora INT DEFAULT 0,
    FOREIGN KEY (time_casa_id) REFERENCES times(id),
    FOREIGN KEY (time_fora_id) REFERENCES times(id)
);

-- Inserindo times
INSERT INTO times (nome, cidade) VALUES
('Flamengo', 'Rio de Janeiro'),
('Palmeiras', 'São Paulo'),
('Grêmio', 'Porto Alegre'),
('Atlético Mineiro', 'Belo Horizonte'),
('Corinthians', 'São Paulo'),
('Santos', 'Santos'),
('Fluminense', 'Rio de Janeiro'),
('Internacional', 'Porto Alegre'),
('São Paulo', 'São Paulo'),
('Botafogo', 'Rio de Janeiro');

-- Inserindo jogadores do Flamengo
INSERT INTO jogadores (nome, posicao, numero_camisa, time_id) VALUES
('Gabriel Barbosa', 'Atacante', 9, 1),
('Bruno Henrique', 'Atacante', 27, 1),
('Gerson', 'Meio-campista', 8, 1),
('Everton Ribeiro', 'Meio-campista', 7, 1),
('Filipe Luís', 'Lateral', 16, 1);

-- Inserindo jogadores do Palmeiras
INSERT INTO jogadores (nome, posicao, numero_camisa, time_id) VALUES
('Raphael Veiga', 'Meio-campista', 23, 2),
('Rony', 'Atacante', 10, 2),
('Gustavo Gómez', 'Zagueiro', 15, 2),
('Weverton', 'Goleiro', 21, 2),
('Dudu', 'Atacante', 7, 2);

-- Inserindo jogadores do Grêmio
INSERT INTO jogadores (nome, posicao, numero_camisa, time_id) VALUES
('Luis Suárez', 'Atacante', 9, 3),
('Ferreira', 'Atacante', 11, 3),
('Cristaldo', 'Meio-campista', 10, 3),
('Kannemann', 'Zagueiro', 4, 3),
('Grando', 'Goleiro', 1, 3);

-- Inserindo partidas
INSERT INTO partidas (time_casa_id, time_fora_id, data_jogo, gols_casa, gols_fora) VALUES
(1, 2, '2023-05-10', 2, 1),   -- Flamengo 2x1 Palmeiras
(3, 4, '2023-05-12', 1, 1),   -- Grêmio 1x1 Atlético-MG
(2, 5, '2023-05-15', 3, 0),   -- Palmeiras 3x0 Corinthians
(6, 1, '2023-05-18', 0, 2),   -- Santos 0x2 Flamengo
(4, 3, '2023-05-20', 2, 3),   -- Atlético-MG 2x3 Grêmio
(5, 7, '2023-05-22', 1, 1),   -- Corinthians 1x1 Fluminense
(8, 9, '2023-05-25', 0, 0),   -- Internacional 0x0 São Paulo
(10, 6, '2023-05-28', 1, 2),  -- Botafogo 1x2 Santos
(7, 8, '2023-06-01', 2, 2),   -- Fluminense 2x2 Internacional
(9, 10, '2023-06-05', 3, 1);  -- São Paulo 3x1 Botafogo