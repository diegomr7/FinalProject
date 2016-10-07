CREATE DATABASE projetointegrador;

\c projetointegrador;

CREATE USER senac WITH PASSWORD'senac123';

ALTER DATABASE projetointegrador OWNER TO senac;

CREATE TABLE public.usuario (
                login VARCHAR(20) NOT NULL,
                senha VARCHAR(50) NOT NULL,
                nome VARCHAR(80) NOT NULL,
                categoria CHAR(1) NOT NULL,
                situao CHAR(1) NOT NULL,
                CONSTRAINT usuario_pk PRIMARY KEY (login)
);
COMMENT ON COLUMN public.usuario.senha IS 'criptografar em md5';
COMMENT ON COLUMN public.usuario.nome IS 'nome completo';
COMMENT ON COLUMN public.usuario.situao IS '(A)ativo/(I)inativo';

ALTER TABLE usuario OWNER TO senac;

CREATE TABLE public.aluno (
                matricula CHAR(15) NOT NULL,
                nome VARCHAR(80) NOT NULL,
                sexo CHAR(1) NOT NULL,
                dtnasc DATE NOT NULL,
                cidade VARCHAR(40) NOT NULL,
                uf CHAR(2) NOT NULL,
                CONSTRAINT aluno_pk PRIMARY KEY (matricula)
);
COMMENT ON COLUMN public.aluno.sexo IS 'M/F';
COMMENT ON COLUMN public.aluno.cidade IS 'cidade de nascimento';
COMMENT ON COLUMN public.aluno.uf IS 'sigla do estado em que nasceu';

ALTER TABLE aluno OWNER TO senac;

CREATE TABLE public.disciplina (
                codigo INT NOT NULL,
                nome VARCHAR(80) NOT NULL,
                ch VARCHAR(80) NOT NULL
);
COMMENT ON COLUMN public.disciplina.ch IS 'Carga Horários';

ALTER TABLE disciplina OWNER TO senac;

CREATE TABLE public.curso (
                numero INT NOT NULL,
                nome VARCHAR(150) NOT NULL,
                sigla CHAR(3) NOT NULL,
                CONSTRAINT curso_pk PRIMARY KEY (numero)
);

ALTER TABLE curso OWNER TO senac;