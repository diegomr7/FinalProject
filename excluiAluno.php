<?php
     include 'conecta.php';

     if ($conexao) {
          $sql = "DELETE FROM participa WHERE matricula='".$_GET['mat']."'";
          $sql1 = "DELETE FROM aluno WHERE matricula='".$_GET['mat']."'";
          $row = pg_exec($conexao, $sql);
          $row = pg_exec($conexao, $sql1);
          echo trim($_GET['mat']);
     } else {
          echo false;
     }
?>