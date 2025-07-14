Para uma breve explicação:

Eu não consegui exportar o banco de dados criado para a atividade 20, então para o arquivo desta atividade funcionar corretamente, deve-se fazer:

Abrir o Shell do MySQL no Xampp e executar os seguintes comandos:

mysql -u root -p
(quando pedir a senha, digite a sua senha, ou se não possuir, apenas pressione o enter)

CREATE DATABASE sistema;

USE sistema;

CREATE TABLE usuarios (
id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(100) NOT NULL,
usuario VARCHAR(100) NOT NULL,
senha VARCHAR(100) NOT NULL
);

INSERT INTO usuarios (nome, usuario, senha) VALUES
('Administrador', 'admin', '1234');

Para consultar se os valores estão corretos, digite

SELECT * FROM usuarios;

E as colunas devem retornar:

id: 1
nome: Admnistrador
usuario: admin
senha: 1234

Após isso, digite na tela de login da atividade 20:

Usuário: admin
Senha: 1234

E é para entrar no painel de admnistrador.


