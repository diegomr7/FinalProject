<?php
    $host="127.0.0.1";
    $dbname="projetointegrador";
    $port="5432";
    $user="senac";
    $passowd="senac123";
    
    $conexao=pg_connect("host='$host' dbname='$dbname' port='$port' user='$user' password='$passowd'");
?>
