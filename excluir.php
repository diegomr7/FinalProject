<?php
     include 'verifica.php';
     include 'conecta.php';

     if ($conexao) {
          $id = $_GET['id'];
          $func = $_GET['func'];
          echo "<script>alert('".$_GET['id']."')</script>";
          
          if ($func == "1") {
               $sql = "DELETE FROM participa WHERE matricula='".$id."'";
               $sql1 = "DELETE FROM aluno WHERE matricula='".$id."'";
               $row = pg_exec($conexao, $sql);
               $row = pg_exec($conexao, $sql1);
          } else if ($func == "2") {
               $sql1 = "DELETE FROM participa WHERE id_grupo = '".$id."'";
               $sql2 = "DELETE FROM grupo WHERE id = '".$id."'";
               $row = pg_exec($conexao, $sql1);
               $row = pg_exec($conexao, $sql2);
          } else if ($func == "3") {
               $sql1 = "DELETE FROM composto WHERE cod_disc = '".$id."'";
               $sql2 = "DELETE FROM disciplina WHERE codigo = '".$id."'";
               $row = pg_exec($conexao, $sql1);
               $row = pg_exec($conexao, $sql2);
          } else if ($func == "4") {
               $sql1 = "DELETE FROM participa WHERE id_grupo IN (SELECT pr.id_grupo FROM projeto pj, grupo gr, participa pr WHERE pj.numero = gr.num_proj AND gr.id = pr.id_grupo AND pj.numero = '".$id."')";
               $sql2 = "DELETE FROM grupo WHERE id IN (SELECT gr.id FROM projeto pj, grupo gr WHERE pj.numero = gr.num_proj AND pj.numero = '".$id."')";
               $sql3 = "DELETE FROM projeto WHERE numero = '".$id."'";
               $row = pg_exec($conexao, $sql1);
               $row = pg_exec($conexao, $sql2);
               $row = pg_exec($conexao, $sql3);
          } else if ($func == "5") {
               $sql1 = "DELETE FROM participa WHERE id_grupo IN (SELECT pr.id_grupo FROM curso cr, projeto pj, grupo gr, participa pr WHERE cr.numero = pj.num_curso AND pj.numero = gr.num_proj AND gr.id = pr.id_grupo AND cr.numero = '".$id."')";
               $sql2 = "DELETE FROM grupo WHERE id IN (SELECT gr.id FROM curso cr, projeto pj, grupo gr WHERE cr.numero = pj.num_curso AND pj.numero = gr.num_proj AND cr.numero = '".$id."')";
               $sql3 = "DELETE FROM projeto WHERE numero IN (SELECT pj.numero FROM curso cr, projeto pj WHERE cr.numero = pj.num_curso AND cr.numero = '".$id."')";
               $sql4 = "DELETE FROM curso WHERE numero IN (SELECT numero FROM curso cr WHERE cr.numero = '".$id."')";
               $row = pg_exec($conexao, $sql1);
               $row = pg_exec($conexao, $sql2);
               $row = pg_exec($conexao, $sql3);
               $row = pg_exec($conexao, $sql4);
          } else if ($func == "6") {
               $sql1 = "DELETE FROM usuario WHERE login = '".$id."'";
               $row = pg_exec($conexao, $sql1);
          }
     } else {
          echo false;
     }
?>