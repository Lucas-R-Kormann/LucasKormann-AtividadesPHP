CREATE DATABASE farmacia_db;

USE farmacia_db;

CREATE TABLE users(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE produtos(
    id_produtos INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome_produto VARCHAR(255) NOT NULL,
    descricao_produto VARCHAR(255) NOT NULL,
    preco_produto VARCHAR(255) NOT NULL,
    quantidade_estoque VARCHAR(255) NOT NULL
);

INSERT INTO users(username, email, password) VALUES
('admin', 'admin@gmail.com', '$2y$10$P1lzjB1uEo6lXQVOYFIY3ucfDl6P4zW/RS9TQ9f5Eig7q/Fo02Syu');

INSERT INTO produtos (nome_produto, descricao_produto, preco_produto, quantidade_estoque) VALUES
('Paracetamol 500mg', 'Analgésico e antitérmico para dor e febre', '12.90', '150'),
('Dipirona Monoidratada', 'Analgésico e antitérmico para alívio de dores', '8.50', '200'),
('Ibuprofeno 400mg', 'Anti-inflamatório para dores musculares e inflamações', '15.75', '120'),
('Omeprazol 20mg', 'Protetor gástrico para azia e refluxo', '24.90', '80'),
('Band-Aid', 'Curativo adesivo para pequenos ferimentos', '6.90', '300'),
('Soro Fisiológico 500ml', 'Solução para limpeza nasal e ocular', '9.99', '100'),
('Protetor Solar FPS 50', 'Proteção contra raios UVA e UVB', '32.50', '60'),
('Shampoo Anticaspa', 'Controle de caspa e seborreia', '18.90', '75'),
('Sabonete Líquido Antibacteriano', 'Higiene pessoal com ação antibacteriana', '7.50', '180'),
('Fralda Descartável P', 'Fralda para bebês tamanho P', '45.90', '50'),
('Lenço Umedecido', 'Lenços para higiene do bebê', '12.30', '200')