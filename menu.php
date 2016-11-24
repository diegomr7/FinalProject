<div class="header clearfix">
     <nav>
          <ul class="nav nav-pills pull-right">
               <li role="presentation" <?php $pos = strripos($PATH, "index"); if ($pos !== false) { echo "class='active'"; } ?>><a href="index.php">Home</a></li>
               <li role="presentation" <?php $pos = strripos($PATH, "list"); $pos1 = strripos($PATH, "edit"); if ($pos !== false || $pos1 !== false) { echo "class='active'"; } ?> >
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
     </nav>
     <h3 class="text-muted">Final Project</h3>
</div>