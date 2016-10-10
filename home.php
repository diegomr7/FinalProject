<?php
     include 'verifica.php';
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
          <div class="header clearfix">
               <nav>
                    <ul class="nav nav-pills pull-right">
                         <li role="presentation" class="active"><a href="home.php">Home</a></li>
                         <li role="presentation">
                              <a href="#" data-toggle="dropdown" class="dropdown-toggle">Cadastro</a>
                              <ul class="dropdown-menu">
                                   <li><a href="#">Aluno</a></li>
                                   <li><a href="cadUser.php">Usuário</a></li>
                              </ul>
                         </li>
                         <li role="presentation">
                              <a href="#" data-toggle="dropdown" class="dropdown-toggle"><?php echo $_SESSION['login']; ?></a>
                              <ul class="dropdown-menu">
                                   <li><a href="#">Perfil</a></li>
                                   <li><a href="logout.php">Logout</a></li>
                              </ul>
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
</body>
</html>