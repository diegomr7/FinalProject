<?php
     include 'verifica.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="imgs/formatura.png">

    <title>Final Project</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="header clearfix">
            <nav>
                <ul class="nav nav-pills pull-right">
                    <li role="presentation"><a href="home.php">Home</a></li>
                    <li role="presentation" class="active"><a href="cadUser.php">Cadastrar usuário</a></li>
                    <li role="presentation"><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
            <h3 class="text-muted">Final Project</h3>
        </div>
        
        <div class="row marketing">
            <div class="col-lg-12">
                <form class="form-horizontal">
                    <fieldset>
                    
                    <legend class="text-center">Cadastro de usuário</legend>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="login">Login:</label>  
                        <div class="col-md-6">
                            <input id="login" name="login" type="text" placeholder="Login..." class="form-control input-md">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="senha">Senha</label>
                        <div class="col-md-6">
                            <input id="senha" name="senha" type="password" placeholder="senha..." class="form-control input-md">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="confirmacao">Confirmação</label>
                        <div class="col-md-6">
                            <input id="confirmacao" name="confirmacao" type="password" placeholder="Confirmação de senha..." class="form-control input-md">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="nome">Nome:</label>  
                        <div class="col-md-6">
                            <input id="nome" name="nome" type="text" placeholder="Nome completo..." class="form-control input-md">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="categoria">Categoria</label>
                        <div class="col-md-6">
                            <select id="categoria" name="categoria" class="form-control">
                                <option value="">Selecione uma opção...</option>
                                <option value="c">Coordenador</option>
                                <option value="g">Gerente do PI</option>
                                <option value="p">Professor</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="situacao">Situação</label>
                        <div class="col-md-6"> 
                            <label class="radio-inline" for="situacao-0">
                                <input type="radio" name="situacao" id="situacao-0" value="a" checked="checked">
                                Ativo
                            </label> 
                            <label class="radio-inline" for="situacao-1">
                                <input type="radio" name="situacao" id="situacao-1" value="i">
                                Inativo
                            </label>
                        </div>
                    </div>
                    
                    </fieldset>
                </form>
            </div>
        </div>
        
        <footer class="footer">
            <p>&copy; 2016 Dav, Inc.</p>
        </footer>
    </div>
</body>
</html>