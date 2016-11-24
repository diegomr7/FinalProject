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