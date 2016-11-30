<?php
     include 'conecta.php';
     
     if ($conexao) {
          $id=$_POST['id'];
          $nome=$_POST['nome'];
          $projeto=$_POST['projeto'];
          if (isset($_POST['integ01'])) { $integ01=$_POST['integ01']; }
          if (isset($_POST['integ02'])) { $integ02=$_POST['integ02']; }
          if (isset($_POST['integ03'])) { $integ03=$_POST['integ03']; }
          if (isset($_POST['integ04'])) { $integ04=$_POST['integ04']; }
          $sql1="SELECT * FROM grupo WHERE id='$id'";
          $result1=pg_exec($conexao, $sql1);
          
          if (pg_num_rows($result1) > 0) {
               if ($id != "") {
                    if ($nome != "") {
                         if ($projeto != "") {
                              $sql3="DELETE FROM participa WHERE id_grupo = '".$id."'";
                              pg_exec($conexao, $sql3);
                              if (isset($integ01) && $integ01 != "") {
                                   $i = 1;
                                   $sql2="UPDATE grupo	SET nome='".$nome."', num_proj='".$projeto."' WHERE id='".$id."'";
                                   pg_exec($conexao, $sql2);
                                   $sql4="INSERT INTO participa VALUES ('".$integ01."', '".$id."')";
                                   pg_exec($conexao, $sql4);
                                   
                                   if (isset($integ02)) {
                                        $i++;
                                        $sql5="INSERT INTO participa VALUES ('".$integ02."', '".$id."')";
                                        pg_exec($conexao, $sql5);
                                        
                                        if (isset($integ03)) {
                                             $i++;
                                             $sql6="INSERT INTO participa VALUES ('".$integ03."', '".$id."')";
                                             pg_exec($conexao, $sql6);
                                             
                                             if (isset($integ04)) {
                                                  $i++;
                                                  $sql7="INSERT INTO participa VALUES ('".$integ04."', '".$id."')";
                                                  pg_exec($conexao, $sql7);
                                             }
                                        }
                                   }
                                   
                                   echo "<h3 class='text-center'>O grupo possui ".$i." integrante(s).</h3>";
                                   
                              } else {
                                   echo "<h3 class='text-center'>O grupo não possui usuários.</h3>";
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
               echo "<h3 class='text-center'>Não existe um grupo cadastrado com esse ID.</h3>";
          }
     } else {
        echo "<h3 class='text-center'>Falha na conexão com o banco de dados.</h3>";
     }
     
     echo "<link href='css/bootstrap.min.css' rel='stylesheet'><link href='css/style.css' rel='stylesheet'><div class='container droppedHover text-center'>
     <div class='form-group'><div class='col-md-12'><a href='listGrupo.php' class='btn btn-lg btn-primary'>Voltar</a></div></div></div>";
     
     pg_close($conexao);
?>