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
               
               $sql = "SELECT * FROM grupo";
               $dados = pg_exec($conexao, $sql);
               $linha = pg_fetch_array($dados);
               
               if (pg_num_rows($dados) > 0) {
          ?>
          <div class="row marketing">
               <div id="list" class="row">
                    <div class="table-responsive col-md-12">
                         <table class="table table-striped" cellspacing="0" cellpadding="0">
                              <thead>
                                   <tr>
                                        <th>Matrícula</th>
                                        <th>Nome</th>
                                        <th>Sexo</th>
                                        <th class="actions"></th>
                                   </tr>
                              </thead>
                              <tbody>
                                   
                              </tbody>
                         </table>
                    </div>
               </div>
          </div>
          <?php
               } else {
                    echo "<h3 class='text-center'>Nenhum grupo encontrado</h3>";
               }
          ?>
          <footer class="footer">
               <p>&copy; 2016 Dav, Inc.</p>
          </footer>

     </div>
     
     <script src="js/jquery.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/funcoes.js"></script>
</body>
</html>