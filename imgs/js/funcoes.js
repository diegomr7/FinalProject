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
        document.getElementById(resultado).innerHTML = 'aguarde ...';
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