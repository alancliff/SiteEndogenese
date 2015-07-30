$(document).ready(function(){
    /* Nome da Função:  Jquery- Mascara de telefone A
    /* Parâmetros de Entrada: (String) Número de telefone
    /* Valor de Retorno: (String) Número de telefone formatado 
    /* Descrição: Função executada após o preenchimento do número do telefone no cadastro do profissional */
    $("#telefone1").mask("(99)9999-9999?9");
    $('#telefone1').focusout(function(){
            var phone, element;
            element = $(this);
            element.unmask();
            phone = element.val().replace(/\D/g, '');
            if(phone.length > 10) {
                element.mask("(99)99999-999?9");
            } else {
                element.mask("(99)9999-9999?9");
            }
        }).trigger('focusout');
    /* Nome da Função:  Jquery- Mascara de telefone A
    /* Parâmetros de Entrada: (String) Número de telefone
    /* Valor de Retorno: (String) Número de telefone formatado 
    /* Descrição: Função executada após o preenchimento do número do telefone no cadastro do profissional */
    $("#telefone2").mask("(99)9999-9999?9");
    $('#telefone2').focusout(function(){
            var phone, element;
            element = $(this);
            element.unmask();
            phone = element.val().replace(/\D/g, '');
            if(phone.length > 10) {
                element.mask("(99)99999-999?9");
            } else {
                element.mask("(99)9999-9999?9");
            }
        }).trigger('focusout');
    /* Nome da Função:  Jquery- Mascara de telefone A
    /* Parâmetros de Entrada: (String) Número de telefone
    /* Valor de Retorno: (String) Número de telefone formatado 
    /* Descrição: Função executada após o preenchimento do número do telefone no cadastro do profissional */
    $("#telefone3").mask("(99)9999-9999?9");
    $('#telefone3').focusout(function(){
            var phone, element;
            element = $(this);
            element.unmask();
            phone = element.val().replace(/\D/g, '');
            if(phone.length > 10) {
                element.mask("(99)99999-999?9");
            } else {
                element.mask("(99)9999-9999?9");
            }
        }).trigger('focusout');

/* Nome da Função:  Jquery- Exibe ModalProfissional
/* Parâmetros de Entrada: (Evento) shown.bs.modal
/* Valor de Retorno: (String) Detalhamento dos dados do profissional 
/* Descrição: Função executada quando o Modal Profissional é exibido, 
fazendo requisição AJAX para obter o detalhamento dos profissionais */

    $('#ModalContato').on('shown.bs.modal', function (event) {
      var button = $(event.relatedTarget); // Elemento que iniciou o modal
      var id_contato = button.data('idcontato'); // Extrai dado do atributo data-idcontato
      var modal = $(this);
          var inter;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            inter = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            inter = new ActiveXObject("Microsoft.XMLHTTP");
        }
        inter.open("POST","/egcontatos/action/exibir-contato.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        inter.send( "id_contato="+id_contato);

        inter.onreadystatechange = function() {
            if (inter.readyState == 4 && inter.status == 200) {
              modal.find('.modal-content').html(inter.responseText);
            }
        }
    });

/* Nome da Função:  Jquery- Oculta ModalProfissional
/* Parâmetros de Entrada: (Evento) hidden.bs.modal
/* Valor de Retorno: (String) Modal com conteúdo padrão 
/* Descrição: Função executada quando o Modal Profissional é ocultado, 
que faz retornar ao estado anterior */

    $('#ModalContato').on('hidden.bs.modal', function (e) {
      var modal = $(this);
      modal.find('.modal-content').html("<div class='modal-header'>"+
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+
            "</div><div class='modal-body'>"+
              "<div style='text-align: center;'><img src='http://app.endogenese.com.br/admin/img/load.gif'></div>"+
            "</div><div class='modal-footer'></div>");
    });

/* Nome da Função:  Jquery- Oculta ModalProfissional
/* Parâmetros de Entrada: (Evento) hidden.bs.modal
/* Valor de Retorno: (String) Modal com conteúdo padrão 
/* Descrição: Função executada quando o Modal Profissional é ocultado, 
que faz retornar ao estado anterior */
    $(".modal-content").on("focus", ".maskmoney", function(e){
        $(this).maskMoney({thousands:'', decimal:'.', allowZero:true});
    });

});
/* Nome da Função:  listaProfissoes
/* Parâmetros de Entrada: (String, String) ID do elemento que vai receber a resposta; Valor de busca da profissão
/* Valor de Retorno: (String) Lista de profissões 
/* Função que faz chamada AJAX para formar as opções do SELECT na lateral esquerda */
function pesquisarContato(busca, condicao, pagina_atual) {
        busca = busca.trim() || "";
        condicao = condicao || "inicia_por";
        pagina_atual = pagina_atual || 1;
        document.getElementById("resposta").innerHTML = "<img src='http://app.endogenese.com.br/admin/img/load.gif' style='display:block;margin:auto;'>";
        var inter;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            inter = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            inter = new ActiveXObject("Microsoft.XMLHTTP");
        }
        inter.onreadystatechange = function() {
            if (inter.readyState == 4 && inter.status == 200) {

                document.getElementById("resposta").innerHTML = inter.responseText;
            }
        }
        
        inter.open("POST","/egcontatos/action/pesquisa_agenda.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
   
        inter.send("busca="+busca+
        			"&condicao="+condicao+
                    "&pagina_atual="+pagina_atual);

}
function voltarHome(){
    location.href="/egcontatos/admin/";
}
function ativa(elemento){
    var x = document.getElementsByClassName("ativo");
    if (x.length) 
    {
        x[0].removeAttribute("class");
    }
    elemento.setAttribute("class", "ativo");

}

