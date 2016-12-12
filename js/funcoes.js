var req;
function buscar(valor, id) {
    var resultado = "resultado" + id;
    if(window.XMLHttpRequest) {
        req = new XMLHttpRequest();
    }
    else if(window.ActiveXObject) {
        req = new ActiveXObject("Microsoft.XMLHTTP");
    }
    var url = "buscaAluno.php?valor="+valor+"&id="+id;
    req.open("Get", url, true);
    req.onreadystatechange = function() {
        if(req.readyState == 1) {
            document.getElementById(resultado).innerHTML = 'Aguarde ...';
        }
        if(req.readyState == 4 && req.status == 200) {
            var resposta = req.responseText;
            document.getElementById(resultado).innerHTML = resposta;
        }
    };
    req.send(null);
}

function adciona(i, id) {
    var campMatricula = "matricula"+ id + i;
    var campIntegrante = "integ0" + id;
    var modal = "#busca" + id;
    var matricula = document.getElementById(campMatricula).value;
    
    if (matricula !== "") {
        document.getElementById(campIntegrante).value = matricula;
        $(modal).modal('hide');
        return false;
    }
}

function CriaRequest() {
    try{
          request = new XMLHttpRequest();        
    }catch (IEAtual){
         
        try{
            request = new ActiveXObject("Msxml2.XMLHTTP");       
        }catch(IEAntigo){
        
            try{
                request = new ActiveXObject("Microsoft.XMLHTTP");          
            }catch(falha){
                request = false;
            }
        }
    }
     
    if (!request) 
        alert("Seu Navegador não suporta Ajax!");
    else
        return request;
}

function excluir(id, funcao){
    bootbox.confirm({
        message: "Deseja excluir este item?",
        buttons: {
            confirm: {
                label: 'Sim',
                className: 'btn-danger'
            },
            cancel: {
                label: 'Não',
                className: 'btn-success'
            }
        },
        callback: function (result) {
            if (result) {
                var xmlreq = CriaRequest();
                xmlreq.open("GET", "excluir.php?id=" + id +"&func=" + funcao, true);
                xmlreq.onreadystatechange = function(){
                
                    if (xmlreq.readyState == 4) {
                        if (xmlreq.status == 200) {
                            $('#id'+id).hide();
                            bootbox.alert({ 
                                message: "Exclusão realizada com sucesso!", 
                            });
                        }else{
                            result.innerHTML = "Erro: " + xmlreq.statusText;
                        }
                    }
                };
                xmlreq.send(null);
            }
        }
    });
}

function alerta() {
    bootbox.alert({
        message: 'This is an alert with a callback!',
        callback: function () {
            location.href = 'index.php';
        }
    });
}

function getGrupo(valor){
    $("#grupo").html("<option value='0'>Carregando...</option>");
    setTimeout(function(){
        $("#grupo").load("buscaGrupo.php",{id:valor});
    }, 200);
}

function getAlunos(valor){
    $("#list").html("Carregando...");
    setTimeout(function(){
        $("#list").load("buscaAlunos.php",{id:valor});
    }, 200);
}

function limpa() {
    $('#membros').hide();
}

function listAlunos(valor){
    $("#aluno").html("<option value='0'>Carregando...</option>");
    setTimeout(function(){
        $("#aluno").load("carregarAlunos.php",{id:valor});
    }, 200);
}

function validaLogin(){
    var login = document.getElementById('login').value;
    var senha = document.getElementById('senha').value;
	
    if( login === ""){
        bootbox.alert({
            message: 'Digite seu login!',
            callback: function () {
                location.back = 'index.php';
            }
        });
        return false;
    }
    
    if(senha === ""){
        bootbox.alert({
            message: 'Digite uma senha!',
            callback: function () {
                location.back = 'index.php';
            }
        });
       return false; 
    }    
}

