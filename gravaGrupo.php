<?php
     include 'conecta.php';
     
     if ($conexao) {
          $id=$_POST['id'];
          $nome=$_POST['nome'];
          $projeto=$_POST['projeto'];
          $integ01=$_POST['integ01'];
          $integ02=$_POST['integ02'];
          $integ03=$_POST['integ03'];
          $integ04=$_POST['integ04'];
          $sql0="SELECT * FROM grupo WHERE id='$id'";
          $result0=pg_exec($conexao, $sql0);
          
          if (pg_num_rows($result0) == 0) {
               if ($id != "") {
                    if ($nome != "") {
                         if ($projeto != "") {
                              if ($integ01 != "") {
                                   $i = 1;
                                   $sql1="INSERT INTO grupo VALUES ('".$id."', '".$nome."', '".$projeto."')";
                                   pg_exec($conexao, $sql1);
                                   $sql2="INSERT INTO participa VALUES ('".$integ01."', '".$id."')";
                                   pg_exec($conexao, $sql2);
                                   
                                   if ($integ02 != "") {
                                        $i = $i + 1;
                                        $sql3="INSERT INTO participa VALUES ('".$integ02."', '".$id."')";
                                        pg_exec($conexao, $sql3);
                                        
                                        if ($integ03 != "") {
                                             $i = $i + 1;
                                             $sql4="INSERT INTO participa VALUES ('".$integ03."', '".$id."')";
                                             pg_exec($conexao, $sql4);
                                             
                                             if ($integ04 != "") {
                                                  $i = $i + 1;
                                                  $sql5="INSERT INTO participa VALUES ('".$integ04."', '".$id."')";
                                                  pg_exec($conexao, $sql5);
                                             }
                                        }
                                   }
                                   
                                   echo "<h3 class='text-center'>O grupo possui ".$i." integrante(s).</h3>";
                                   
                              } else {
                                   echo "<h3 class='text-center'>O primeiro aluno não foi informado.</h3>";
                              }
                              
                              echo "<h3 class='text-center'>Cadastro realizado com sucesso!</h3>";
                         } else {
                              echo "<h3 class='text-center'>O projeto não foi informado.</h3>";
                         }
                    } else {
                         echo "<h3 class='text-center'>O nome não foi informado.</h3>";
                    }
               } else {
                    echo "<h3 class='text-center'>A matrícula não foi informada.</h3>";
               }
          } else {
               echo "<h3 class='text-center'>Já existe um grupo cadastrado com esse ID.</h3>";
          }
     } else {
        echo "<h3 class='text-center'>Falha na conexão com o banco de dados.</h3>";
     }
     
     echo "<link href='css/bootstrap.min.css' rel='stylesheet'><link href='css/style.css' rel='stylesheet'><div class='container droppedHover text-center'>
     <div class='form-group'><div class='col-md-12'><a href='cadGrupo.php' class='btn btn-lg btn-primary'>Voltar</a></div></div></div>";
     
     pg_close($conexao);
?>