<?php
    include 'verifica.php';
    include 'conecta.php';
    
    if ($conexao) {
        $login=$_SESSION['login'];
        $nome=$_POST['nome'];
        $categoria=$_POST['categoria'];
        $situacao=$_POST['situacao'];
        
        $sql1="UPDATE usuario SET nome = '".$nome."', categoria = '".$categoria."', situacao = '".$situacao."' WHERE login = '".$login."'";
        
        if ($login != "") {
            if ($nome != "") {
                if ($categoria != "") {
                    if ($situacao != "") {
                        pg_exec($conexao, $sql1);
                        
                        $sql2="SELECT * FROM usuario WHERE login='$login'";
                        $result=pg_exec($conexao, $sql2);
                        $consulta=pg_fetch_array($result);
                        
                        $_SESSION['nome'] = $consulta['nome'];
                        $_SESSION['categoria'] = $consulta['categoria'];
                        $_SESSION['situacao'] = $consulta['situacao'];
                        
                        echo "<h3 class='text-center'>Atualização realizada com sucesso!</h3>";
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
            echo "<h3 class='text-center'>O login não foi informado.</h3>";
        }
    } else {
        echo "<h3 class='text-center>Falha na conexão com o banco de dados.</h3>";
    }
    
    echo "<link href='css/bootstrap.min.css' rel='stylesheet'><link href='css/style.css' rel='stylesheet'><div class='container droppedHover text-center'>
    <div class='form-group'><div class='col-md-12'><a href='perfil.php' class='btn btn-lg btn-primary'>Voltar</a></div></div></div>";
    
    pg_close($conexao);
?>