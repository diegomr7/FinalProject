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
     <!-- Modal -->
     <div class="modal fade" id="senha-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
          <div class="modal-dialog" role="document">
               <div class="modal-content">
                    <div class="modal-body">
                         <form action="atualizaSenhas.php" method="post" class="form-signin center">
                              <fieldset>
                                   <legend>Alterar senha</legend>
                                   
                                   <div class="form-group">
                                        <div class="col-md-12">
                                             <input name="senha" id="senha" type="password" placeholder="informe sua senha..." class="form-control input-md">
                                        </div>
                                   </div>
                                   
                                   <div class="form-group">
                                        <div class="col-md-12">
                                             <input name="confirmacao" id="confirmacao" type="password" placeholder="informe sua senha..." class="form-control input-md">
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
          ?>
          <div class="tab-content">
          <?php
               $sql1 = "SELECT * FROM usuario";
               $dados1 = pg_exec($conexao, $sql1);
               $linha1 = pg_fetch_array($dados1);
               
               if(pg_num_rows($dados1) > 0) {
          ?>
                    <div class="row marketing">
                         <div id="list" class="row">
                              <div class="table-responsive col-md-12">
                                   <table class="table table-striped" cellspacing="0" cellpadding="0">
                                        <thead>
                                             <tr>
                                                  <th>Login</th>
                                                  <th>Nome</th>
                                                  <th>Categoria</th>
                                                  <th>Situação</th>
                                                  <th class="actions"></th>
                                             </tr>
                                        </thead>
                                        <tbody>
          <?php
                    do {
                         if ($linha1 != "") {
                              $id = "id".$linha1['login'];
          ?>
                                             <tr id="<?php echo $id; ?>">
                                                  <td><?php echo $linha1['login']; ?></td>
                                                  <td><?php echo $linha1['nome']; ?></td>
                                                  <td><?php if ($linha1['categoria'] == "p") { echo "Professor"; } else if ($linha1['categoria'] == "g") { echo "Gerente do P.I"; } else if ($linha1['categoria'] == "c") { echo "Coordenador"; } ?></td>
                                                  <td><?php if ($linha1['situacao'] == "a") { echo "Ativo"; } else if ($linha1['situacao'] == "i") { echo "Inativo"; } ?></td>
                                                  <td class="actions center">
                                                       <form action="editUser.php" method="post">
                                                            <input name="login" id="login" type="hidden" value="<?php echo $linha1['login']; ?>" />
                                                            <button class='btn btn-warning btn-xs'><span class="glyphicon glyphicon-edit"></span></button>&nbsp
                                                       </form>
                                                       <button onclick="return excluir('<?php echo $linha1['login']; ?>', '6');" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button>&nbsp
                                                       <a href='' class='btn btn-warning btn-xs' data-toggle='modal' data-target='#senha-modal'>Alterar senha</a>
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
                    echo "<h3 class='text-center'>Nenhum curso encontrada</h3>";
               }
          ?>
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