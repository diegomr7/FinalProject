<?php
     include 'conecta.php';
     
     $id = $_POST["id"];
     
     $sql = "SELECT DISTINCT al.nome, al.matricula FROM aluno al, participa pr WHERE pr.id_grupo = '$id' AND al.matricula = pr.matricula";
     $totalBusca = pg_exec($sql);
     
     if (pg_num_rows($totalBusca) > 0) {
          echo "<div class='table-responsive col-md-6'><table id='membros' class='table table-striped' cellspacing='0' cellpadding='0'>";
          echo "<thead><tr><th>Nome</th><th>Nota</th></tr></thead><tbody>";
          
          $i = 1;
          
          while( $linha = pg_fetch_assoc($totalBusca) ){
               echo "<tr><td class='col-md-6'>".htmlentities($linha["nome"])."</td><td><div class='form-group'><div class='col-md-6'>
               <input id='nota".$i."' name='nota".$i."' type='text' class='form-control input-md'>
               <input id='matricula".$i."' name='matricula".$i."' type='hidden' value='".trim($linha["matricula"])."'></div></div></td></tr>";
               $i++;
          }
          echo "<tbody></table></div>";
     } else {
          echo "<h3 class='text-center'>Nenhum aluno cadastrado nesse Grupo!</h3>";
     }
?>