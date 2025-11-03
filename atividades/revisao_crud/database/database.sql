CREATE DATABASE revisao_crud;

USE revisao_crud;

CREATE TABLE usuarios(
	id_usuario INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome_usuario VARCHAR(120) NOT NULL,
    email_usuario VARCHAR(255) NOT NULL,
    senha_usuario VARCHAR(255) NOT NULL
);

CREATE TABLE tarefas(
	id_tarefa INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    descricao_tarefa VARCHAR(300) NOT NULL,
    nome_setor VARCHAR(50) NOT NULL,
    prioridade ENUM('baixa', 'media', 'alta'),
    status ENUM('a fazer', 'fazendo', 'pronto') DEFAULT 'a fazer' NOT NULL,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	id_usuario INT NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
);

INSERT INTO usuarios (nome_usuario, email_usuario, senha_usuario) VALUES
('João Pereira', 'joao.pereira@empresa.com', '$2y$10$0s7v0e/ENALRXzRgNM6ksOsULXBGXXFgKvqzgOXWdLX.Pza/qe7b2'),
('Fernanda Lima', 'fernanda.lima@empresa.com', '$2y$10$2GaBrLOfFNzyGLvgFf5a9uktuovPq6GEbjQlh1xWbhIsGpX.10teC'),
('Ricardo Alves', 'ricardo.alves@empresa.com', '$2y$10$hYinQouXH2RbZusY3ZG2LOZw8ieVfpDzBYkJIOkaP2dKjW.aFZQZW');

INSERT INTO tarefas (descricao_tarefa, nome_setor, prioridade, status, id_usuario) VALUES
('Configurar servidor de produção', 'TI', 'alta', 'a fazer', 1),
('Preparar relatório mensal de vendas', 'Comercial', 'media', 'fazendo', 2),
('Organizar arquivo físico de documentos', 'Arquivo', 'baixa', 'pronto', 3);