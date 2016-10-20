<?php
    include 'conecta.php';
    
    if ($conexao) {
        $codigo=$_POST['codigo'];
        $nome=$_POST['nome'];
        $ch=$_POST['ch'];
        
        if ($codigo != "") {
            if ($nome != "") {
                if ($ch != "") {
                    $sql1="SELECT * FROM disciplina WHERE codigo='$codigo'";
                    $result1=pg_exec($conexao, $sql1);
                    
                    if (pg_num_rows($result1) == 0) {
                        $sql2="INSERT INTO disciplina VALUES ('".$codigo."', '".$nome."', '".$nome."')";
                        pg_exec($conexao, $sql2);
                        
                        echo "<h3 class='text-center'>Cadastro realizado com sucesso!</h3>";
                    } else {
                        echo "<h3 class='text-center'>Já existe uma disciplina cadastrada com esse código.</h3>";
                    }
                } else {
                    echo "<h3 class='text-center'>A carga horária não foi informada.</h3>";
                }
            } else {
                echo "<h3 class='text-center'>O nome não foi informado.</h3>";
            }
        } else {
            echo "<h3 class='text-center'>O código não foi informado.</h3>";
        }
    } else {
        echo "<h3 class='text-center'>Falha na conexão com o banco de dados.</h3>";
    }
    
    echo "<link href='css/bootstrap.min.css' rel='stylesheet'><link href='css/style.css' rel='stylesheet'><div class='container droppedHover text-center'>
    <div class='form-group'><div class='col-md-12'><a href='cadDisciplina.php' class='btn btn-lg btn-primary'>Voltar</a></div></div></div>";
    
    pg_close($conexao);
?>