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
                    <form class="form-horizontal" action="atualizaUser.php" method="post">
                         <fieldset>
                      
                              <legend class="text-center">Alterar dados cadastrais</legend>
                              
                              <div class="form-group">
                                  <label class="col-md-4 control-label" for="login">Login:</label>  
                                  <div class="col-md-6">
                                      <input id="login" name="login" type="text" disabled value="<?php echo $_SESSION['login'] ?>" class="form-control input-md">
                                  </div>
                              </div>
                              
                              <div class="form-group">
                                  <label class="col-md-4 control-label" for="nome">Nome:</label>  
                                  <div class="col-md-6">
                                      <input id="nome" name="nome" type="text" value="<?php echo $_SESSION['nome'] ?>" class="form-control input-md">
                                  </div>
                              </div>
                              
                              <?php if (isset($_SESSION['categoria'])) { if ($_SESSION['categoria'] == "c") { ?>
                              <div class="form-group">
                                  <label class="col-md-4 control-label" for="categoria">Categoria:</label>
                                  <div class="col-md-6">
                                      <select id="categoria" name="categoria" class="form-control">
                                          <option value="">Selecione uma opção...</option>
                                          <option value="c">Coordenador</option>
                                          <option value="g">Gerente do PI</option>
                                          <option value="p">Professor</option>
                                      </select>
                                  </div>
                              </div>
                              <?php } } ?>
                              
                              <div class="form-group">
                                  <label class="col-md-4 control-label" for="situacao">Situação:</label>
                                  <div class="col-md-6"> 
                                      <label class="radio-inline" for="situacao-0">
                                          <input type="radio" name="situacao" id="situacao-0" value="a" checked="checked">
                                          Ativo
                                      </label> 
                                      <label class="radio-inline" for="situacao-1">
                                          <input type="radio" name="situacao" id="situacao-1" value="i">
                                          Inativo
                                      </label>
                                  </div>
                              </div>
                              
                              <div class="form-group text-center">
                                   <div class="col-md-12">
                                        <input type="submit" id="salvar" name="salvar" class="btn btn-success" value="Enviar"></input>
                                        <a href="perfil.php" class="btn btn-danger">Voltar</a>
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