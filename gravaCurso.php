<<<<<<< HEAD
<?php
    include 'conecta.php';
    
    if ($conexao) {
        $numero=$_POST['numero'];
        $nome=$_POST['nome'];
        $sigla=$_POST['sigla'];
        
        if ($numero != "") {
            if ($nome != "") {
                if ($sigla != "") {
                    $sql1="SELECT * FROM curso WHERE numero='$numero'";
                    $result1=pg_exec($conexao, $sql1);
                    
                    if (pg_num_rows($result1) == 0) {
                        $sql2="INSERT INTO curso VALUES ('".$numero."', '".$nome."', '".$sigla."')";
                        
                        pg_exec($conexao, $sql2);
                        
                        echo "<h3 class='text-center'>Cadastro realizado com sucesso!</h3>";
                    } else {
                        echo "<h3 class='text-center>Já existe um curso cadastrado com .</h3>";
                    }
                } else {
                    echo "<h3 class='text-center>A sigla não foi informada.</h3>";
                }
            } else {
                echo "<h3 class='text-center>O nome não foi informado.</h3>";
            }
        } else {
            echo "<h3 class='text-center>O número não foi informado.</h3>";
        }
    } else {
        echo "<h3 class='text-center>Falha na conexão com o banco de dados.</h3>";
    }
    
    echo "<link href='css/bootstrap.min.css' rel='stylesheet'><link href='css/style.css' rel='stylesheet'><div class='container droppedHover text-center'>
    <div class='form-group'><div class='col-md-12'><a href='cadCurso.php' class='btn btn-lg btn-primary'>Voltar</a></div></div></div>";
    
    pg_close($conexao);
=======
<?php
    include 'conecta.php';
    
    if ($conexao) {
        $numero=$_POST['numero'];
        $nome=$_POST['nome'];
        $sigla=$_POST['sigla'];
        
        if ($numero != "") {
            if ($nome != "") {
                if ($sigla != "") {
                    $sql1="SELECT * FROM curso WHERE numero='$numero'";
                    $result1=pg_exec($conexao, $sql1);
                    
                    if (pg_num_rows($result1) == 0) {
                        $sql2="INSERT INTO curso VALUES ('".$numero."', '".$nome."', '".$sigla."')";
                        
                        pg_exec($conexao, $sql2);
                        
                        echo "<h3 class='text-center'>Cadastro realizado com sucesso!</h3>";
                    } else {
                        echo "<h3 class='text-center>Já existe um curso cadastrado com .</h3>";
                    }
                } else {
                    echo "<h3 class='text-center>A sigla não foi informada.</h3>";
                }
            } else {
                echo "<h3 class='text-center>O nome não foi informado.</h3>";
            }
        } else {
            echo "<h3 class='text-center>O número não foi informado.</h3>";
        }
    } else {
        echo "<h3 class='text-center>Falha na conexão com o banco de dados.</h3>";
    }
    
    echo "<link href='css/bootstrap.min.css' rel='stylesheet'><link href='css/style.css' rel='stylesheet'><div class='container droppedHover text-center'>
    <div class='form-group'><div class='col-md-12'><a href='cadCurso.php' class='btn btn-lg btn-primary'>Voltar</a></div></div></div>";
    
    pg_close($conexao);
>>>>>>> 9dfcfb12ae2d9ca286488238584b6f3ef461b2a8
?>