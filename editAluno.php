<?php
     include 'verifica.php';
     include 'conecta.php';
     
     $ArrPATH = explode("/",$_SERVER['SCRIPT_NAME']);
     $PATH = $ArrPATH[count($ArrPATH)-1];
     
     $matricula=$_POST['matricula'];
     $sql="SELECT * FROM aluno WHERE matricula = '$matricula'";
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
                    <form class="form-horizontal" action="atualizaAluno.php" method="post">
                         <fieldset>
                      
                              <legend class="text-center">Editar aluno</legend>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="matricula">Matrícula:</label>  
                                   <div class="col-md-4">
                                        <input id="matricula" name="matricula" value="<?php echo $linha['matricula']; ?>" type="text" placeholder="Matricula..." class="form-control input-md" disabled>
                                        <input id="matricula" name="matricula" type="hidden" value="<?php echo $linha['matricula']; ?>">
                                   </div>
                              </div>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="nome">Nome Completo</label>  
                                   <div class="col-md-6">
                                        <input id="nome" name="nome" value="<?php echo $linha['nome']; ?>" type="text" placeholder="Nome completo..." class="form-control input-md">
                                   </div>
                              </div>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="sexo">Sexo</label>
                                   <div class="col-md-4"> 
                                        <label class="radio-inline" for="sexo-0">
                                             <input type="radio" name="sexo" id="sexo-0" value="f" <?php if ($linha['sexo'] == "f") { echo "checked='checked'"; } ?> >
                                             Feminino
                                        </label> 
                                        <label class="radio-inline" for="sexo-1">
                                             <input type="radio" name="sexo" id="sexo-1" value="m" <?php if ($linha['sexo'] == "m") { echo "checked='checked'"; } ?>>
                                             Masculino
                                        </label>
                                   </div>
                              </div>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="dtnasc">Data de nascimento:</label>  
                                   <div class="col-md-4">
                                        <input id="dtnasc" name="dtnasc" value="<?php echo $linha['dtnasc']; ?>" type="date" class="form-control input-md">
                                   </div>
                              </div>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="cidade">Cidade:</label>  
                                   <div class="col-md-4">
                                        <input id="cidade" name="cidade" value="<?php echo $linha['cidade']; ?>" type="text" placeholder="Cidade..." class="form-control input-md">
                                   </div>
                              </div>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="uf">UF:</label>
                                   <div class="col-md-3">
                                        <select id="uf" name="uf" class="form-control">
                                             <?php echo "<option value='".$linha['uf']."'>".strtoupper($linha['uf'])."</option>"; ?>
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
                                        <a href="listAluno.php" class="btn btn-danger">Voltar</a>
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