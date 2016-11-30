<?php
     include 'verifica.php';
     include 'conecta.php';
     
     $ArrPATH = explode("/",$_SERVER['SCRIPT_NAME']);
     $PATH = $ArrPATH[count($ArrPATH)-1];
     
     $numero=$_POST['numero'];
     $sql="SELECT * FROM projeto WHERE numero = '$numero'";
     $dados=pg_exec($conexao, $sql);
     $linha=pg_fetch_array($dados);
?>
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
		<?php
               include 'menu.php';
          ?>
		  
		<div class="row marketing">
		    <div class="col-lg-12">
			    <form class="form-horizontal" action="gravaProjeto.php" method="post">
				    <fieldset>
				    
					    <legend class="text-center">Editar projeto</legend>
					    
                             <div class="form-group">
						    <label class="col-md-4 control-label" for="ano">Número:</label>  
						    <div class="col-md-3">
							    <input id="numero" name="numero" type="number" class="form-control input-md" value="<?php echo $linha['numero']; ?>" disabled>
						    </div>
					    </div>
                             
					    <div class="form-group">
						    <label class="col-md-4 control-label" for="ano">Ano:</label>  
						    <div class="col-md-3">
							    <input id="ano" name="ano" type="number" class="form-control input-md" value="<?php echo $linha['ano']; ?>">
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
							    <input id="dt_inicio" name="dt_inicio" type="date" placeholder="Data de início..." class="form-control input-md" value="<?php echo $linha['dt_inicio']; ?>">
						    </div>
					    </div>
					    
					    <div class="form-group">
						    <label class="col-md-4 control-label" for="dt_termino">Data de término:</label>  
						    <div class="col-md-4">
							    <input id="dt_termino" name="dt_termino" type="date" placeholder="Data de término..." class="form-control input-md" value="<?php echo $linha['dt_termino']; ?>">
						    </div>
						</div>
					    
						<div class="form-group">
							<label class="col-md-4 control-label" for="tema">Tema:</label>  
							<div class="col-md-6">
								<input id="tema" name="tema" type="text" placeholder="Tema..." class="form-control input-md" value="<?php echo $linha['tema']; ?>">
							</div>
						</div>
					    
						<div class="form-group">
							<label class="col-md-4 control-label" for="descricao">Descrição:</label>
							<div class="col-md-6">                     
								<textarea class="form-control" id="descricao" name="descricao"><?php echo $linha['descricao']; ?></textarea>
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
                                                  $sql2="SELECT cr.numero, cr.nome FROM curso cr, projeto pj WHERE pj.numero = '$numero' AND pj.num_curso = cr.numero";
                                                  $dados2=pg_exec($conexao, $sql2);
                                                  $linha2=pg_fetch_array($dados2);
                                                  $total = pg_num_rows($dados);
									    
										if($total > 0) {
                                                       echo "<option value='".$linha2['numero']."'>".$linha2['nome']."</option>";
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
								<a href="listProjeto.php" class="btn btn-danger">Voltar</a>
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