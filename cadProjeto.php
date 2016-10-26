<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="imgs/formatura.png">
 
	<title>Final Project</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	 
</head>

<body>
	 
	<div class="container">
		<div class="header clearfix">
			<nav>
				<ul class="nav nav-pills pull-right">
					<li role="presentation"><a href="index.php">Home</a></li>
					<li role="presentation">
						<a href="#" data-toggle="dropdown" class="dropdown-toggle">Listar</a>
						<ul class="dropdown-menu">
							<li><a href="listAluno.php">Aluno</a></li>
							<?php session_start(); if (isset($_SESSION['categoria'])) { if ($_SESSION['categoria'] == "c") { ?>
							<li><a href="listUser.php">Usuário</a></li>
							<li><a href="listCurso.php">Curso</a></li>
							<li><a href="listDisciplina.php">Disciplina</a></li>
							<?php } } ?>
						</ul>
					</li>
					<?php if (isset($_SESSION['categoria'])) { if ($_SESSION['categoria'] == "c") { ?>
					<li role="presentation" class="active">
						<a href="#" data-toggle="dropdown" class="dropdown-toggle">Cadastro</a>
						<ul class="dropdown-menu">
							<li><a href="cadAluno.php">Aluno</a></li>
							<li><a href="cadUser.php">Usuário</a></li>
							<li><a href="cadCurso.php">Curso</a></li>
							<li><a href="cadDisciplina.php">Disciplina</a></li>
							<li><a href="cadProjeto.php">Projeto</a></li>
						</ul>
					</li>
					<li role="presentation">
						<a href="#" data-toggle="dropdown" class="dropdown-toggle">Relatório</a>
						<ul class="dropdown-menu">
							<li><a href="cadAluno.php">Aluno</a></li>
							<li><a href="cadUser.php">Usuário</a></li>
						</ul>
					</li>
					<?php } }
						if (isset($_SESSION['categoria'])) { if ($_SESSION['categoria'] == "p") { ?>
					<li role="presentation"><a href="cadNotas.php">Notas</a></li>
					<?php } } ?>
					<li role="presentation">
						<?php if (empty($_SESSION['login'])) { echo "<a href='#' data-toggle='modal' data-target='#delete-modal'>Login</a>"; } else { echo "<a href='#' data-toggle='dropdown' class='dropdown-toggle'>".$_SESSION['login']; ?></a>
						<ul class="dropdown-menu">
							<li><a href="perfil.php">Perfil</a></li>
							<li><a href="logout.php">Logout</a></li>
						</ul>
						<?php } ?>
					</li>
				</ul>
			</nav>
			<h3 class="text-muted">Final Project</h3>
		</div>
		  
      <div class="row marketing">
		<div class="col-lg-12">
			<form class="form-horizontal" action="gravaProjeto.php" method="post">
				<fieldset>
				
					<legend class="text-center">Cadastro de projeto</legend>
					
					<div class="form-group">
						<label class="col-md-4 control-label" for="ano">Ano:</label>  
						<div class="col-md-3">
							<input id="ano" name="ano" type="number" placeholder="Ano..." class="form-control input-md">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-4 control-label" for="semestre">Semestre:</label>
						<div class="col-md-2">
							<select id="semestre" name="semestre" class="form-control">
								<option value="1">1º</option>
								<option value="2">2º</option>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-4 control-label" for="modulo">Módulo:</label>
						<div class="col-md-2">
							<select id="modulo" name="modulo" class="form-control">
								<option value="I">I</option>
								<option value="II">II</option>
								<option value="III">III</option>
								<option value="IV">IV</option>
								<option value="V">V</option>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-4 control-label" for="dt_inicio">Data de início:</label>  
						<div class="col-md-4">
							<input id="dt_inicio" name="dt_inicio" type="date" placeholder="Data de início..." class="form-control input-md">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-4 control-label" for="dt_termino">Data de término:</label>  
						<div class="col-md-4">
							<input id="dt_termino" name="dt_termino" type="date" placeholder="Data de término..." class="form-control input-md">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-4 control-label" for="tema">Tema:</label>  
						<div class="col-md-6">
							<input id="tema" name="tema" type="text" placeholder="Tema..." class="form-control input-md">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-4 control-label" for="descricao">Descrição:</label>
						<div class="col-md-6">                     
							<textarea class="form-control" id="descricao" name="descricao"></textarea>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-4 control-label" for="curso">Curso</label>
						<div class="col-md-6">
							<select id="curso" name="curso" class="form-control">
								<?php
									include 'conecta.php';
									
									$sql="SELECT * FROM curso";
									$dados=pg_exec($conexao, $sql);
									$linha=pg_fetch_array($dados);
									$total = pg_num_rows($dados);
									
									if($total > 0) {
										do {
											echo "<option value='".$linha['numero']."'>".$linha['nome']."</option>";
										}while($linha = pg_fetch_assoc($dados));
									}
								?>
							</select>
						</div>
					</div>
					
					<div class="form-group text-center">
                                   <div class="col-md-12">
                                        <input type="submit" id="salvar" name="salvar" class="btn btn-success" value="Enviar"></input>
                                        <input type="reset" id="limpar" name="limpar" class="btn btn-warning" value="Limpar"></input>
                                   </div>
                              </div>
					
				</fieldset>
			</form>
		</div>
	</div>
  
	<footer class="footer">
		<p>&copy; 2016 Dav, Inc.</p>
	</footer>

	</div>
	 
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/funcoes.js"></script>
</body>
</html>