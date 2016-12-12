<?php
     include 'conecta.php';
     
     $id = $_POST["id"];
     
     $sql = "SELECT DISTINCT al.matricula, al.nome FROM curso cr, projeto pj, grupo gr, participa pr, aluno al WHERE cr.numero = pj.num_curso AND pj.numero = gr.num_proj
     AND gr.id = pr.id_grupo AND pr.matricula = al.matricula AND cr.numero = '$id'";
     $totalBusca = pg_exec($sql);
     
     echo "<option>Selecione...</option>\n";
     
     while( $linha = pg_fetch_assoc($totalBusca) ){
          echo "<option value='".trim($linha["matricula"])."'>".htmlentities($linha["nome"])."</option>\n";
     }
?>