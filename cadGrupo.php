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
     
     <script type="text/javascript" src="js/funcoes.js"></script>
     
</head>
<body>     
     <div class="container">
          <?php
               include 'menu.php';
          ?>
          
          <div class="row marketing">
               <div class="col-lg-12">
                    <form name="form1" id="form1" class="form-horizontal" action="gravaGrupo.php" method="post">
                         <fieldset>
                      
                              <legend class="text-center">Cadastro de grupo</legend>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="id">Id:</label>  
                                   <div class="col-md-4">
                                        <input id="id" name="id" type="number" placeholder="Id do grupo..." class="form-control input-md">
                                   </div>
                              </div>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="nome">Nome:</label>  
                                   <div class="col-md-6">
                                        <input id="nome" name="nome" type="text" placeholder="Nome do grupo..." class="form-control input-md">
                                   </div>
                              </div>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="">Integrantes:</label>
                                   <div class="col-md-6">
                                        <div class="input-group">
                                             <input id="integ01" name="integ01" class="form-control" placeholder="Nome do integrante..." type="text">
                                             <span class="input-group-btn">
                                                  <a class="btn btn-primary" href='' data-toggle='modal' data-target='#busca1'>
                                                       <span class="glyphicon glyphicon-search"></span>
                                                  </a>
                                             </span>
                                        </div>
                                        <div class="input-group">
                                             <input id="integ02" name="integ02" class="form-control" placeholder="Nome do integrante..." type="text">
                                             <span class="input-group-btn">
                                                  <a class="btn btn-primary" href='' data-toggle='modal' data-target='#busca2'>
                                                       <span class="glyphicon glyphicon-search"></span>
                                                  </a>
                                             </span>
                                        </div>
                                        <div class="input-group">
                                             <input id="integ03" name="integ03" class="form-control" placeholder="Nome do integrante..." type="text">
                                             <span class="input-group-btn">
                                                  <a class="btn btn-primary" href='' data-toggle='modal' data-target='#busca3'>
                                                       <span class="glyphicon glyphicon-search"></span>
                                                  </a>
                                             </span>
                                        </div>
                                        <div class="input-group">
                                             <input id="integ04" name="integ04" class="form-control" placeholder="Nome do integrante..." type="text">
                                             <span class="input-group-btn">
                                                  <a class="btn btn-primary" href='' data-toggle='modal' data-target='#busca4'>
                                                       <span class="glyphicon glyphicon-search"></span>
                                                  </a>
                                             </span>
                                        </div>
                                   </div>
                              </div>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="projeto">Projeto:</label>
                                   <div class="col-md-6">
                                        <select id="projeto" name="projeto" class="form-control">
                                             <?php
                                                  include 'conecta.php';
                                                  
                                                  $sql="SELECT * FROM projeto";
                                                  $dados=pg_exec($conexao, $sql);
                                                  $linha=pg_fetch_array($dados);
                                                  $total = pg_num_rows($dados);
                                                  
                                                  if($total > 0) {
                                                       do {
                                                            echo "<option value='".$linha['numero']."'>".$linha['tema']."</option>";
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