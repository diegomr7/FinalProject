<?php
    session_start();
     
    if (empty($_SESSION['login'])) {
        echo "<script>alert('Você precisa fazer login para acessar esta página.');
        location.href = 'index.php';
        </script>";
        exit();
    }
?>