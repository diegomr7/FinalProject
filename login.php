<?php
    include 'conecta.php';
    
    if ($conexao) {
        session_start();
        
        $login=$_POST['login'];
        $senha=md5($_POST['senha']);
        $sql="SELECT * FROM usuario WHERE login='$login' AND senha='$senha'";
        $result=pg_exec($conexao, $sql);
        $consulta = pg_fetch_array($result);
        
        if ($login != "" && $senha != ""){
            if (pg_num_rows($result) > 0) {
                $_SESSION['login'] = $login;
                $_SESSION['senha'] = $senha;
                header('location:index.html');
            } else {
                unset ($_SESSION['login']);
                unset ($_SESSION['senha']);
                echo "<h3 class='text-center>Falha no login.</h3>";
            }
        } else {
            echo "<h3 class='text-center'>Dados de acesso não informados.</h3>";
        }
    } else {
        echo "<h3 class='text-center>Falha na conexão com o banco de dados!</h3>";
    }
    
    echo "<link href='css/bootstrap.min.css' rel='stylesheet'><div class='container droppedHover text-center'> <div class='form-group'><div class='col-md-12'><link href='css/style.css' rel='stylesheet'><a href='login.html' class='btn btn-lg btn-primary'>Voltar</a></div></div></div>"
?>