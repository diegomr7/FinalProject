<?php
     include 'verifica.php';
     
     $ArrPATH = explode("/",$_SERVER['SCRIPT_NAME']);
     $PATH = $ArrPATH[count($ArrPATH)-1];
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
	 <script type="text/javascript" src="js/jquery.mask.js"/></script>
	 <script type="text/javascript">$(document).ready(function(){
		 $("#nota1").mask("99.9");
		 $("#nota2").mask("99.9");
		 $("#nota3").mask("99.9");
		 $("#nota4").mask("99.9");
	});	 
	</script>
</head>

<body>
     <div class="container">
          <?php
               include 'menu.php';
          ?>
          
          <div class="row marketing">
               <div class="col-lg-12">
                    <form class="form-horizontal" action="gravaNotas.php" method="post" >
                         <fieldset>
                      
                              <legend class="text-center">Cadastrar notas dos alunos</legend>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="projeto">Projeto:</label>
                                   <div class="col-md-5">
                                        <select id="projeto" name="projeto" class="form-control" onchange="getGrupo(this.value, 0);">
                                             <option value="">Selecione...</option>
                                             <<?php
                                                  include 'conecta.php';
                                                  
                                                  $sql = "SELECT * FROM projeto";
                                                  $dados = pg_exec($conexao, $sql);
                                                  $linha = pg_fetch_array($dados);
                                                  $total = pg_num_rows($dados);
                                                  
                                                  if($total > 0) {
                                                       do {
                                                            echo "<option value='".$linha['numero']."'>".$linha['tema']." - ".$linha['ano']." ".$linha['semestre']."</option>";
                                                       }while($linha = pg_fetch_assoc($dados));
                                                  }
                                             ?>
                                        </select>
                                   </div>
                              </div>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="grupo">Grupo:</label>
                                   <div class="col-md-4">
                                        <select id="grupo" name="grupo" class="form-control" onchange="getAlunos(this.value, 0);">
                                             <option value="">Selecione...</option>
                                        </select>
                                   </div>
                              </div>
                              
                              <div class="row marketing">
                                   <div id="list" class="row text-center center">
                                        
                                   </div>
                              </div>
                              
                              <div class="form-group text-center">
                                   <div class="col-md-12">
                                        <input type="submit" id="salvar" name="salvar" class="btn btn-success" value="Enviar">
                                        <input type="reset" id="limpar" name="limpar" class="btn btn-warning" value="Limpar" onclick="return limpa();">
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
	 <script src="js/bootbox.min.js"></script>
</body>
</html>
