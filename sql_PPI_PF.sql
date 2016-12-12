CREATE DATABASE projetointegrador;

\c projetointegrador;

CREATE USER senac WITH PASSWORD'senac123';

ALTER DATABASE projetointegrador OWNER TO senac;

CREATE TABLE usuario (
                login VARCHAR(20) PRIMARY KEY NOT NULL,
                senha VARCHAR(50) NOT NULL, --Obrigatório; Criptografar com md5
                nome VARCHAR(80) NOT NULL,  --Obrigatório; nome completo
                categoria CHAR(1) NOT NULL, --Obrigatório; Domínio: (C-coordenador, G-gerente do PI; P-professor) 
                situacao CHAR(1) NOT NULL   --Obrigatório; Domínio: (A-ativo; I-Inativo)
);

ALTER TABLE usuario OWNER TO senac;

CREATE TABLE aluno (
                matricula CHAR(15) PRIMARY KEY NOT NULL,
                nome VARCHAR(80) NOT NULL,   --obrigatório
                sexo CHAR(1) NOT NULL,       --Obrigatório; Domínio: M (masculino) ou F (feminino)
                dtnasc DATE NOT NULL,	     --obrigatório
                cidade VARCHAR(40) NOT NULL, --Obrigatório; cidade de nascimento
                uf CHAR(2) NOT NULL	     --Obrigatório; sigla do estado de nascimento
);

ALTER TABLE aluno OWNER TO senac;

CREATE TABLE disciplina (
                codigo INT PRIMARY KEY NOT NULL,
                nome VARCHAR(80) NOT NULL, --Obrigatório
                ch VARCHAR(80) NOT NULL    --Obrigatório; carga horária da disciplina
);


ALTER TABLE disciplina OWNER TO senac;

CREATE TABLE curso (
                numero INT PRIMARY KEY NOT NULL,
                nome VARCHAR(150) NOT NULL, --Obrigatório
                sigla CHAR(3) NOT NULL	    --Obrigatório
);

ALTER TABLE curso OWNER TO senac;

CREATE TABLE projeto (
				numero serial PRIMARY KEY NOT NULL,
				ano INT NOT NULL,                 --Obrigatório; 4 digitos
				semestre INT NOT NULL,		  --Obrigatório; apenas 1 digitos, sendo: 1 para primeiro semestre 2 para segundo semestre 
				modulo CHAR(3),			  --Representa o módulo do curso em algarismo romano: Os valores possíveis são: I, II, III, IV, V
				dt_inicio DATE NOT NULL,	  --Obrigatório 	
				dt_termino DATE NOT NULL,	  --Obrigatório; deve ser maior que a data de início
				tema VARCHAR(100) NOT NULL,	  --Obrigatório; Título do projeto integrador	
				descricao VARCHAR(8000) NOT NULL, --Obrigatório; descrição do projeto
				num_curso INT NOT NULL  	  --FK; Obrigatório 	
);

ALTER TABLE projeto OWNER TO senac;

CREATE TABLE composto (
				num_proj INT,            	       --PK; FK 
				cod_disc INT,            	       --PK; FK
				desc_atividade VARCHAR(2000) NOT NULL  --Obrigatório; descrição da atividade a ser realizada para esta disciplina	
);

ALTER TABLE composto OWNER TO SENAC;

CREATE TABLE grupo(
				id INT PRIMARY KEY NOT NULL,
				nome VARCHAR(60) NOT NULL, --Obrigatório; Nome do grupo
				num_proj INT NOT NULL 	   --FK; Obrigatório
);

ALTER TABLE grupo OWNER TO SENAC;

CREATE TABLE participa (
				matricula CHAR(15), --PK; FK
				id_grupo INT,       --PK; FK
				nota NUMERIC(3,1)   --Opcional; representa a nota do aluno
);

ALTER TABLE participa OWNER TO SENAC;

ALTER TABLE projeto
	ADD CONSTRAINT num_curso FOREIGN KEY (num_curso) REFERENCES curso (numero); --Chave estrangeira tabela projeto/curso		

ALTER TABLE composto 
	ADD PRIMARY KEY (num_proj, cod_disc),                                          --Chave primária tabela composto
	ADD CONSTRAINT num_proj FOREIGN KEY (num_proj) REFERENCES projeto (numero),    --Chave estrangeira tabela composto/projeto
	ADD CONSTRAINT cod_disc FOREIGN KEY (cod_disc) REFERENCES disciplina (codigo); --Chave estrangeira tabela composto/disciplina

ALTER TABLE grupo
	ADD CONSTRAINT num_proj FOREIGN KEY (num_proj) REFERENCES projeto (numero); --Chave estrangeira tabela grupo/projeto

ALTER TABLE participa 
	ADD PRIMARY KEY (matricula, id_grupo),                                         --Chave primária tabela participa
	ADD CONSTRAINT matricula FOREIGN KEY (matricula) REFERENCES aluno (matricula), --Chave estrangeira tabela participa/aluno
	ADD CONSTRAINT id_grupo FOREIGN KEY (id_grupo) REFERENCES grupo (id); 	       --Chave estrangeira tabela participa/grupo 		

INSERT INTO usuario (login, senha, nome, categoria, situacao) VALUES ('admin', MD5('admin'), 'admin', 'c', 'a'); --Usuario admin para acessar o sistema pela primeira vez; Alterar a senha após o primeiro login			
