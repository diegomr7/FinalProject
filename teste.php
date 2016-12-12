<!DOCTYPE html>
<html lang="pt-br">
<head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>CRUD com Bootstrap 3</title>
    
     <link href="css/bootstrap.min.css" rel="stylesheet">
     <link href="css/style.css" rel="stylesheet">
</head>
<body>
     <div class="header clearfix">
          <nav class="nav nav-pills pull-right">
               <div class="container-fluid">
                    <div class="navbar-header">
                         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                              <span class="sr-only">Toggle navigation</span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                         </button>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                         <ul class="nav nav-pills pull-right">
               <li role="presentation" <?php $pos = strripos($PATH, "index"); if ($pos !== false) { echo "class='active'"; } ?>><a href="index.php">Home</a></li>
               <li role="presentation" <?php $pos = strripos($PATH, "list"); $pos1 = strripos($PATH, "edit"); if ($pos !== false || $pos1 !== false && $PATH !== "editarPerfil.php") { echo "class='active'"; } ?> >
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">Listar</a>
                    <ul class="dropdown-menu">
                         <li><a href="listAluno.php">Aluno</a></li>
                         <?php if (isset($_SESSION['categoria'])) { if ($_SESSION['categoria'] == "c" || $_SESSION['categoria'] == "g") { ?>
                         <li><a href="listCurso.php">Curso</a></li>
                         <li><a href="listDisciplina.php">Disciplina</a></li>
                         <li><a href="listGrupo.php">Grupo</a></li>
                         <li><a href="listProjeto.php">Projeto</a></li>
                         <?php } } if (isset($_SESSION['categoria'])) { if ($_SESSION['categoria'] == "c") { ?>
                         <li><a href="listUser.php">Usuário</a></li>
                         <?php } } ?>
                    </ul>
               </li>
               <?php if (isset($_SESSION['categoria'])) { if ($_SESSION['categoria'] == "c") { ?>
               <li role="presentation" <?php $pos = strripos($PATH, "cad"); if ($pos !== false) { echo "class='active'"; } ?>>
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
               <li role="presentation" <?php $pos = strripos($PATH, "relat"); if ($pos !== false) { echo "class='active'"; } ?>>
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">Relatório</a>
                    <ul class="dropdown-menu">
                         <li><a href="cadAluno.php">Aluno</a></li>
                         <li><a href="cadUser.php">Usuário</a></li>
                    </ul>
               </li>
               <?php } }
                    if (isset($_SESSION['categoria'])) { ?>
               <li role="presentation" <?php $pos = strripos($PATH, "notas"); if ($pos !== false) { echo "class='active'"; } ?>><a href="cadNotas.php">Notas</a></li>
               <?php } ?>
               <li role="presentation" <?php $pos = strripos($PATH, "perfil"); if ($pos !== false || $PATH == "alterarSenha.php") { echo "class='active'"; } ?>>
                    <?php if (empty($_SESSION['login'])) { echo "<a href='' data-toggle='modal' data-target='#login-modal'>Login</a>"; } else { echo "<a href='#' data-toggle='dropdown' class='dropdown-toggle'>".$_SESSION['login']; ?></a>
                    <ul class="dropdown-menu">
                         <li><a href="perfil.php">Perfil</a></li>
                         <li><a href="logout.php">Logout</a></li>
                    </ul>
                    <?php } ?>
               </li>
          </ul>
                    </div>
               </div>
          </nav>
          <h3 class="text-muted">Final Project</h3>
     </div>
     <script src="js/jquery.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
</body>
</html>
