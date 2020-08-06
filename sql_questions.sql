-- Questões de SQL - MySql
-- Considere o seguinte modelo
CREATE DATABASE tsa_teste_backend_bd;
USE tsa_teste_backend_bd;

CREATE TABLE organizacao(
    id INT UNSIGNED AUTO_INCREMENT NOT NULL,
    nome VARCHAR(200) NOT NULL,
    data_fundacao DATE NOT NULL,
    PRIMARY KEY(id)
);

INSERT INTO organizacao(nome, data_fundacao) VALUES ('empresa_1', '2020-07-01');
INSERT INTO organizacao(nome, data_fundacao) VALUES ('empresa_2', '1980-05-12');

CREATE TABLE colaborador(
    id INT UNSIGNED AUTO_INCREMENT NOT NULL,
    nome VARCHAR(255) NOT NULL,
    organizacao_id INT UNSIGNED NOT NULL,
    data_nascimento DATE NOT NULL,
    salario DOUBLE(9,2),
    PRIMARY KEY(id),
    FOREIGN KEY (organizacao_id) REFERENCES organizacao (id)
);

INSERT INTO colaborador(nome, data_nascimento, salario, organizacao_id) 
VALUES('Alessandra', '1998-02-06', 5000, 1);

INSERT INTO colaborador(nome, data_nascimento, salario, organizacao_id) 
VALUES('Leandro', '1990-04-09', 1900, 2);

INSERT INTO colaborador(nome, data_nascimento, salario, organizacao_id) 
VALUES('Bruno', '1987-12-08', 1800, 1);

INSERT INTO colaborador(nome, data_nascimento, salario, organizacao_id) 
VALUES('Gustavo', '1995-10-17', 2000, 2);

-- 1 - Escreva uma query que retorne:
-- a) O nome da organização que foi fundada por ultimo

SELECT nome,MAX(data_fundacao) AS nome FROM organizacao;

-- b) O nome do colaborador com salário maior

SELECT nome,MAX(salario) AS nome FROM colaborador ;

-- c) O nome e data de nascimento dos colaboradores ordenada por salário, do maior para o menor.

SELECT nome, data_nascimento FROM colaborador ORDER BY salario DESC;

-- d) A idade dos colaboradoes

SELECT nome, FLOOR(DATEDIFF(NOW(), data_nascimento) / 365) FROM colaborador ORDER BY salario DESC;

-- e) O nome dos colaboradores e da empresa que ele faz parte

SELECT colaborador.nome,organizacao.nome FROM colaborador INNER JOIN organizacao WHERE organizacao.id = colaborador.organizacao_id;

-- 2 - Escreva uma query que encontre a organização que paga o maior salário

SELECT organizacao.nome, MAX(colaborador.salario) FROM  colaborador INNER JOIN organizacao WHERE colaborador.organizacao_id = organizacao.id 

-- 3 - Escreva uma query que encontre a média de salários pagos por cada empresa

SELECT organizacao.nome, AVG(colaborador.salario) FROM  colaborador INNER JOIN organizacao WHERE colaborador.organizacao_id = organizacao.id GROUP BY organizacao.id;

-- 4 - Escreva uma query que encontre a organização que tem o funcionário mais novo

SELECT colaborador.nome,organizacao.nome,MIN(FLOOR(DATEDIFF(NOW(), colaborador.data_nascimento) / 365)) AS idade
FROM colaborador
INNER JOIN organizacao WHERE organizacao.id = colaborador.organizacao_id;










