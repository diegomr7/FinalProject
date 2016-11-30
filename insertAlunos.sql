INSERT INTO aluno (matricula, nome, sexo, dtnasc, cidade, uf)
	VALUES    ('1100', 'Alice', 'f', '1976-2-1', 'Abadia de Goiás', 'go'),
               ('1101', 'Ana Clara', 'f', '1983-2-24', 'Abadiânia', 'go'),
               ('1102', 'Arthur', 'm', '1981-11-24', 'Acreúna', 'go'),
               ('1103', 'Beatriz', 'f', '1978-10-19', 'Adelândia', 'go'),
               ('1104', 'Bernardo', 'm', '1976-12-22', 'Água Fria de Goiás', 'go'),
               ('1105', 'Cauã', 'm', '1996-11-23', 'Água Limpa', 'go'),
               ('1106', 'Davi', 'm', '1976-7-16', 'Águas Lindas de Goiás', 'go'),
               ('1107', 'Enzo', 'm', '1988-8-16', 'Alexânia', 'go'),
               ('1108', 'Felipe', 'm', '1995-4-23', 'Aloândia', 'go'),
               ('1109', 'Gabriel', 'm', '1970-9-8', 'Alto Horizonte', 'go'),
               ('1110', 'Gabriela', 'f', '1989-6-1', 'Alto Paraíso de Goiás', 'go'),
               ('1111', 'Giovanna', 'f', '1984-12-3', 'Alvorada do Norte', 'go'),
               ('1112', 'Guilherme', 'm', '1977-3-13', 'Amaralina', 'go'),
               ('1113', 'Gustavo', 'm', '1976-9-15', 'Americano do Brasil', 'go'),
               ('1114', 'Heitor', 'm', '1995-3-14', 'Amorinópolis', 'go'),
               ('1115', 'Helena', 'f', '1975-3-6', 'Anápolis', 'go'),
               ('1116', 'Henrique', 'm', '1986-12-21', 'Anhanguera', 'go'),
               ('1117', 'Isabella', 'f', '1981-10-14', 'Aparecida de Goiânia', 'go'),
               ('1118', 'Isabelly', 'f', '1973-7-28', 'Aparecida do Rio Doce', 'go'),
               ('1119', 'Isadora', 'f', '1986-6-18', 'Aporé', 'go'),
               ('1120', 'João Pedro', 'm', '1983-4-18', 'Araçu', 'go'),
               ('1121', 'Julia', 'f', '1974-8-17', 'Aragarças', 'go'),
               ('1122', 'Laura', 'f', '1982-7-20', 'Aragoiânia', 'go'),
               ('1123', 'Lucas', 'm', '1976-8-5', 'Araguapaz', 'go'),
               ('1124', 'Luiza', 'f', '1991-12-2', 'Arenópolis', 'go'),
               ('1125', 'Manuela', 'f', '1996-4-17', 'Aruanã', 'go'),
               ('1126', 'Maria Clara', 'f', '1993-5-26', 'Aurilândia', 'go'),
               ('1127', 'Maria Eduarda', 'f', '1973-11-7', 'Avelinópolis', 'go'),
               ('1128', 'Maria Luiza', 'f', '1988-8-18', 'Baliza', 'go'),
               ('1129', 'Mariana', 'f', '1986-2-28', 'Barro Alto', 'go'),
               ('1130', 'Matheus', 'm', '1987-7-7', 'Bela Vista de Goiás', 'go'),
               ('1131', 'Miguel', 'm', '1992-9-27', 'Bom Jardim de Goiás', 'go'),
               ('1132', 'Nicolas', 'm', '1975-10-24', 'Bom Jesus de Goiás', 'go'),
               ('1133', 'Pedro', 'm', '1971-11-13', 'Bonfinópolis', 'go'),
               ('1134', 'Pedro Henrique', 'm', '1972-2-22', 'Bonópolis', 'go'),
               ('1135', 'Rafael', 'm', '1975-5-9', 'Brazabrantes', 'go'),
               ('1136', 'Rafaela', 'f', '1971-7-25', 'Buriti Alegre', 'go'),
               ('1137', 'Samuel', 'm', '1975-8-4', 'Buriti de Goiás', 'go'),
               ('1138', 'Sophia', 'f', '1989-7-13', 'Buritinópolis', 'go'),
               ('1139', 'Valentina', 'f', '1992-4-26', 'Cabeceiras', 'go');

INSERT INTO curso (numero, nome, sigla)
	VALUES    ('1', 'Jogos Digitais', 'jd'),
               ('2', 'Gestão de Tecnologia da Informação', 'gti'),
               ('3', 'Segurança da Informação', 'si');
               
