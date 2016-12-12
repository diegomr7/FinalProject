<?php
     include 'verifica.php';
     $ArrPATH = explode("/",$_SERVER['SCRIPT_NAME']);
     $PATH = $ArrPATH[count($ArrPATH)-1];
     $_SESSION['path'] = $PATH;
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
                      
                              <legend class="text-center">Relação de alunos por grupo</legend>
                              
                              <div class="form-group">
                                   <label class="col-md-5 control-label" for="ano">Ano:</label>
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
                                   <label class="col-md-5 control-label" for="semestre">Semestre:</label>
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
               
               if (isset($_POST['ano'])) {
                    $ano = $_POST['ano'];
               }
               if (isset($_POST['semestre'])) {
                    $semestre = $_POST['semestre'];
               }
               
               if ($conexao) {
                    if (isset($ano)) {
                         if ($ano != "") {
                              if (isset($semestre)) {
                                   if ($semestre != "") {
                                        $sql1 = "SELECT pj.numero, pj.tema FROM projeto pj, curso cr WHERE cr.numero = pj.num_curso AND pj.ano = '$ano' AND pj.semestre = '$semestre'";
                                        $dados1 = pg_exec($sql1);
                                        $linha1 = pg_fetch_array($dados1);
                                        
                                        if (pg_num_rows($dados1)) {
                                             echo "<ul class='nav nav-tabs'>";
                                             $i = 1;
                                             do {
                                                  if ($i == 1)  {
                                                       $class = "class='active'";
                                                  } else {
                                                       $class = "class=''";
                                                  }
                                                  echo "<li ".$class."><a data-toggle='tab' href='#pj".$linha1['numero']."'>".strtoupper($linha1['tema'])."</a></li>";
                                                  $i++;
                                             } while($linha1 = pg_fetch_assoc($dados1));
                                             echo "</ul><div class='tab-content'>";
                                             
                                             $dados1 = pg_exec($sql1);
                                             $linha1 = pg_fetch_array($dados1);
                                             $i = 1;
                                             do {
                                                  $sql2 = "SELECT pj.numero, pj.modulo, pj.dt_inicio, pj.dt_termino, pj.tema, pj.descricao, cr.nome as curso
                                                  FROM projeto pj, curso cr WHERE cr.numero = pj.num_curso AND pj.ano = '$ano' AND pj.semestre = '$semestre'";
                                                  $dados2 = pg_exec($sql2);
                                                  $linha2 = pg_fetch_array($dados2);
                                                  $sql3 = "SELECT ds.nome, cm.desc_atividade FROM composto cm, disciplina ds WHERE cm.cod_disc = ds.codigo AND cm.num_proj = '".$linha1['numero']."'";
                                                  $dados3 = pg_exec($sql3);
                                                  $linha3 =  pg_fetch_array($dados3);
                                                  
                                                  if ($i == 1)  {
                                                       $class = "class='tab-pane fade in active'";
                                                  } else {
                                                       $class = "class='tab-pane fade'";
                                                  }
                                                  
                                                  echo "<div id='pj".$linha1['numero']."' ".$class.">";
                                                  echo "<div class='row marketing'><div id='list' class='row'><div class='table-responsive col-md-12'><table class='table table-striped' cellspacing='0' cellpadding='0'>
                                                  <h4>Dados do projeto:</h4><table class='table table-striped' cellspacing='0' cellpadding='0'></tr><tr><th>Número</th><th>Tema</th><th>Módulo</th><th>Dt. início</th><th>Dt. término</th>
                                                  <th>Descrição</th><th>Curso</th></tr>";
                                                  
                                                  do {
                                                       if ($linha1['numero'] == $linha2['numero']) {
                                                            echo "<tr><td>".$linha2['numero']."</td><td>".$linha2['tema']."</td><td>".$linha2['modulo']."</td><td>".$linha2['dt_inicio']."</td>
                                                            <td>".$linha2['dt_termino']."</td><td>".$linha2['descricao']."</td><td>".$linha2['curso']."</td></tr>";
                                                       }
                                                  } while ($linha2 = pg_fetch_assoc($dados2));
                                                  
                                                  echo "</table><br><table class='table table-striped' cellspacing='0' cellpadding='0'><h4>Disciplinas do projeto:</h4>
                                                  </tr><tr><th>Disciplina</th><th>Descrição da atividade</th></tr>";
                                                  
                                                  do {
                                                       echo "<tr><td>".$linha3['nome']."</td><td>".$linha3['desc_atividade']."</td>";
                                                  } while ($linha3 = pg_fetch_assoc($dados3));
                                                  
                                                  echo "</table></div></div></div></div>";
                                                  $i++;
                                             } while($linha1 = pg_fetch_assoc($dados1));
                                             
                                             echo "</div>";
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