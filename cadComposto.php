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
                    <form class="form-horizontal" action="gravaComposto.php" method="post">
                         <fieldset>
                      
                              <legend class="text-center">Vincular projeto a uma disciplina</legend>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="disciplina">Disciplina:</label>
                                   <div class="col-md-6">
                                        <select id="disciplina" name="disciplina" class="form-control">
                                             <option value="">Selecione...</option>
                                             <?php
                                                  include 'conecta.php';
                                                  
                                                  $sql="SELECT * FROM disciplina";
                                                  $dados=pg_exec($conexao, $sql);
                                                  $linha=pg_fetch_array($dados);
                                                  $total = pg_num_rows($dados);
                                                  
                                                  if($total > 0) {
                                                       do {
                                                            echo "<option value='".$linha['codigo']."'>".$linha['nome']."</option>";
                                                       }while($linha = pg_fetch_assoc($dados));
                                                  }
                                             ?>
                                        </select>
                                   </div>
                              </div>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="curso">Projeto:</label>
                                   <div class="col-md-6">
                                        <select id="projeto" name="projeto" class="form-control">
                                             <option value="">Selecione...</option>
                                             <?php
                                                  $sql="SELECT * FROM projeto";
                                                  $dados=pg_exec($conexao, $sql);
                                                  $linha=pg_fetch_array($dados);
                                                  $total = pg_num_rows($dados);
                                                  
                                                  if($total > 0) {
                                                       do {
                                                            echo "<option value='".$linha['numero']."'>".$linha['tema']."</option>";
                                                       }while($linha = pg_fetch_assoc($dados));
                                                  }
                                             ?>
                                        </select>
                                   </div>
                              </div>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="descricao">Descrição:</label>
                                   <div class="col-md-6">                     
                                        <textarea class="form-control" id="descricao" name="descricao"></textarea>
                                   </div>
                              </div>
                              
                              <div class="form-group text-center">
                                   <div class="col-md-12">
                                        <input type="submit" id="salvar" name="salvar" class="btn btn-success" value="Enviar" onclick="return validaComposto()"></input>
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
     <script src="js/bootbox.min.js"></script>
</body>
</html>