function validaCurso(){
    var numero = document.getElementById('numero').value;
    var nome = document.getElementById('nome').value;
    var sigla = document.getElementById('sigla').value;
    
    if(numero === ""){
        bootbox.alert({
            message: 'Digite um número!',
            callback: function () {
                location.back = 'cadCurso.php';
            }
        });
        return false;
    }
    
    if(nome === ""){
        bootbox.alert({
            message: 'Digite um nome!',
            callback: function () {
                location.back = 'cadCurso.php';
            }
        });
       return false;
    }
    
    if(sigla === ""){
        bootbox.alert({
            message: 'Digite uma sigla!',
            callback: function () {
                location.back = 'cadCurso.php';
            }
        });
        return false;
    }
}

function validaUser(){
    var login = document.getElementById('login').value;
    var senha = document.getElementById('senha').value;
    var confirmacao = document.getElementById('confirmacao').value;
    var nome = document.getElementById('nome').value;
    var categoria = document.getElementById('categoria').value;
    var situacao = document.getElementById('situacao').value;
	
    
    if( login === ""){
        bootbox.alert({
            message: 'Digite um login!',
            callback: function () {
                location.back = 'cadUser.php';
            }
        });
        return false;
    }
    
    if(senha === ""){
        bootbox.alert({
            message: 'Digite uma senha!',
            callback: function () {
                location.back = 'cadUser.php';
            }
        });
        return false;
    }
    
    if(confirmacao === ""){
        bootbox.alert({
            message: 'Confirme sua senha!',
            callback: function () {
                location.back = 'cadUser.php';
            }
        });
        return false;
    }
    
    if(nome === ""){
        bootbox.alert({
            message: 'Digite um nome!',
            callback: function () {
                location.back = 'cadUser.php';
            }
        });
        return false;
    }
    
    if(categoria === ""){
         bootbox.alert({
            message: 'Selecione uma categoria!',
            callback: function () {
                location.back = 'cadUser.php';
            }
        });
        return false;
    }
    
    if(situacao === ""){
        bootbox.alert({
            message: 'Selecione uma situação!',
            callback: function () {
                location.back = 'cadUser.php';
            }
        });
        return false;
    }  
}

function validaProjeto(){
	var ano = document.getElementById('ano').value;
	var semestre = document.getElementById('semestre').value;
	var modulo = document.getElementById('modulo').value;
	var dt_inicio = document.getElementById('dt_inicio').value;
	var dt_termino = document.getElementById('dt_termino').value;
	var tema = document.getElementById('tema').value;
	var descricao = document.getElementById('descricao').value;
	var curso = document.getElementById('curso').value;
	
	if(ano === ""){
        bootbox.alert({
            message: 'Digite um ano!',
            callback: function () {
                location.back = 'cadProjeto.php';
            }
        });
        return false;
    }	
	
	if(semestre === ""){
        bootbox.alert({
            message: 'Selecione um semestre!',
            callback: function () {
                location.back = 'cadProjeto.php';
            }
        });
        return false;
    }
	
	if(modulo === ""){
        bootbox.alert({
            message: 'Selecione um módulo!',
            callback: function () {
                location.back = 'cadProjeto.php';
            }
        });
        return false;
    }

	if(dt_inicio === ""){
        bootbox.alert({
            message: 'Digite a data de início do projeto!',
            callback: function () {
                location.back = 'cadProjeto.php';
            }
        });
        return false;
    }

	if(dt_termino === ""){
        bootbox.alert({
            message: 'Digite a data de término do projeto!',
            callback: function () {
                location.back = 'cadProjeto.php';
            }
        });
        return false;
    }

	if(tema === ""){
        bootbox.alert({
            message: 'Informe o tema do projeto!',
            callback: function () {
                location.back = 'cadProjeto.php';
            }
        });
        return false;
    }

	if(descricao === ""){
        bootbox.alert({
            message: 'Informe a descrição do projeto!',
            callback: function () {
                location.back = 'cadProjeto.php';
            }
        });
        return false;
    }
	
	if(curso === ""){
        bootbox.alert({
            message: 'Selecione um curso!',
            callback: function () {
                location.back = 'cadProjeto.php';
            }
        });
        return false;
    }
}

