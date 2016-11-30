<?php
     include 'conecta.php';
     
     $id = $_POST["id"];
     
     $sql = "SELECT * FROM grupo WHERE num_proj = '$id'";
     $totalBusca = pg_exec($sql);
     
     echo "<option>Selecione...</option>\n";
     
     while( $linha = pg_fetch_assoc($totalBusca) ){
          echo "<option value='".$linha["id"]."'>".htmlentities($linha["nome"])."</option>\n";
     }
?>