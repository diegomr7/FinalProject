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
                <form nome="dados" class="form-horizontal">
                    <fieldset>
                        
                        <legend class="text-center">Informações do usuário <?php echo $_SESSION['login']; ?></legend>
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="login">Login:</label>  
                            <div class="col-md-6">
                                <input id="login" name="login" type="text" class="form-control input-md" disabled value="<?php echo $_SESSION['login']; ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="nome">Nome:</label>  
                            <div class="col-md-6">
                                <input id="nome" name="nome" type="text" class="form-control input-md" disabled value="<?php echo $_SESSION['nome']; ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="categoria">Categoria:</label>
                            <div class="col-md-6">
                                <input id="nome" name="nome" type="text" class="form-control input-md" disabled value="<?php  if ($_SESSION['categoria'] == 'g' ) { echo "Gerente de TI"; } else if ($_SESSION['categoria'] == 'c' ) { echo "Coordenador"; } else if ($_SESSION['categoria'] == 'p' ) { echo "Professor"; } ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="situacao">Situação:</label>
                            <div class="col-md-6"> 
                                <input id="nome" name="nome" type="text" class="form-control input-md" disabled value="<?php if ($_SESSION['situacao'] == 'a' ) { echo "Ativo"; } else if ($_SESSION['situacao'] == 'i' ) { echo "Inativo"; } ?>">
                            </div>
                        </div>
                        
                        <div class="form-group text-center">
                            <div class="col-md-12">
                                <a href="editarPerfil.php" class="btn btn-warning">Editar <span class="glyphicon glyphicon-edit"></span></a>
                                <a href="alterarSenha.php" class="btn btn-danger">Alterar senha <span class="glyphicon glyphicon-alert"></span></a>
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