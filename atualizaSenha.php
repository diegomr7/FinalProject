<?php
    include 'verifica.php';
    include 'conecta.php';
    
    if ($conexao) {
        $login = $_SESSION['login'];
        $senha = $_POST['senha'];
        $novasenha = $_POST['novasenha'];
        $confirmacao= md5($_POST['confirmacao']);
        
        if ($senha != "") {
            $sql1="SELECT * FROM usuario WHERE login = '$login'";
            $result1=pg_exec($conexao, $sql1);
            $consulta = pg_fetch_array($result1);
            $senha = md5($senha);
            
            if ($consulta['senha'] == $senha) {
                if ($novasenha != "") {
                    $novasenha = md5($novasenha);
                    
                    if ($confirmacao == $novasenha) {
                        $sql2 = "UPDATE usuario SET senha = '".$novasenha."' WHERE login = '".$login."'";
                        
                        pg_exec($conexao, $sql2);
                        
                        echo "<h3 class='text-center'>Alteração de senha realizada com sucesso!</h3>";
                    } else {
                        echo "<h3 class='text-center'>As senhas não conferem.</h3>";
                    }
                } else {
                    echo "<h3 class='text-center'>A nova senha não foi informada.</h3>";
                }
            } else {
                echo "<h3 class='text-center'>A senha atual não confere.</h3>";
            }
        } else {
            echo "<h3 class='text-center'>A senha não foi informada.</h3>";
        }
    } else {
        echo "<h3 class='text-center>Falha na conexão com o banco de dados.</h3>";
    }
    
    echo "<link href='css/bootstrap.min.css' rel='stylesheet'><link href='css/style.css' rel='stylesheet'><div class='container droppedHover text-center'>
    <div class='form-group'><div class='col-md-12'><a href='perfil.php' class='btn btn-lg btn-primary'>Voltar</a></div></div></div>";
    
    pg_close($conexao);
?>