<<<<<<< HEAD
<?php
    session_start();
     
    if (empty($_SESSION['login'])) {
        echo "<script>alert('Você precisa fazer login para acessar esta página.');
        location.href = 'index.php';
        </script>";
        exit();
    }
=======
<?php
    session_start();
     
    if (empty($_SESSION['login'])) {
        header('Location: login.html');
        exit();
    }
>>>>>>> 9dfcfb12ae2d9ca286488238584b6f3ef461b2a8
?>