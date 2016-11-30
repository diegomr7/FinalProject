<?php
    session_start();
     
    if (empty($_SESSION['login'])) {
        echo "<link href='css/bootstrap.min.css' rel='stylesheet'>
        <script src='js/jquery.min.js'></script>
        <script src='js/bootstrap.min.js'></script>
        <script src='js/bootbox.min.js'></script>
        <script src='js/funcoes.js'></script>
        <script>alerta();</script>";
        exit();
    }
?>