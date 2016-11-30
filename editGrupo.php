<?php
     include 'verifica.php';
     include 'conecta.php';
     
     $ArrPATH = explode("/",$_SERVER['SCRIPT_NAME']);
     $PATH = $ArrPATH[count($ArrPATH)-1];
     
     $id=$_POST['id'];
     $sql1="SELECT * FROM grupo WHERE id = '$id'";
     $dados1=pg_exec($conexao, $sql1);
     $linha1=pg_fetch_array($dados1);
     $sql2="SELECT matricula FROM participa WHERE id_grupo = '$id'";
     $dados2=pg_exec($conexao, $sql2);
     $linha2=pg_fetch_array($dados2);
     

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
     
     <script type="text/javascript" src="js/funcoes.js"></script>
     
</head>
<body>     
     <div class="container">
          <?php
               include 'menu.php';
          ?>
          
          <div class="row marketing">
               <div class="col-lg-12">
                    <form name="form1" id="form1" class="form-horizontal" action="atualizaGrupo.php" method="post">
                         <fieldset>
                      
                              <legend class="text-center">Editar grupo</legend>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="id">Id:</label>  
                                   <div class="col-md-4">
                                        <input id="id" name="id" type="number" placeholder="Id do grupo..." class="form-control input-md" value="<?php echo $linha1['id']; ?>" disabled>
                                   </div>
                              </div>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="nome">Nome:</label>  
                                   <div class="col-md-6">
                                        <input id="nome" name="nome" type="text" placeholder="Nome do grupo..." class="form-control input-md" value="<?php echo $linha1['nome']; ?>">
                                   </div>
                              </div>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="">Integrantes:</label>
                                   <div class="col-md-6">
          <?php
               $i = "1";
               do {
          ?>
                                        <div class="input-group">
                                             <input id="integ0<?php echo $i ?>" name="integ0<?php echo $i ?>" class="form-control" placeholder="Nome do integrante..." type="text" value="<?php echo $linha2['matricula']; ?>">
                                             <span class="input-group-btn">
                                                  <a class="btn btn-primary" href='' data-toggle='modal' data-target='#busca<?php echo $i ?>'>
                                                       <span class="glyphicon glyphicon-search"></span>
                                                  </a>
                                             </span>
                                        </div>
          <?php
                    $i++;
               } while ($linha2 = pg_fetch_assoc($dados2));
          ?>
                                   </div>
                              </div>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="projeto">Projeto:</label>
                                   <div class="col-md-6">
                                        <select id="projeto" name="projeto" class="form-control">
                                             <?php
                                                  include 'conecta.php';
                                                  
                                                  $sql3="SELECT * FROM projeto";
                                                  $sql4="SELECT * FROM projeto WHERE numero = '".$linha1['num_proj']."'";
                                                  $dados3=pg_exec($conexao, $sql3);
                                                  $dados4=pg_exec($conexao, $sql4);
                                                  $linha3=pg_fetch_array($dados3);
                                                  $linha4=pg_fetch_array($dados4);
                                                  $total = pg_num_rows($dados3);
                                                  
                                                  if($total > 0) {
                                                       echo "<option value='".$linha4['numero']."'>".$linha4['tema']."</option>";
                                                       do {
                                                            echo "<option value='".$linha3['numero']."'>".$linha3['tema']."</option>";
                                                       }while($linha3 = pg_fetch_assoc($dados3));
                                                  }
                                             ?>
                                        </select>
                                   </div>
                              </div>
                              
                              <div class="form-group text-center">
                                   <div class="col-md-12">
                                        <input name="id" id="id" type="hidden" value="<?php echo $linha1['id']; ?>" />
                                        <input type="submit" id="salvar" name="salvar" class="btn btn-success" value="Enviar"></input>
                                        <a href='listGrupo.php' class='btn btn-danger'>Voltar</a>
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
     
     <!-- Modal -->
     <div class="modal fade" id="busca1" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
          <div class="modal-dialog" role="document">
               <div class="modal-content">
                    <div class="modal-body">
                         <div id="top" class="row">
                              <div class="col-sm-3">
                                   <h2>Alunos</h2>
                              </div>
                              <div class="col-sm-12">
                                   <form action="" method="get" class="col-sm-12">
                                        <div class="form-group">
                                             <div class="col-md-6">
                                                  <input type="text" name="busca" class="form-control" id="busca" onkeyup="buscar(this.value, 1);" />
                                             </div>
                                        </div>
                                   </form>
                                   <div id="resultado1"></div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <div class="modal fade" id="busca2" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
          <div class="modal-dialog" role="document">
               <div class="modal-content">
                    <div class="modal-body">
                         <div id="top" class="row">
                              <div class="col-sm-3">
                                   <h2>Alunos</h2>
                              </div>
                              <div class="col-sm-12">
                                   <form action="" method="get" class="col-sm-12">
                                        <div class="form-group">
                                             <div class="col-md-6">
                                                  <input type="text" name="busca" class="form-control" id="busca" onkeyup="buscar(this.value, 2);" />
                                             </div>
                                        </div>
                                   </form>
                                   <div id="resultado2"></div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <div class="modal fade" id="busca3" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
          <div class="modal-dialog" role="document">
               <div class="modal-content">
                    <div class="modal-body">
                         <div id="top" class="row">
                              <div class="col-sm-3">
                                   <h2>Alunos</h2>
                              </div>
                              <div class="col-sm-12">
                                   <form action="" method="get" class="col-sm-12">
                                        <div class="form-group">
                                             <div class="col-md-6">
                                                  <input type="text" name="busca" class="form-control" id="busca" onkeyup="buscar(this.value, 3);" />
                                             </div>
                                        </div>
                                   </form>
                                   <div id="resultado3"></div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <div class="modal fade" id="busca4" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
          <div class="modal-dialog" role="document">
               <div class="modal-content">
                    <div class="modal-body">
                         <div id="top" class="row">
                              <div class="col-sm-3">
                                   <h2>Alunos</h2>
                              </div>
                              <div class="col-sm-12">
                                   <form action="" method="get" class="col-sm-12">
                                        <div class="form-group">
                                             <div class="col-md-6">
                                                  <input type="text" name="busca" class="form-control" id="busca" onkeyup="buscar(this.value, 4);" />
                                             </div>
                                        </div>
                                   </form>
                                   <div id="resultado4"></div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div> <!-- /.modal -->
     
     <script src="js/jquery.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
</body>
</html>