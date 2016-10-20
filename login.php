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
                if ($consulta['situacao'] == "a") {
                    $_SESSION['login'] = $login;
                    $_SESSION['nome'] = $consulta['nome'];
                    $_SESSION['categoria'] = $consulta['categoria'];
                    $_SESSION['situacao'] = $consulta['situacao'];
                    header('location:index.php');
                } else {
                    unset ($_SESSION['login']);
                    unset ($_SESSION['senha']);
                    echo "<h3 class='text-center'>O usuário não está ativo.</h3>";
                }
            } else {
                unset ($_SESSION['login']);
                unset ($_SESSION['senha']);
                echo "<h3 class='text-center'>Login ou senha inválidos.</h3>";
            }
        } else {
            echo "<h3 class='text-center'>Dados de acesso não informados.</h3>";
        }
    } else {
        echo "<h3 class='text-center>Falha na conexão com o banco de dados!</h3>";
    }
    
    echo "<link href='css/bootstrap.min.css' rel='stylesheet'><link href='css/style.css' rel='stylesheet'><div class='container droppedHover text-center'>
    <div class='form-group'><div class='col-md-12'><a href='index.php' class='btn btn-lg btn-primary'>Voltar</a></div></div></div>";
    
    pg_close($conexao);
?>
