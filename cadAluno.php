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
          <div class="header clearfix">
               <nav>
                    <ul class="nav nav-pills pull-right">
                         <li role="presentation"><a href="index.php">Home</a></li>
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
                         <li role="presentation" class="active">
                              <a href="#" data-toggle="dropdown" class="dropdown-toggle">Cadastro</a>
                              <ul class="dropdown-menu">
                                   <li><a href="cadAluno.php">Aluno</a></li>
                                   <li><a href="cadUser.php">Usuário</a></li>
                                   <li><a href="cadCurso.php">Curso</a></li>
                                   <li><a href="cadDisciplina.php">Disciplina</a></li>
                              </ul>
                         </li>
                         <li role="presentation">
                              <a href="#" data-toggle="dropdown" class="dropdown-toggle">Relatório</a>
                              <ul class="dropdown-menu">
                                   <li><a href="relatAluno.php">Aluno</a></li>
                                   <li><a href="relatUser.php">Usuário</a></li>
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
        
          <div class="row marketing">
               <div class="col-lg-12">
                    <form class="form-horizontal" action="gravaAluno.php" method="post">
                         <fieldset>
                      
                              <legend class="text-center">Cadastro de aluno</legend>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="matricula">Matrícula:</label>  
                                   <div class="col-md-4">
                                        <input id="matricula" name="matricula" type="text" placeholder="Matricula..." class="form-control input-md">
                                   </div>
                              </div>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="nome">Nome Completo</label>  
                                   <div class="col-md-6">
                                        <input id="nome" name="nome" type="text" placeholder="Nome completo..." class="form-control input-md">
                                   </div>
                              </div>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="sexo">Sexo</label>
                                   <div class="col-md-4"> 
                                        <label class="radio-inline" for="sexo-0">
                                             <input type="radio" name="sexo" id="sexo-0" value="f" checked="checked">
                                             Feminino
                                        </label> 
                                        <label class="radio-inline" for="sexo-1">
                                             <input type="radio" name="sexo" id="sexo-1" value="m">
                                             Masculino
                                        </label>
                                   </div>
                              </div>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="dtnasc">Data de nascimento:</label>  
                                   <div class="col-md-4">
                                        <input id="dtnasc" name="dtnasc" type="date" class="form-control input-md">
                                   </div>
                              </div>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="cidade">Cidade:</label>  
                                   <div class="col-md-4">
                                        <input id="cidade" name="cidade" type="text" placeholder="Cidade..." class="form-control input-md">
                                   </div>
                              </div>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="uf">UF:</label>
                                   <div class="col-md-3">
                                        <select id="uf" name="uf" class="form-control">
                                             <option value="">Selecione</option>
                                             <option value="ac">AC</option>
                                             <option value="al">AL</option>
                                             <option value="am">AM</option>
                                             <option value="ap">AP</option>
                                             <option value="ba">BA</option>
                                             <option value="ce">CE</option>
                                             <option value="df">DF</option>
                                             <option value="es">ES</option>
                                             <option value="go">GO</option>
                                             <option value="ma">MA</option>
                                             <option value="mg">MG</option>
                                             <option value="ms">MS</option>
                                             <option value="mt">MT</option>
                                             <option value="pa">PA</option>
                                             <option value="pb">PB</option>
                                             <option value="pe">PE</option>
                                             <option value="pi">PI</option>
                                             <option value="pr">PR</option>
                                             <option value="rj">RJ</option>
                                             <option value="rn">RN</option>
                                             <option value="ro">RO</option>
                                             <option value="rr">RR</option>
                                             <option value="rs">RS</option>
                                             <option value="sc">SC</option>
                                             <option value="se">SE</option>
                                             <option value="sp">SP</option>
                                             <option value="to">TO</option>
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
    
     <script src="js/jquery.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/funcoes.js"></script>
</body>
</html>