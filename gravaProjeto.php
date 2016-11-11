<?php
    include 'conecta.php';
    
    if ($conexao) {
        $ano=$_POST['ano'];
        $semestre=$_POST['semestre'];
        $modulo=$_POST['modulo'];
        $dt_inicio=$_POST['dt_inicio'];
        $dt_termino=$_POST['dt_termino'];
		$tema=$_POST['tema'];
        $descricao=$_POST['descricao'];
		$curso=$_POST['curso'];
		
        $sql1="SELECT * FROM projeto WHERE ano='$ano' and semestre='$semestre' and modulo='$modulo' and num_curso='$curso'";
        $result1=pg_exec($conexao, $sql1);
        $sql2="INSERT INTO projeto (ano, semestre, modulo, dt_inicio, dt_termino, tema, descricao, num_curso ) VALUES ('".$ano."', '".$semestre."', '".$modulo."', '".$dt_inicio."', '".$dt_termino."', '".$tema."', '".$descricao."', '".$curso."')";
        $sql3="SELECT * FROM curso WHERE numero='$curso'";
		$dados=pg_exec($conexao, $sql3);
		$linha=pg_fetch_array($dados);
        
		if ($ano != ""){
            if ($semestre != "") {
                if ($modulo != "") {
                    if ($dt_inicio != "") {
                        if ($dt_termino != "") {
                            if ($tema != "") {
								if($descricao != "") {
									if($curso != "") {
										if (pg_num_rows($result1) == 0) {
											
											pg_exec($conexao, $sql2);
											
											echo "<h3 class='text-center'>Cadastro realizado com sucesso!</h3>";
										} else {
											echo "<h3 class='text-center'>Já exite um projeto cadastrado para o módulo ".$modulo." de ".$linha['sigla']." neste semestre.</h3>";
										}
									}else{
										 echo "<h3 class='text-center'>O curso não foi informado.</h3>";
									}
								}else{
									 echo "<h3 class='text-center'>A descrição não foi informada.</h3>";
								}			
                            } else {
                                echo "<h3 class='text-center'>O tema não foi informado.</h3>";
                            }
                        } else {
                            echo "<h3 class='text-center'>A data de término não foi informada.</h3>";
                        }
                    } else {
                        echo "<h3 class='text-center'>A data de início não foi informada.</h3>";
                    }
                } else {
                    echo "<h3 class='text-center'>O módulo não foi informado.</h3>";
                }
            } else {
                echo "<h3 class='text-center'>O semestre não foi informado.</h3>";
            }
        } else {
            echo "<h3 class='text-center'>O ano não foi informado.</h3>";
        }
    } else {
        echo "<h3 class='text-center>Falha na conexão com o banco de dados.</h3>";
    }
    
    echo "<link href='css/bootstrap.min.css' rel='stylesheet'><link href='css/style.css' rel='stylesheet'><div class='container droppedHover text-center'>
    <div class='form-group'><div class='col-md-12'><a href='cadProjeto.php' class='btn btn-lg btn-primary'>Voltar</a></div></div></div>";
    
    pg_close($conexao);
?>
