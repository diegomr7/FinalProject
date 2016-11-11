<?php
     session_start();
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
     <!-- Modal -->
     <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
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
               
               $pagina=(isset($_GET['pagina']))? $_GET['pagina'] : 1;
               
               $sql1 = "SELECT DISTINCT al.matricula, al.nome as nome, cs.nome as curso, cs.sigla as sigla FROM aluno al, participa pr, grupo gr, projeto pj, curso cs
               WHERE al.matricula = pr.matricula AND pr.id_grupo = gr.id AND gr.num_proj = pj.numero AND pj.num_curso = cs.numero ORDER BY cs.nome";
               $sql2 = "SELECT * FROM aluno WHERE matricula NOT IN (SELECT matricula FROM participa)";
               $dados = pg_exec($conexao, $sql1);
               $total = pg_num_rows($dados);
               $dados1 = pg_exec($conexao, $sql2);
               $total = pg_num_rows($dados) + pg_num_rows($dados1);
               $registros = 10;
               $numPaginas = ceil($total/$registros);
               $inicio = ($registros*$pagina)-$registros;
            
               $cmd = "SELECT DISTINCT al.matricula, al.nome as nome, cs.nome as curso, cs.sigla as sigla FROM aluno al, participa pr, grupo gr, projeto pj, curso cs
               WHERE al.matricula = pr.matricula AND pr.id_grupo = gr.id AND gr.num_proj = pj.numero AND pj.num_curso = cs.numero ORDER BY cs.nome LIMIT $registros OFFSET $inicio";
               $dados = pg_exec($conexao, $cmd);
               $linha=pg_fetch_array($dados);
               $linha1=pg_fetch_array($dados1);
               
               if($total > 0) {
          ?>
               
               <div class="row marketing">
                    <div id="list" class="row">
                         <div class="table-responsive col-md-12">
                              <table class="table table-striped" cellspacing="0" cellpadding="0">
                                   <thead>
                                        <tr>
                                             <th>Matrícula</th>
                                             <th>Nome</th>
                                             <th>Curso</th>
                                             <th class="actions"></th>
                                        </tr>
                                   </thead>
                                   
          <?php
                    do {
                         if ($linha != "") {
                              $matricula = substr($linha['matricula'],0,-2);
                              $sigla = substr($linha['sigla'],0,-1);
          ?>
                         <tr>
                              <td><?php echo $matricula; ?></td>
                              <td><?php echo $linha['nome']; ?></td>
                              <!-- <td><?php //echo strtoupper($linha['sexo']); ?></td>-->
                              <td><?php echo $linha['curso']; ?></td>
                              
          <?php
                              $link = "http://".$sigla.".projetointegrador.com.br/~".$matricula;
          ?>
                              
                              <td class="actions">
                                   <form action="editAluno.php" method="post">
                                        <a class="btn btn-success btn-xs" href="<?php echo $link; ?>">P. Integrador</a>
          <?php
                              if (isset($_SESSION['categoria'])) { if ($_SESSION['categoria'] == "c") { ?>
                                        <input name="matricula" id="matricula" type="hidden" value="<?php echo $matricula; ?>" />
                                        <button class='btn btn-warning btn-xs'>Editar</button>
                                        <a class='btn btn-danger btn-xs'  href='#'>Excluir</a>
          <?php } } ?>
                                   </form>
                              </td>
                         </tr>
          <?php
                         }
                    }while($linha = pg_fetch_assoc($dados));

                    do {
                         if ($linha1 != "") {
                              $matricula = substr($linha1['matricula'],0,-2);
          ?>
                         <tr>
                              <td><?php echo $matricula; ?></td>
                              <td><?php echo $linha1['nome']; ?></td>
                              <td></td>
                              <td class="actions">
                                   <form action="editAluno.php" method="post">
          <?php
                              if (isset($_SESSION['categoria'])) { if ($_SESSION['categoria'] == "c") { ?>
                                        <input name="matricula" id="matricula" type="hidden" value="<?php echo $matricula; ?>" />
                                        <button class='btn btn-warning btn-xs'>Editar</button>
                                        <a class='btn btn-danger btn-xs'  href='#'>Excluir</a>
          <?php } } ?>
                                   </form>
                              </td>
                         </tr>
          <?php
                         }
                    }while($linha1 = pg_fetch_assoc($dados1));
          ?>
                         </table>
                    </div>
               </div>
               
               <div id="bottom" class="row">
                    <div class="col-md-12">
                         
                        <ul class="pagination">
               <?php
                    for($i = 1; $i < $numPaginas + 1; $i++) {
                         echo "<li><a href='listAluno.php?pagina=$i'>".$i."</a></li>";
                    }
               ?>
                        </ul>
                    
                    </div>
               </div>
          </div>
          <?php
                    } else {
                         echo "<h3 class='text-center'>Nenhum aluno encontrado</h3>";
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