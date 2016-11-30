<?php
     include 'conecta.php';
     include 'verifica.php';
     
     $ArrPATH = explode("/",$_SERVER['SCRIPT_NAME']);
     $PATH = $ArrPATH[count($ArrPATH)-1];
     
     $numero=$_POST['numero'];
     $sql="SELECT * FROM curso WHERE numero = '$numero'";
     $dados=pg_exec($conexao, $sql);
     $linha=pg_fetch_array($dados);
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
                    <form class="form-horizontal" action="gravaCurso.php" method="post">
                         <fieldset>
                      
                              <legend class="text-center">Editar curso</legend>
                              
                              <div class="form-group">
                              <label class="col-md-4 control-label" for="numero">Numero:</label>  
                                   <div class="col-md-4">
                                        <input id="numero" name="numero" type="number" class="form-control input-md" value="<?php echo $linha['numero']; ?>" disabled>
                                   </div>
                              </div>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="nome">Nome:</label>  
                                   <div class="col-md-6">
                                        <input id="nome" name="nome" type="text" placeholder="Nome..." class="form-control input-md" value="<?php echo $linha['nome']; ?>">
                                   </div>
                              </div>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="sigla">Sigla:</label>  
                                   <div class="col-md-4">
                                        <input id="sigla" name="sigla" type="text" placeholder="Sigla..." class="form-control input-md" value="<?php echo strtoupper($linha['sigla']); ?>">
                                   </div>
                              </div>
                              
                              <div class="form-group text-center">
                                   <div class="col-md-12">
                                        <input type="submit" id="salvar" name="salvar" class="btn btn-success" value="Enviar"></input>
                                        <a href="listCurso.php" class="btn btn-danger">Voltar</a>
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