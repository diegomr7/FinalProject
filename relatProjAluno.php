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
</head>

<body>
     <div class="container">
          <?php
               include 'menu.php';
          ?>
          
          <div class="row marketing">
               <div class="col-lg-12">
                    <form class="form-horizontal" method="post">
                         <fieldset>
                      
                              <legend class="text-center">Relação de projetos por aluno</legend>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="curso">Curso:</label>
                                   <div class="col-md-5">
                                        <select id="curso" name="curso" class="form-control" onchange="listAlunos(this.value, 0);">
                                             <option value="">Selecione...</option>
                                             <?php
                                                  include 'conecta.php';
                                                  
                                                  $sql = "SELECT * FROM curso";
                                                  $dados = pg_exec($conexao, $sql);
                                                  $linha = pg_fetch_array($dados);
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
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="aluno">Aluno:</label>
                                   <div class="col-md-5">
                                        <select id="aluno" name="aluno" class="form-control">
                                             <option value="">Selecione...</option>
                                        </select>
                                   </div>
                              </div>
                              
                              <div class="form-group text-center">
							<div class="col-md-12">
								<input type="submit" id="salvar" name="salvar" class="btn btn-primary" value="Enviar"></input>
							</div>
						</div>
                         </fieldset>
                    </form>
               </div>
          </div>
          
          <?php
               include 'conecta.php';
               
               if (isset($_POST['aluno'])){
                    $matricula = $_POST['aluno'];
               }
               
               if ($conexao) {
                    if (isset($matricula)) {
                         if ($matricula != "") {
                              $sql1 = "SELECT pj.tema, pr.nota FROM projeto pj, grupo gr, participa pr WHERE pj.numero = gr.num_proj AND gr.id = pr.id_grupo AND pr.matricula = '$matricula'";
                              $dados1 = pg_exec($sql1);
                              $sql2 = "SELECT DISTINCT nome FROM aluno WHERE matricula = '$matricula'";
                              $linha2 = pg_fetch_assoc(pg_exec($sql2));
                              
                              if (pg_num_rows($dados1) > 0) {
                                   echo "<div class='row marketing'><div id='list' class='row'><div class='table-responsive col-md-12'>
                                   <table class='table table-striped' cellspacing='0' cellpadding='0'><h4>Relação de projetos do aluno ".$linha2['nome']."</h4><thead>
                                   <tr><th>Projeto</th><th>Nota</th></tr></thead><tbody>";
                                   
                                   while ($linha1=pg_fetch_assoc($dados1)) {
                                        echo "<tr><td>".$linha1['tema']."</td><td>".$linha1['nota']."</td></tr>";
                                   }
                                   
                                   echo "</tbody></table></div></div></div>";
                              } else {
                                   echo "<h3 class='text-center'>Nenhum projeto encontrado para esse aluno.</h3>";
                              }
                         } else {
                              echo "<h3 class='text-center'>O aluno não foi informado.</h3>";
                         }
                    }
               } else {
                    echo "<h3 class='text-center'>Falha na conexão com o banco de dados.</h3>";
               }
          ?>
          
          <footer class="footer">
              <p>&copy; 2016 Dav, Inc.</p>
          </footer>
     </div>
    
     <script src="js/jquery.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/funcoes.js"></script>
</body>
</html>