function maiuscula(elemento){
    elemento.value = elemento.value.toUpperCase();
}
function minuscula(elemento){
    elemento.value = elemento.value.toLowerCase();
}


function isEmail(elemento){
    email = elemento.value;
    if (email != "") {
    var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    if(!filter.test(email)){
        document.getElementById("resposta").innerHTML = "<div class='alert alert-danger alert-dismissible fade in' role='alert'>"+
      "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>"+
      "<h4>Isso é um e-mail -> <strong>"+email+"</strong>?</h4>"+
      "<p>O e-mail informado parece estar em um formato inválido. Corrija!</p>"+
      "<p><button type='button' class='btn btn-danger'  data-dismiss='alert' aria-label='Close'>OK</button>"+
      "</p></div>";
        elemento.focus();
        return false;
    }
    else{
        return true;
    }

    }
    else{
        return true;
    }
}
function salvarContato(id_form){

    var x = document.getElementById(id_form);
    var txt = "";
    var i;
    for (i = 0; i < x.length; i++) {
      if (x.elements[i].getAttribute("required") != null && x.elements[i].value == "" ){
        document.getElementById("resposta").innerHTML = "<div class='alert alert-danger alert-dismissible fade in' role='alert'>"+
      "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>"+
      "<h4>humm...você esqueceu algo!</h4>"+
      "<p>Campos marcados com [ <span class='glyphicon glyphicon-star' aria-hidden='true'></span> ] são de preenchimento obrigatório!"+
      "<p><button type='button' class='btn btn-danger'  data-dismiss='alert' aria-label='Close'>OK</button>"+
      "</p></div>";
          
          x.elements[i].focus();
          return false;
        }
      if (x.elements[i].getAttribute("name") != null && x.elements[i].value != ""){
        txt = txt + x.elements[i].getAttribute("name")+"="+x.elements[i].value + "&";
        }

    }

    txt = txt.slice(0,-1);

    if (!isEmail(document.getElementById("email"))) {
        return false;
    }
        var inter;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            inter = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            inter = new ActiveXObject("Microsoft.XMLHTTP");
        }
        inter.onreadystatechange = function() {
            if (inter.readyState == 4 && inter.status == 200) {

                document.getElementById("resposta").innerHTML = inter.responseText;
                for (i = 0; i < x.length; i++) {
                      x.elements[i].value = "";
                }
            }
        }
        
        inter.open("POST","/egcontatos/action/cadastrar-contato.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        inter.send(txt);

}

