<?php
     include 'verifica.php';
     $ArrPATH = explode("/",$_SERVER['SCRIPT_NAME']);
     $PATH = $ArrPATH[count($ArrPATH)-1];
     $_SESSION['path'] = $PATH;
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
               include 'conecta.php';
               
               $sql2 = "SELECT * FROM curso";
               $dados2 = pg_exec($conexao, $sql2);
               $linha2 = pg_fetch_array($dados2);
          ?>
          <ul class="nav nav-tabs">
          <?php
               $i = 1;
               do {
                    if ($i == 1)  {
                         $class = "class='active'";
                    } else {
                         $class = "class=''";
                    }
                    echo "<li ".$class."><a data-toggle='tab' href='#".$linha2['numero']."'>".strtoupper($linha2['sigla'])."</a></li>";
                    
                    $i++;
               } while($linha2 = pg_fetch_assoc($dados2));
               $dados2 = pg_exec($conexao, $sql2);
               $linha2 = pg_fetch_array($dados2);
          ?>
          </ul>
          <div class="tab-content">
          <?php
               $i = 1;
               do {
                    $sql1 = "SELECT pj.numero, pj.ano, pj.semestre, pj.modulo, pj.dt_inicio, pj.dt_termino, pj.tema, pj.descricao, cr.nome
                    FROM projeto pj, curso cr WHERE pj.num_curso = cr.numero AND cr.nome = '".$linha2['nome']."'";
                    $dados1 = pg_exec($conexao, $sql1);
                    $linha1 = pg_fetch_array($dados1);
                    if ($i == 1)  {
                         $class = "class='tab-pane fade in active'";
                    } else {
                         $class = "class='tab-pane fade'";
                    }
                    
                    echo "<div id='".$linha2['numero']."' ".$class.">";
                    echo "<h3>".$linha2['nome']."</h3>";
                    
                    if(pg_num_rows($dados1) > 0) {
          ?>
                    <div class="row marketing">
                         <div id="list" class="row">
                              <div class="table-responsive col-md-12">
                                   <table class="table table-striped" cellspacing="0" cellpadding="0">
                                        <thead>
                                             <tr>
                                                  <th>Número</th>
                                                  <th>Tema</th>
                                                  <th>Ano</th>
                                                  <th>Semestre</th>
                                                  <th>Módulo</th>
                                                  <th>Inicio</th>
                                                  <th>Fim</th>
                                                  <th class="actions"></th>
                                             </tr>
                                        </thead>
                                        <tbody>
          <?php
                         do {
                              if ($linha1 != "") {
                                   $id = "id".$linha1['numero'];
          ?>
                                             <tr id="<?php echo $id; ?>">
                                                  <td><?php echo $linha1['numero']; ?></td>
                                                  <td><?php echo $linha1['tema']; ?></td>
                                                  <td><?php echo $linha1['ano']; ?></td>
                                                  <td><?php echo $linha1['semestre']; ?></td>
                                                  <td><?php echo $linha1['modulo']; ?></td>
                                                  <td><?php echo $linha1['dt_inicio']; ?></td>
                                                  <td><?php echo $linha1['dt_termino']; ?></td>
                                                  <td class="actions center">
                                                       <form action="editGrupo.php" method="post">
                                                            <input name="id" id="id" type="hidden" value="<?php echo $linha1['numero']; ?>" />
                                                            <button class='btn btn-warning btn-xs'><span class="glyphicon glyphicon-edit"></span></button>&nbsp
                                                       </form>
                                                       <button onclick="return excluir('<?php echo $linha1['numero']; ?>', '4');" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button>
                                                  </td>
                                             </tr>
          <?php
                              }
                         } while($linha1 = pg_fetch_assoc($dados1));
          ?>
                                        </tbody>
                                   </table>
                              </div>
                         </div>
                    </div>
          <?php
                    } else {
                         echo "<h3 class='text-center'>Nenhum projeto encontrada</h3>";
                    }
                    echo "</div>";
                    $i++;
               } while($linha2 = pg_fetch_assoc($dados2));
          ?>
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