<?php
     include "conecta.php";
     
     $valor = $_GET['valor'];
     $id = $_GET['id'];
     $sql1="SELECT * FROM aluno WHERE nome LIKE '%$valor%' OR matricula LIKE '%$valor%'";
     $dados=pg_exec($conexao, $sql1);
     $i=0;

     echo "<table class='table table-striped' cellspacing='0' cellpadding='0'><thead><tr><th>Matrícula</th><th>Nome</th><th class='actions'></th></tr></thead><tbody>";

     while ($pesquisa = pg_fetch_array($dados)) {
          $i=$i+1;
          echo "<tr><th>".$pesquisa['matricula']."</th><th>".$pesquisa['nome']."</th><th><form><input type='hidden' id='matricula".$id.$i."' name='matricula".$i."' value='".$pesquisa['matricula']."' />
          <button class='btn btn-primary btn-xs' onClick='return adciona(".$i.", ".$id.");'>Selecionar</button></th></form></tr>";
     }
     
     echo "</tbody></table>";
     header("Content-Type: text/html; charset=utf-8",true);
?>