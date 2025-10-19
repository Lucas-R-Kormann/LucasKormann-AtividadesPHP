CREATE DATABASE quiz_transito;
USE quiz_transito;

CREATE TABLE perguntas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pergunta TEXT NOT NULL,
    opcao_a VARCHAR(255) NOT NULL,
    opcao_b VARCHAR(255) NOT NULL,
    opcao_c VARCHAR(255) NOT NULL,
    opcao_d VARCHAR(255) NOT NULL,
    resposta_correta ENUM('A', 'B', 'C', 'D') NOT NULL,
    explicacao TEXT,
    categoria ENUM('motoristas', 'pedestres', 'ciclistas', 'sinalizacao') NOT NULL
);

INSERT INTO perguntas (pergunta, opcao_a, opcao_b, opcao_c, opcao_d, resposta_correta, explicacao, categoria) VALUES
('Qual a distância mínima que um motorista deve manter do veículo da frente?', '1 segundo', '2 segundos', '3 segundos', '4 segundos', 'B', 'A distância de 2 segundos permite reação adequada em caso de frenagem brusca.', 'motoristas'),
('O que deve fazer um pedestre ao atravessar na faixa?', 'Atravessar correndo', 'Esperar os veículos pararem completamente', 'Fazer sinal com a mão', 'Atravessar sem olhar', 'B', 'O pedestre deve aguardar que todos os veículos parem antes de iniciar a travessia.', 'pedestres'),
('Qual equipamento é OBRIGATÓRIO para ciclistas?', 'Capacete', 'Luvas', 'Óculos', 'Caneleiras', 'A', 'O capacete é equipamento obrigatório e essencial para a segurança do ciclista.', 'ciclistas'),
('O que significa uma placa circular vermelha?', 'Indicação', 'Advertência', 'Proibição', 'Obrigação', 'C', 'Placas circulares vermelhas indicam proibição ou restrição.', 'sinalizacao'),
('É permitido usar celular enquanto dirige?', 'Sim, apenas para GPS', 'Sim, no viva-voz', 'Não, em nenhuma situação', 'Sim, parado no semáforo', 'C', 'O uso de celular ao volante é proibido, mesmo parado no trânsito.', 'motoristas');