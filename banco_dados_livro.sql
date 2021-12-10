CREATE TABLE usuario (
 login VARCHAR(20) PRIMARY KEY
 ,senha VARCHAR(100) NOT NULL
 ,nome VARCHAR(50) NOT NULL
 ,email VARCHAR(100) NOT NULL
);

CREATE TABLE oferta (
 id SERIAL PRIMARY KEY -- Hugo: Se é PK, então já é UNIQUE automaticamente! Ou seja, não se repete.
 ,titulo_do_livro VARCHAR(100) NOT NULL
 ,login_doador VARCHAR(20) NOT NULL
 ,FOREIGN KEY(login_doador) REFERENCES usuario(login)
);