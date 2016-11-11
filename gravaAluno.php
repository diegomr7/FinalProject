<<<<<<< HEAD
<?php
    include 'conecta.php';
    
    if ($conexao) {
        $matricula=$_POST['matricula'];
        $nome=$_POST['nome'];
        $sexo=$_POST['sexo'];
        $dtnasc=$_POST['dtnasc'];
        $cidade=$_POST['cidade'];
        $uf=$_POST['uf'];
        
        if ($matricula != "") {
            $sql1="SELECT * FROM aluno WHERE matricula='$matricula'";
            $result1=pg_exec($conexao, $sql1);
            
            if ($nome != "") {
                if ($sexo != "") {
                    if ($dtnasc != "") {
                        if ($cidade != "") {
                            if ($uf != "") {
                                if (pg_num_rows($result1) == 0) {
                                    $sql2="INSERT INTO aluno VALUES ('".$matricula."', '".$nome."', '".$sexo."', '".$dtnasc."', '".$cidade."', '".$uf."')";
                                    pg_exec($conexao, $sql2);
                                    
                                    echo "<h3 class='text-center'>Cadastro realizado com sucesso!</h3>";
                                } else {
                                    echo "<h3 class='text-center'>Já existe um usuário cadastrado com esse número de matrícula.</h3>";
                                }
                            } else {
                                echo "<h3 class='text-center'>A sigla UF não foi informado.</h3>";
                            }
                        } else {
                            echo "<h3 class='text-center'>A cidade não foi informada.</h3>";
                        }
                    } else {
                        echo "<h3 class='text-center'>A data de nascimento não foi informada.</h3>";
                    }
                } else {
                    echo "<h3 class='text-center'>O sexo não foi informado.</h3>";
                }
            } else {
                echo "<h3 class='text-center'>O nome não foi informado.</h3>";
            }
        } else {
            echo "<h3 class='text-center'>A matrícula não foi informada.</h3>";
        }
    } else {
        echo "<h3 class='text-center'>Falha na conexão com o banco de dados.</h3>";
    }
    
    echo "<link href='css/bootstrap.min.css' rel='stylesheet'><link href='css/style.css' rel='stylesheet'><div class='container droppedHover text-center'>
    <div class='form-group'><div class='col-md-12'><a href='cadAluno.php' class='btn btn-lg btn-primary'>Voltar</a></div></div></div>";
    
    pg_close($conexao);
=======
<?php
    include 'conecta.php';
    
    if ($conexao) {
        $matricula=$_POST['matricula'];
        $nome=$_POST['nome'];
        $sexo=$_POST['sexo'];
        $dtnasc=$_POST['dtnasc'];
        $cidade=$_POST['cidade'];
        $uf=$_POST['uf'];
        
        if ($matricula != "") {
            $sql1="SELECT * FROM aluno WHERE matricula='$matricula'";
            $result1=pg_exec($conexao, $sql1);
            
            if ($nome != "") {
                if ($sexo != "") {
                    if ($dtnasc != "") {
                        if ($cidade != "") {
                            if ($uf != "") {
                                if (pg_num_rows($result1) == 0) {
                                    $sql2="INSERT INTO aluno VALUES ('".$matricula."', '".$nome."', '".$sexo."', '".$dtnasc."', '".$cidade."', '".$uf."')";
                                    pg_exec($conexao, $sql2);
                                    
                                    echo "<h3 class='text-center'>Cadastro realizado com sucesso!</h3>";
                                } else {
                                    echo "<h3 class='text-center'>Já existe um usuário cadastrado com esse número de matrícula.</h3>";
                                }
                            } else {
                                echo "<h3 class='text-center'>A sigla UF não foi informado.</h3>";
                            }
                        } else {
                            echo "<h3 class='text-center'>A cidade não foi informada.</h3>";
                        }
                    } else {
                        echo "<h3 class='text-center'>A data de nascimento não foi informada.</h3>";
                    }
                } else {
                    echo "<h3 class='text-center'>O sexo não foi informado.</h3>";
                }
            } else {
                echo "<h3 class='text-center'>O nome não foi informado.</h3>";
            }
        } else {
            echo "<h3 class='text-center'>A matrícula não foi informada.</h3>";
        }
    } else {
        echo "<h3 class='text-center'>Falha na conexão com o banco de dados.</h3>";
    }
    
    echo "<link href='css/bootstrap.min.css' rel='stylesheet'><link href='css/style.css' rel='stylesheet'><div class='container droppedHover text-center'>
    <div class='form-group'><div class='col-md-12'><a href='cadAluno.php' class='btn btn-lg btn-primary'>Voltar</a></div></div></div>";
    
    pg_close($conexao);
>>>>>>> 9dfcfb12ae2d9ca286488238584b6f3ef461b2a8
?>