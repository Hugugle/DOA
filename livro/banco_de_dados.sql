CREATE TABLE usuario (
 login VARCHAR(20) PRIMARY KEY -- Hugo: Se é PK, então já é UNIQUE automaticamente! Ou seja, não se repete.
 ,senha VARCHAR(100) NOT NULL
 ,nome VARCHAR(50) NOT NULL
 ,email VARCHAR(100) NOT NULL
);

-- usuário de teste
INSERT INTO usuario (login,senha,nome,email) VALUES ('usuarioteste','teste123','Testa da Silva','teste@teste');

CREATE TABLE oferta (
 id SERIAL PRIMARY KEY -- Hugo: Se é PK, então já é UNIQUE automaticamente! Ou seja, não se repete.
 ,titulo_do_livro VARCHAR(100) NOT NULL
 ,login_doador VARCHAR(20) NOT NULL
 ,FOREIGN KEY(login_doador) REFERENCES usuario(login)
);

-- oferta de livro de teste
INSERT INTO oferta (titulo_do_livro,login_doador) VALUES ('Orgulho e Preconceito','Hugugle');
INSERT INTO oferta (titulo_do_livro,login_doador) VALUES ('Um Livro Ilustrado de Maus Argumentos','usuarioteste');

