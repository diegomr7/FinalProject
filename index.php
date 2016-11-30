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
                                             <button id="enviar" name="enviar" class="btn btn-lg btn-primary btn-block" onclick="return validaLogin()">Enviar</button>
                                        </div>
                                   </div>
                                  
                              </fieldset>
                         </form>
                    </div>
               </div>
          </div>
     </div> <!-- /.modal -->
     
     <div class="container">
          <div class="header clearfix">
               <nav>
                    <ul class="nav nav-pills pull-right">
                         <li role="presentation" class="active"><a href="index.php">Home</a></li>
                         <li role="presentation">
                              <a href="#" data-toggle="dropdown" class="dropdown-toggle">Listar</a>
                              <ul class="dropdown-menu">
                                   <li><a href="listAluno.php">Aluno</a></li>
                                   <?php session_start(); if (isset($_SESSION['categoria'])) { if ($_SESSION['categoria'] == "c") { ?>
                                   <li><a href="listUser.php">Usuário</a></li>
                                   <li><a href="listCurso.php">Curso</a></li>
                                   <li><a href="listDisciplina.php">Disciplina</a></li>
                                   <?php } } ?>
                              </ul>
                         </li>
                         <?php if (isset($_SESSION['categoria'])) { if ($_SESSION['categoria'] == "c") { ?>
                         <li role="presentation">
                              <a href="#" data-toggle="dropdown" class="dropdown-toggle">Cadastro</a>
                              <ul class="dropdown-menu">
                                   <li><a href="cadAluno.php">Aluno</a></li>
                                   <li><a href="cadCurso.php">Curso</a></li>
                                   <li><a href="cadDisciplina.php">Disciplina</a></li>
                                   <li><a href="cadGrupo.php">Grupo</a></li>
                                   <li><a href="cadProjeto.php">Projeto</a></li>
                                   <li><a href="cadUser.php">Usuário</a></li>
                              </ul>
                         </li>
                         <li role="presentation">
                              <a href="#" data-toggle="dropdown" class="dropdown-toggle">Relatório</a>
                              <ul class="dropdown-menu">
                                   <li><a href="cadAluno.php">Aluno</a></li>
                                   <li><a href="cadUser.php">Usuário</a></li>
                              </ul>
                         </li>
                         <?php } }
                              if (isset($_SESSION['categoria'])) { if ($_SESSION['categoria'] == "p") { ?>
                         <li role="presentation"><a href="cadNotas.php">Notas</a></li>
                         <?php } } ?>
                         <li role="presentation">
                              <?php if (empty($_SESSION['login'])) { echo "<a href='#' data-toggle='modal' data-target='#delete-modal'>Login</a>"; } else { echo "<a href='#' data-toggle='dropdown' class='dropdown-toggle'>".$_SESSION['login']; ?></a>
                              <ul class="dropdown-menu">
                                   <li><a href="perfil.php">Perfil</a></li>
                                   <li><a href="logout.php">Logout</a></li>
                              </ul>
                              <?php } ?>
                         </li>
                    </ul>
               </nav>
               <h3 class="text-muted">Final Project</h3>
          </div>
  
          <div class="jumbotron">
               <!-- Aqui agente fala alguma coisa sobre o trabalho no geral -->
          </div>
  
          <div class="row marketing">
               <div class="col-lg-6">
                    <!-- Aqui agente fala coisas específicas sobre uma parte do trabalho para dar destaque -->
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