INSERT INTO projeto(ano, semestre, modulo, dt_inicio, dt_termino, tema, descricao, num_curso)
	VALUES    ('2015', '1', 'I', '2015-2-21', '2015-3-8', 'Arcade I', 'Criar o primeiro jogo', '1'),
               ('2015', '2', 'II', '2015-11-11', '2015-11-26', 'Arcade 2', 'Criar o segundo jogo', '1'),
               ('2016', '1', 'III', '2016-4-13', '2016-4-28', 'Arcade 3', 'Criar o terceiro jogo', '1'),
               ('2015', '1', 'I', '2015-5-17', '2015-6-2', 'TI Verde', 'Técnicas de sustentabilidade', '2'),
               ('2015', '2', 'II', '2015-12-1', '2015-12-17', 'Gerencia de Processos', 'Gestão de processos de TI', '2'),
               ('2016', '1', 'III', '2016-1-28', '2016-2-15', 'Gerencia de Projetos', 'Técnicas para gerir processos', '2'),
               ('2015', '1', 'I', '2015-2-23', '2015-3-10', 'Exploração de Pentest', 'Resultados da fase de exploração', '3'),
               ('2015', '2', 'II', '2015-10-13', '2015-10-28', 'Man-in-the-midlle', 'Executar o ataque e relatar resultados', '3'),
               ('2016', '1', 'III', '2016-2-27', '2016-3-14', 'Planejamento de Segurança', 'Hardning do SO', '3'),
               ('2016', '2', 'IV', '2016-7-12', '2016-7-27', 'Politica de Segurança da Informação', 'Elaboração de um documento Politica de Segurança da Informação', '3');
               
INSERT INTO grupo(id, nome, num_proj)
	VALUES    ('1', 'GAB', '1'),
               ('2', 'GAB', '2'),
               ('3', 'GAB', '3'),
               ('4', 'PIL', '1'),
               ('5', 'PIL', '2'),
               ('6', 'HEM', '1'),
               ('7', 'CIS', '4'),
               ('8', 'CIS', '5'),
               ('9', 'GAM', '4'),
               ('10', 'GAM', '5'),
               ('11', 'GAM', '6'),
               ('12', 'RIJ', '4'),
               ('13', 'RIJ', '5'),
               ('14', 'DAV', '7'),
               ('15', 'DAV', '8'),
               ('16', 'DAV', '9'),
               ('17', 'PFL', '7'),
               ('18', 'PFL', '8'),
               ('19', 'BJS', '7'),
               ('20', 'BJS', '8'),
               ('21', 'BJS', '9'),
               ('22', 'BJS', '10'),
               ('23', 'RMHM', '7');
               
INSERT INTO participa(matricula, id_grupo)
	VALUES    ('1100', '1'),
               ('1100', '2'),
               ('1100', '3'),
               ('1101', '9'),
               ('1101', '10'),
               ('1101', '11'),
               ('1102', '14'),
               ('1102', '15'),
               ('1102', '16'),
               ('1103', '1'),
               ('1103', '2'),
               ('1103', '3'),
               ('1104', '19'),
               ('1104', '20'),
               ('1104', '21'),
               ('1104', '22'),
               ('1105', '7'),
               ('1105', '8'),
               ('1106', '14'),
               ('1106', '15'),
               ('1106', '16'),
               ('1107', '6'),
               ('1108', '17'),
               ('1108', '18'),
               ('1109', '1'),
               ('1109', '2'),
               ('1109', '3'),
               ('1112', '10'),
               ('1112', '11'),
               ('1114', '23'),
               ('1115', '6'),
               ('1117', '12'),
               ('1117', '13'),
               ('1118', '7'),
               ('1118', '8'),
               ('1119', '4'),
               ('1119', '5'),
               ('1120', '19'),
               ('1120', '20'),
               ('1120', '21'),
               ('1120', '22'),
               ('1121', '12'),
               ('1121', '13'),
               ('1122', '17'),
               ('1122', '18'),
               ('1123', '4'),
               ('1123', '5'),
               ('1125', '23'),
               ('1126', '6'),
               ('1130', '10'),
               ('1130', '11'),
               ('1133', '4'),
               ('1133', '5'),
               ('1134', '17'),
               ('1134', '18'),
               ('1135', '23'),
               ('1136', '12'),
               ('1136', '13'),
               ('1137', '7'),
               ('1137', '8'),
               ('1138', '19'),
               ('1138', '20'),
               ('1138', '21'),
               ('1138', '22'),
               ('1139', '14'),
               ('1139', '15'),
               ('1139', '16');