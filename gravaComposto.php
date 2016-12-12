<?php
     include 'conecta.php';
     
     $disciplina = $_POST['disciplina'];
     $projeto = $_POST['projeto'];
     $descricao = $_POST['descricao'];
     
     if ($conexao) {
          if ($disciplina != "") {
               if ($projeto != "") {
                    if ($descricao != "") {
                         $sql1 = "SELECT * FROM composto WHERE num_proj = $disciplina AND cod_disc = $projeto";
                         $dados1 = pg_exec($sql1);
                         
                         if (pg_num_rows($dados1) == 0) {
                              $sql2 = "INSERT INTO composto(num_proj, cod_disc, desc_atividade) VALUES ('$projeto', '$disciplina', '$descricao')";
                              
                              if (pg_exec($sql2)) {
                                   echo "<h3 class='text-center'>Relação inserida com sucesso.</h3>";
                              } else {
                                   echo "<h3 class='text-center'>Não foi possível gravar essa relação.</h3>";
                              }
                         } else {
                              echo "<h3 class='text-center'>Essa relação já foi cadastrada.</h3>";
                         }
                    } else {
                         echo "<h3 class='text-center'>A descrição não foi informada.</h3>";
                    }
               } else {
                    echo "<h3 class='text-center'>O projeto não foi informado.</h3>";
               }
          } else {
               echo "<h3 class='text-center'>A disciplina não foi informada.</h3>";
          }
     } else {
          echo "<h3 class='text-center'>Falha na conexão com o banco de dados.</h3>";
     }
     
     echo "<link href='css/bootstrap.min.css' rel='stylesheet'><link href='css/style.css' rel='stylesheet'><div class='container droppedHover text-center'>
     <div class='form-group'><div class='col-md-12'><a href='cadComposto.php' class='btn btn-lg btn-primary'>Voltar</a></div></div></div>";
     
     pg_close($conexao);
?>