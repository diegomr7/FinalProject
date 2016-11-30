<?php
     include 'conecta.php';
     
     $grupo = $_POST['grupo'];
     $erro = 0;
     
     if ($conexao) {
          if (isset($_POST['nota1']) && $_POST['nota1'] != "") {
               $nota1 = $_POST['nota1'];
               $matricula1 = $_POST['matricula1'];
               $sql = "UPDATE participa SET nota = '$nota1' WHERE matricula = '$matricula1' AND id_grupo = '$grupo'";
               
               if (pg_exec($sql)) {
                    
               } else {
                    $erro1 = 1;
               }
          }
          if (isset($_POST['nota2']) && $_POST['nota2'] != "") {
               $nota2 = $_POST['nota2'];
               $matricula2 = $_POST['matricula2'];
               $sql = "UPDATE participa SET nota = '$nota2' WHERE matricula = '$matricula2' AND id_grupo = '$grupo'";
               
               if (pg_exec($sql)) {
                    echo "<h3 class='text-center'>Nota do aluno 2 cadastrado com sucesso.</h3>";
               } else {
                    $erro2 = 1;
               }
          }
          if (isset($_POST['nota3']) && $_POST['nota3'] != "") {
               $nota3 = $_POST['nota3'];
               $matricula3 = $_POST['matricula3'];
               $sql = "UPDATE participa SET nota = '$nota3' WHERE matricula = '$matricula3' AND id_grupo = '$grupo'";
               
               if (pg_exec($sql)) {
                    echo "<h3 class='text-center'>Nota do aluno 3 cadastrado com sucesso.</h3>";
               } else {
                    $erro3 = 1;
               }
          }
          if (isset($_POST['nota4']) && $_POST['nota4'] != "") {
               $nota4 = $_POST['nota4'];
               $matricula4 = $_POST['matricula4'];
               $sql = "UPDATE participa SET nota = '$nota4' WHERE matricula = '$matricula4' AND id_grupo = '$grupo'";
               
               if (pg_exec($sql)) {
                    echo "<h3 class='text-center'>Nota do aluno 4 cadastrado com sucesso.</h3>";
               } else {
                    $erro4 = 1;
               }
          }
          
          if (isset($erro1) && $erro1 == 1) {
               echo "<h3 class='text-center'>A nota do aluno 1 não pode ser cadastrada.</h3>";
          } elseif (isset($erro2) && $erro1 == 1) {
               echo "<h3 class='text-center'>A nota do aluno 2 não pode ser cadastrada.</h3>";
          } elseif (isset($erro3) && $erro1 == 1) {
               echo "<h3 class='text-center'>A nota do aluno 3 não pode ser cadastrada.</h3>";
          } elseif (isset($erro4) && $erro1 == 1) {
               echo "<h3 class='text-center'>A nota do aluno 4 não pode ser cadastrada.</h3>";
          }
     } else {
          echo "<h3 class='text-center'>Falha na conexão com o banco de dados.</h3>";
     }
     
     echo "<link href='css/bootstrap.min.css' rel='stylesheet'><link href='css/style.css' rel='stylesheet'><div class='container droppedHover text-center'>
     <div class='form-group'><div class='col-md-12'><a href='cadNotas.php' class='btn btn-lg btn-primary'>Voltar</a></div></div></div>";
     
     pg_close($conexao);
?>