function alterarContato(id_form){

    var x = document.getElementById(id_form);
    var txt = "";
    var i;
    for (i = 0; i < x.length; i++) {
      if (x.elements[i].getAttribute("required") != null && x.elements[i].value == "" ){
        document.getElementById("resposta").innerHTML = "<div class='alert alert-danger alert-dismissible fade in' role='alert'>"+
      "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>"+
      "<h4>humm...você esqueceu algo!</h4>"+
      "<p>Campos marcados com [ <span class='glyphicon glyphicon-star' aria-hidden='true'></span> ] são de preenchimento obrigatório!"+
      "<p><button type='button' class='btn btn-danger'  data-dismiss='alert' aria-label='Close'>OK</button>"+
      "</p></div>";
          
          x.elements[i].focus();
          return false;
        }
      if (x.elements[i].getAttribute("name") != null){
        txt = txt + x.elements[i].getAttribute("name")+"="+x.elements[i].value + "&";
        }

    }

    txt = txt.slice(0,-1);

    if (!isEmail(document.getElementById("email"))) {
        return false;
    }
        var inter;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            inter = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            inter = new ActiveXObject("Microsoft.XMLHTTP");
        }
        inter.onreadystatechange = function() {
            if (inter.readyState == 4 && inter.status == 200) {

                document.getElementById("resposta").innerHTML = inter.responseText;
            }
        }
        
        inter.open("POST","/egcontatos/action/alterar-contato.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        inter.send(txt);

}

function excluirContato(id_contato) {
    var r = confirm("Deseja realmente excluir este contato?");
    if (r == true) {
        var inter;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            inter = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            inter = new ActiveXObject("Microsoft.XMLHTTP");
        }
        inter.onreadystatechange = function() {
            if (inter.readyState == 4 && inter.status == 200) {
                document.getElementById("resposta").innerHTML = inter.responseText;
                $('#ModalContato').modal('hide');
            }
        }
        
        inter.open("POST","/egcontatos/action/deletar-contato.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        inter.send("id_contato="+id_contato);
    }

}
function formPretensao(id_contato){

        var inter;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            inter = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            inter = new ActiveXObject("Microsoft.XMLHTTP");
        }
        inter.onreadystatechange = function() {
            if (inter.readyState == 4 && inter.status == 200) {
                document.getElementById("prospeccao").innerHTML = inter.responseText;
                
            }
        }
        
        inter.open("POST","/egcontatos/action/form-pretensao.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        inter.send("id_contato="+id_contato);

}

function salvarProspeccao(id_form){

    var x = document.getElementById(id_form);
    var txt = "";
    var i;
    for (i = 0; i < x.length; i++) {
      if (x.elements[i].getAttribute("required") != null && x.elements[i].value == "" ){
            alert("Campo de preenchimento obrigatório");
          
          x.elements[i].focus();
          return false;
        }
      if (x.elements[i].getAttribute("name") != null && x.elements[i].value != ""){
        txt = txt + x.elements[i].getAttribute("name")+"="+x.elements[i].value + "&";
        }

    }

    txt = txt.slice(0,-1);
        var inter;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            inter = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            inter = new ActiveXObject("Microsoft.XMLHTTP");
        }
        inter.onreadystatechange = function() {
            if (inter.readyState == 4 && inter.status == 200) {
            if (inter.readyState == 4 && inter.status == 200) {
                document.getElementById("resposta").innerHTML = inter.responseText;
                $('#ModalContato').modal('hide');
            }
            }
        }
        
        inter.open("POST","/egcontatos/action/salvar-prospeccao.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        inter.send(txt);
}

