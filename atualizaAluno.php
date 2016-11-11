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
            if ($nome != "") {
                if ($sexo != "") {
                    if ($dtnasc != "") {
                        if ($cidade != "") {
                            if ($uf != "") {
                                
                                    //$sql2="INSERT INTO aluno VALUES ('".$matricula."', '".$nome."', '".$sexo."', '".$dtnasc."', '".$cidade."', '".$uf."')";
                                    $sql2="UPDATE aluno SET nome = '$nome', sexo = '$sexo', dtnasc = '$dtnasc', cidade = '$cidade', uf = '$uf' WHERE matricula = '$matricula'";
                                    pg_exec($conexao, $sql2);
                                    
                                    echo "<h3 class='text-center'>Atualização cadastral do(a) aluno(a) ".$nome." foi realizada com sucesso!</h3>";
                                
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
    <div class='form-group'><div class='col-md-12'><a href='listAluno.php' class='btn btn-lg btn-primary'>Voltar</a></div></div></div>";
    
    pg_close($conexao);
?>