function validaGrupo(){
	var id = document.getElementById('id').value;
	var nome = document.getElementById('nome').value;
	var integ01 = document.getElementById('integ01').value;
	var integ02 = document.getElementById('integ02').value;
	var integ03 = document.getElementById('integ03').value;
	
	if(id === ""){
        bootbox.alert({
            message: 'Informe um ID para o grupo!',
            callback: function () {
                location.back = 'cadGrupo.php';
            }
        });
        return false;
    }
	
	if(nome === ""){
        bootbox.alert({
            message: 'Informe o nome do grupo!',
            callback: function () {
                location.back = 'cadGrupo.php';
            }
        });
        return false;
    }
	
	if(integ01 === ""){
        bootbox.alert({
            message: 'Informe pelo menos três integrantes!',
            callback: function () {
                location.back = 'cadGrupo.php';
            }
        });
        return false;
    }
	
	if(integ02 === ""){
        bootbox.alert({
            message: 'Informe pelo menos três integrantes!',
            callback: function () {
                location.back = 'cadGrupo.php';
            }
        });
        return false;
    }
	
	if(integ03 === ""){
        bootbox.alert({
            message: 'Informe pelo menos três integrantes!',
            callback: function () {
                location.back = 'cadGrupo.php';
            }
        });
        return false;
    }
}

function validaAluno(){
	var matricula = document.getElementById('matricula').value;
	var nome = document.getElementById('nome').value;
	var dtnasc = document.getElementById('dtnasc').value;
	var cidade = document.getElementById('cidade').value;
	var uf = document.getElementById('uf').value;
	
	if(matricula === ""){
        bootbox.alert({
            message: 'Informe a matricula do aluno!',
            callback: function () {
                location.back = 'cadAluno.php';
            }
        });
        return false;
    }
	
	if(nome === ""){
        bootbox.alert({
            message: 'Informe o nome do aluno!',
            callback: function () {
                location.back = 'cadAluno.php';
            }
        });
        return false;
    }
	
	if(dtnasc === ""){
        bootbox.alert({
            message: 'Informe a data de nascimento do aluno!',
            callback: function () {
                location.back = 'cadAluno.php';
            }
        });
        return false;
    }
	
	if(cidade === ""){
        bootbox.alert({
            message: 'Informe a cidade de nascimento do aluno!',
            callback: function () {
                location.back = 'cadAluno.php';
            }
        });
        return false;
    }
	
	if(uf === ""){
        bootbox.alert({
            message: 'Selecione a sigla UF!',
            callback: function () {
                location.back = 'cadAluno.php';
            }
        });
        return false;
    }
}

function validaDisciplina(){
	var codigo = document.getElementById('codigo').value;
	var nome = document.getElementById('nome').value;
	var ch = document.getElementById('ch').value;
	
	if(codigo === ""){
        bootbox.alert({
            message: 'Informe o código da disciplina!',
            callback: function () {
                location.back = 'cadDisciplina.php';
            }
        });
        return false;
    }
	
	if(nome === ""){
        bootbox.alert({
            message: 'Informe o nome da disciplina!',
            callback: function () {
                location.back = 'cadDisciplina.php';
            }
        });
        return false;
    }
	
	if(ch === ""){
        bootbox.alert({
            message: 'Informe a carga horária da disciplina!',
            callback: function () {
                location.back = 'cadDisciplina.php';
            }
        });
        return false;
    }
	
}

function validaComposto(){
	var disciplina = document.getElementById('disciplina').value;
	var projeto = document.getElementById('projeto').value;
	var descricao = document.getElementById('descricao').value;
	
	if(disciplina === ""){
        bootbox.alert({
            message: 'Selecione uma disciplina!',
            callback: function () {
                location.back = 'cadComposto.php';
            }
        });
        return false;
    }
	
	if(projeto === ""){
        bootbox.alert({
            message: 'Selecione um projeto!',
            callback: function () {
                location.back = 'cadComposto.php';
            }
        });
        return false;
    }
	
	if(descricao === ""){
        bootbox.alert({
            message: 'Informe uma descrição!',
            callback: function () {
                location.back = 'cadComposto.php';
            }
        });
        return false;
    }
}
