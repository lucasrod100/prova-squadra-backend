CREATE DATABASE provasquadra

CREATE TABLE IF NOT EXISTS usuario (
  id serial NOT NULL PRIMARY KEY,
  nome varchar(100) NOT NULL
)

CREATE TABLE IF NOT EXISTS sistema (
  id serial NOT NULL PRIMARY KEY,
  usuario_alteracao_id integer DEFAULT NULL,
  descricao varchar(100) NOT NULL,
  sigla varchar(10) NOT NULL,
  email varchar(100) DEFAULT NULL,
  url varchar(50) DEFAULT NULL,
  status boolean NOT NULL,
  justificativa_alteracao varchar(200) DEFAULT NULL,
  data_hora_alteracao timestamp DEFAULT NULL,
  FOREIGN KEY (usuario_alteracao_id) REFERENCES usuario (id)
)

INSERT INTO usuario (id, nome) VALUES (1, 'Teste Usuário');