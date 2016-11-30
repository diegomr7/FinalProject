<?php
     session_start();
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
     <!-- Modal -->
     <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
          <div class="modal-dialog" role="document">
               <div class="modal-content">
                    <div class="modal-body">
                         <form action="login.php" method="post" class="form-signin center">
                              <fieldset>
                                   <legend>Logar</legend>
                                   
                                   <div class="form-group ">  
                                        <div class="col-md-12">
                                             <input name="login" id="login" type="text" placeholder="Informe seu login..." class="form-control"> 
                                        </div>
                                   </div>
                                   
                                   <div class="form-group">
                                        <div class="col-md-12">
                                             <input name="senha" id="senha" type="password" placeholder="informe sua senha..." class="form-control input-md">
                                        </div>
                                   </div>
                                   
                                   <div class="form-group">
                                        <div class="col-md-12">
                                             <button id="enviar" name="enviar" class="btn btn-lg btn-primary btn-block">Enviar</button>
                                        </div>
                                   </div>
                                  
                              </fieldset>
                         </form>
                    </div>
               </div>
          </div>
     </div> <!-- /.modal -->
     
     <div class="container">
          
          <?php
               include 'menu.php';
               include 'conecta.php';
               
               $sql2 = "SELECT * FROM aluno WHERE matricula NOT IN (SELECT matricula FROM participa)";
               $sql3 = "SELECT * FROM curso";
               $dados1 = pg_exec($conexao, $sql2);
               $dados3 = pg_exec($conexao, $sql3);
               $linha1 = pg_fetch_array($dados1);
               $linha2 = pg_fetch_array($dados3);

          ?>
               <ul class="nav nav-tabs">
          <?php
               $i = 1;
               do {
                    if ($i == 1)  {
                         $class = "class='active'";
                    } else {
                         $class = "class=''";
                    }
                    echo "<li ".$class."><a data-toggle='tab' href='#".$linha2['numero']."'>".strtoupper($linha2['sigla'])."</a></li>";
                    
                    $i++;
               } while($linha2 = pg_fetch_assoc($dados3));
               $dados3 = pg_exec($conexao, $sql3);
               $linha2 = pg_fetch_array($dados3);
          ?>
                    <li><a data-toggle='tab' href="#noProj">A. sem projeto</a></li>
               </ul>
               <div class="tab-content">
          <?php
               $i = 1;
               do {
                    $sql1 = "SELECT DISTINCT al.matricula, al.nome as nome, al.dtnasc, al.sexo, al.cidade, al.uf, cs.nome as curso, cs.sigla as sigla FROM aluno al, participa pr, grupo gr, projeto pj, curso cs
                    WHERE al.matricula = pr.matricula AND pr.id_grupo = gr.id AND gr.num_proj = pj.numero AND pj.num_curso = cs.numero AND cs.nome = '".$linha2['nome']."' ORDER BY al.nome";
                    $dados = pg_exec($conexao, $sql1);
                    $linha = pg_fetch_array($dados);
                    
                    if ($i == 1)  {
                         $class = "class='tab-pane fade in active'";
                    } else {
                         $class = "class='tab-pane fade'";
                    }
                    echo "<div id='".$linha2['numero']."' ".$class.">";
                    echo "<h3>".$linha2['nome']."</h3>";
                    
                    if(pg_num_rows($dados) > 0) {
          ?>
                         <div class="row marketing">
                              <div id="list" class="row">
                                   <div class="table-responsive col-md-12">
                                        <table class="table table-striped" cellspacing="0" cellpadding="0">
                                             <thead>
                                                  <tr>
                                                       <th>Matrícula</th>
                                                       <th>Nome</th>
                                                       <th>Sexo</th>
                                                       <th>Nascimento</th>
                                                       <th>Cidade</th>
                                                       <th>UF</th>
                                                       <th class="actions"></th>
                                                  </tr>
                                             </thead>
                                             <tbody>
          <?php
                         do {
                              if ($linha != "") {
                                   if ($linha['curso'] == $linha2['nome']) {
                                        $matricula = trim($linha['matricula']);
                                        $sigla = trim($linha['sigla']);
          ?>
                                                  <tr id='<?php echo "id".$matricula; ?>'>
                                                       <td><?php echo $matricula; ?></td>
                                                       <td><?php echo $linha['nome']; ?></td>
                                                       <td><?php echo strtoupper($linha['sexo']); ?></td>
                                                       <td><?php echo $linha['dtnasc']; ?></td>
                                                       <td><?php echo mb_strtoupper(($linha['cidade']),'UTF-8'); ?></td>
                                                       <td><?php echo strtoupper($linha['uf']); ?></td>
                              
          <?php
                                        $link = "http://".$sigla.".projetointegrador.com.br/~".$matricula;
          ?>
                                                       <td class="actions center">
                                                            <a class="btn btn-success btn-xs" href="<?php echo $link; ?>">P. Integrador</a>&nbsp
          <?php
                                        if (isset($_SESSION['categoria'])) { if ($_SESSION['categoria'] == "c") { ?>
                                                            <form action="editAluno.php" method="post">
                                                                 <input name="matricula" id="matricula" type="hidden" value="<?php echo $matricula; ?>" />
                                                                 <button class='btn btn-warning btn-xs'><span class="glyphicon glyphicon-edit"></span></button>&nbsp
                                                            </form>
                                                            <button onclick="return excluir('<?php echo $matricula; ?>', '1');" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button>
          <?php } } ?>
                                                       </td>
                                                  </tr>
          <?php
                                   }
                              }
                         }while($linha = pg_fetch_assoc($dados));

          ?>
                                             </tbody>
                                        </table>
                                   </div>
                              </div>
                         </div>
          <?php
                    } else {
                         echo "<h3 class='text-center'>Nenhum aluno encontrado</h3>";
                    }
          
                    echo "</div>";
                    
                    $i++;
               } while($linha2 = pg_fetch_assoc($dados3));
               
               echo "<div id='noProj' class='tab-pane fade'><h3>Alunos sem projeto</h3>";
                    
                    if (pg_num_rows($dados1) > 0) {
          ?>
                         <div class="row marketing">
                              <div id="list" class="row">
                                   <div class="table-responsive col-md-12">
                                        <table class="table table-striped" cellspacing="0" cellpadding="0">
                                             <thead>
                                                  <tr>
                                                       <th>Matrícula</th>
                                                       <th>Nome</th>
                                                       <th>Sexo</th>
                                                       <th>Nascimento</th>
                                                       <th>Cidade</th>
                                                       <th>UF</th>
                                                       <th class="actions"></th>
                                                  </tr>
                                             </thead>
                                             <tbody>          
          <?php
                         do {
                              if ($linha1 != "") {
                                   $matricula = trim($linha1['matricula']);
          ?>
                                                  <tr id='<?php echo "id".$matricula; ?>'>
                                                       <td><?php echo $matricula; ?></td>
                                                       <td><?php echo $linha1['nome']; ?></td>
                                                       <td><?php echo strtoupper($linha1['sexo']); ?></td>
                                                       <td><?php echo $linha1['dtnasc']; ?></td>
                                                       <td><?php echo mb_strtoupper(($linha1['cidade']),'UTF-8'); ?></td>
                                                       <td><?php echo strtoupper($linha1['uf']); ?></td>
                                                       <td class="actions center">
                                                            <button disabled class="btn btn-success btn-xs">P. Integrador</button>&nbsp
          <?php
                                        if (isset($_SESSION['categoria'])) { if ($_SESSION['categoria'] == "c") { ?>
                                                            <form action="editAluno.php" method="post">
                                                                 <input name="matricula" id="matricula" type="hidden" value="<?php echo $matricula; ?>" />
                                                                 <button class='btn btn-warning btn-xs'><span class="glyphicon glyphicon-edit"></span></button>&nbsp
                                                            </form>
                                                            <button onclick="return excluir('<?php echo $matricula; ?>', '1');" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button>
          <?php } } ?>
                                                       </td>
                                                  </tr>
          <?php
                              }
                         } while($linha1 = pg_fetch_assoc($dados1));
          ?>
                                             </tbody>
                                        </table>
                                   </div>
                              </div>
                         </div>
          <?php
                    } else {
                         echo "<h3 class='text-center'>Nenhum aluno encontrado</h3>";
                    }
                    echo "</div>";
          ?>
          
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