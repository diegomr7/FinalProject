<?php
    include 'conecta.php';
    
    if ($conexao) {
        $login=$_POST['login'];
        $senha=$_POST['senha'];
        $confirmacao=$_POST['confirmacao'];
        $nome=$_POST['nome'];
        $categoria=$_POST['categoria'];
        $situacao=$_POST['situacao'];
        
        $sql1="SELECT * FROM usuario WHERE login='$login'";
        $result1=pg_exec($conexao, $sql1);
        $sql2="INSERT INTO usuario VALUES ('".$login."', '".md5($senha)."', '".$nome."', '".$categoria."', '".$situacao."')";
        
        if ($login != ""){
            if ($senha != "") {
                if ($senha == $confirmacao) {
                    if ($nome != "") {
                        if ($categoria != "") {
                            if ($situacao != "") {
                                if (pg_num_rows($result1) == 0) {
                                    
                                    pg_exec($conexao, $sql2);
                                    
                                    echo "<h3 class='text-center'>Cadastro realizado com sucesso!</h3>";
                                } else {
                                    echo "<h3 class='text-center'>Já exite um usuário cadastrado com esse login.</h3>";
                                }
                            } else {
                                echo "<h3 class='text-center'>A situação não foi informada.</h3>";
                            }
                        } else {
                            echo "<h3 class='text-center'>A categoria não foi informada.</h3>";
                        }
                    } else {
                        echo "<h3 class='text-center'>O nome não foi informado.</h3>";
                    }
                } else {
                    echo "<h3 class='text-center'>As senhas não conferem.</h3>";
                }
            } else {
                echo "<h3 class='text-center'>A senha não foi informada.</h3>";
            }
        } else {
            echo "<h3 class='text-center'>O login não foi informado.</h3>";
        }
    } else {
        echo "<h3 class='text-center>Falha na conexão com o banco de dados.</h3>";
    }
    
    echo "<link href='css/bootstrap.min.css' rel='stylesheet'><link href='css/style.css' rel='stylesheet'><div class='container droppedHover text-center'>
    <div class='form-group'><div class='col-md-12'><a href='cadUser.php' class='btn btn-lg btn-primary'>Voltar</a></div></div></div>";
    
    pg_close($conexao);
?>