function formEditaPretensao(id_contato){

        var inter;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            inter = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            inter = new ActiveXObject("Microsoft.XMLHTTP");
        }
        inter.onreadystatechange = function() {
            if (inter.readyState == 4 && inter.status == 200) {
                document.getElementById("prospeccao").innerHTML = inter.responseText;
                
            }
        }
        
        inter.open("POST","/egcontatos/action/form-edita-pretensao.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        inter.send("id_contato="+id_contato);

}

function atualizaProspeccao(id_form){

    var x = document.getElementById(id_form);
    var txt = "";
    var i;
    for (i = 0; i < x.length; i++) {
      if (x.elements[i].getAttribute("required") != null && x.elements[i].value == "" ){
            alert("Campo de preenchimento obrigatório");
          
          x.elements[i].focus();
          return false;
        }
      if (x.elements[i].getAttribute("name") != null && x.elements[i].value != ""){
        txt = txt + x.elements[i].getAttribute("name")+"="+x.elements[i].value + "&";
        }

    }

    txt = txt.slice(0,-1);
        var inter;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            inter = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            inter = new ActiveXObject("Microsoft.XMLHTTP");
        }
        inter.onreadystatechange = function() {
            if (inter.readyState == 4 && inter.status == 200) {
            if (inter.readyState == 4 && inter.status == 200) {
                document.getElementById("resposta").innerHTML = inter.responseText;
                $('#ModalContato').modal('hide');
            }
            }
        }
        
        inter.open("POST","/egcontatos/action/atualiza-prospeccao.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        inter.send(txt);
}
function excluirProspeccao(id_prospeccao) {
    var r = confirm("Deseja realmente excluir a pretensão deste contato?");
    if (r == true) {
        var inter;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            inter = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            inter = new ActiveXObject("Microsoft.XMLHTTP");
        }
        inter.onreadystatechange = function() {
            if (inter.readyState == 4 && inter.status == 200) {
                document.getElementById("resposta").innerHTML = inter.responseText;
                $('#ModalContato').modal('hide');
            }
        }
        
        inter.open("POST","/egcontatos/action/deletar-prospeccao.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        inter.send("id_prospeccao="+id_prospeccao);
    }

}
function listaCompleta(pagina_atual){
        pagina_atual = pagina_atual || 1;
        document.getElementById("resposta").innerHTML = "<img src='http://app.endogenese.com.br/admin/img/load.gif' style='display:block;margin:auto;'>";
        var inter;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            inter = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            inter = new ActiveXObject("Microsoft.XMLHTTP");
        }
        inter.onreadystatechange = function() {
            if (inter.readyState == 4 && inter.status == 200) {
                document.getElementById("resposta").innerHTML = inter.responseText;
               
            }
        }
        
        inter.open("POST","/egcontatos/action/lista-completa.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        inter.send("pagina_atual="+pagina_atual);

}

function listaSimples(pagina_atual){
        pagina_atual = pagina_atual || 1;
        document.getElementById("resposta").innerHTML = "<img src='http://app.endogenese.com.br/admin/img/load.gif' style='display:block;margin:auto;'>";
        var inter;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            inter = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            inter = new ActiveXObject("Microsoft.XMLHTTP");
        }
        inter.onreadystatechange = function() {
            if (inter.readyState == 4 && inter.status == 200) {
                document.getElementById("resposta").innerHTML = inter.responseText;
               
            }
        }
        inter.open("POST","/egcontatos/action/lista-simples.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        inter.send("consultor="+document.getElementById("consultor").value+
                    "&prioridade="+document.getElementById("prioridade").value+
                    "&pagina_atual="+pagina_atual
                     );

}

function relatorioProspeccao(){
        document.getElementById("resposta").innerHTML = "<img src='http://app.endogenese.com.br/admin/img/load.gif' style='display:block;margin:auto;'>";
        var inter;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            inter = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            inter = new ActiveXObject("Microsoft.XMLHTTP");
        }
        inter.onreadystatechange = function() {
            if (inter.readyState == 4 && inter.status == 200) {
                document.getElementById("resposta").innerHTML = inter.responseText;
               
            }
        }
        inter.open("POST","/egcontatos/action/relatorio-prospeccao.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        inter.send();

}