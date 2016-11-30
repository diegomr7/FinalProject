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
                      
                              <legend class="text-center">Relação de alunos</legend>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="curso">Curso:</label>
                                   <div class="col-md-5">
                                        <select id="curso" name="curso" class="form-control">
                                             <option value="">Selecione...</option>
                                             <<?php
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
                                   <label class="col-md-4 control-label" for="ano">Ano:</label>
                                   <div class="col-md-2">
                                        <select id="ano" name="ano" class="form-control">
                                             <option value="">Selecione...</option>
                                             <<?php
                                                  include 'conecta.php';
                                                  
                                                  $sql = "SELECT DISTINCT ano FROM projeto";
                                                  $dados = pg_exec($conexao, $sql);
                                                  $linha = pg_fetch_array($dados);
                                                  $total = pg_num_rows($dados);
                                                  
                                                  if($total > 0) {
                                                       do {
                                                            echo "<option value='".$linha['ano']."'>".$linha['ano']."</option>";
                                                       }while($linha = pg_fetch_assoc($dados));
                                                  }
                                             ?>
                                        </select>
                                   </div>
                              </div>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="semestre">Semestre:</label>
                                   <div class="col-md-2">
                                        <select id="semestre" name="semestre" class="form-control">
                                             <option value="">Selecione...</option>
                                             <<?php
                                                  include 'conecta.php';
                                                  
                                                  $sql = "SELECT DISTINCT semestre FROM projeto";
                                                  $dados = pg_exec($conexao, $sql);
                                                  $linha = pg_fetch_array($dados);
                                                  $total = pg_num_rows($dados);
                                                  
                                                  if($total > 0) {
                                                       do {
                                                            echo "<option value='".$linha['semestre']."'>".$linha['semestre']."</option>";
                                                       }while($linha = pg_fetch_assoc($dados));
                                                  }
                                             ?>
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
               
               if (isset($_POST['curso'])){
                    $curso = $_POST['curso'];
               }
               if (isset($_POST['ano'])) {
                    $ano = $_POST['ano'];
               }
               if (isset($_POST['semestre'])) {
                    $semestre = $_POST['semestre'];
               }
               
               if ($conexao) {
                    if (isset($curso)) {
                         if ($curso != "") {
                              if (isset($ano)) {
                                   if ($ano != "") {
                                        if (isset($semestre)) {
                                             if ($semestre != "") {
                                                  $sql = "SELECT al.matricula, al.nome, pr.nota FROM aluno al, participa pr, curso cr, projeto pj, grupo gr
                                                  WHERE al.matricula = pr.matricula AND pr.id_grupo = gr.id AND gr.num_proj = pj.numero AND pj.num_curso = cr.numero
                                                  AND cr.numero = '$curso' AND pj.ano = '$ano' AND pj.semestre = '$semestre' ORDER BY al.nome";
                                                  $dados = pg_exec($sql);
                                                  $linha = pg_fetch_array($dados);
                                                  
                                                  if (pg_num_rows($dados)) {
                                                       echo "<div class='row marketing'><div id='list' class='row'><div class='table-responsive col-md-12'>
                                                       <table class='table table-striped' cellspacing='0' cellpadding='0'><thead><tr><th>Matrícula</th><th>Nome</th><th>Nota
                                                       </th></tr></thead><tbody>";
                                                       
                                                       do {
                                                            echo "<tr><td>".$linha['matricula']."</td><td>".$linha['nome']."</td><td>".$linha['nota']."</td></tr>";
                                                       } while ($linha = pg_fetch_assoc($dados));
                                                       
                                                       echo "</tbody></table></div></div></div>";
                                                  } else {
                                                       echo "<h3 class='text-center'>Nenhum aluno encontrado.</h3>";
                                                  }
                                             } else {
                                                  echo "<h3 class='text-center'>O semestre não foi informado.</h3>";
                                             }
                                        } 
                                   } else {
                                        echo "<h3 class='text-center'>O ano não foi informado.</h3>";
                                   }
                              } 
                         } else {
                              echo "<h3 class='text-center'>O curso não foi informado.</h3>";
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