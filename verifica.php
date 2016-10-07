<?php
    session_start();
     
    if (empty($_SESSION['senha'])) {
        header('Location: login.html');
        exit();
    }
?>