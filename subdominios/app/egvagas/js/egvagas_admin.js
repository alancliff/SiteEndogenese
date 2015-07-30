/* ========================================================================
 * EG Vagas - Java Scripts/JQuery  V. 1.0
 * Endogênese Consultoria e Serviços LTDA
 * ========================================================================
 * Autor: Alan Cliff
 * Criado em - 27/07/2015
 * Última Atualização - 27/07/2015
 * ======================================================================== */


$(document).ready(function(){
    /* Nome da Função:  Jquery- Mascara de telefone A
    /* Parâmetros de Entrada: (String) Número de telefone
    /* Valor de Retorno: (String) Número de telefone formatado 
    /* Descrição: Função executada após o preenchimento do número do telefone no cadastro da empresa */
    $("#emp_telefone_a").mask("(99)9999-9999?9");
    $('#emp_telefone_a').focusout(function(){
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
    /* Descrição: Função executada após o preenchimento do número do telefone no cadastro da empresa */
    $("#emp_telefone_b").mask("(99)9999-9999?9");
    $('#emp_telefone_b').focusout(function(){
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

    /* Nome da Função:  Jquery- Mascara de CEP
    /* Parâmetros de Entrada: (String) Número de CEP
    /* Valor de Retorno: (String) Número de CEP formatado 
    /* Descrição: Função executada durante o preenchimento do número do CEP no cadastro da empresa */
    $("#emp_cep").mask("99.999-999");
    /* Nome da Função:  Jquery- Mascara de CNPJ
    /* Parâmetros de Entrada: (String) Número de CNPJ
    /* Valor de Retorno: (String) Número de CNPJ formatado 
    /* Descrição: Função executada após o preenchimento do número do CNPJ no cadastro da empresa*/
    $("#cnpj").mask("99.999.999/9999-99");

    /* Nome da Função:  Jquery- Clique no Select
    /* Parâmetros de Entrada: (Event) Click
    /* Valor de Retorno: (Function) Função que retorna lista de cargos cadastrados para a empresa 
    /* Descrição: Função executada quando se clica sobre o select da empresa, no detalhamento do cargo*/
    $("#empresas").on("click", function(){
        listaCargos($("#empresas").val());
    });
    
    /* Nome da Função:  Jquery- Clique no Select
    /* Parâmetros de Entrada: (Event) Click
    /* Valor de Retorno: (Function) Função que retorna o detalhamento do cargo cadastrado.
    /* Descrição: Função executada quando se clica sobre o select do cargo, no detalhamento do cargo*/
    $("#cargos").on("click", function(){
        relatorioVaga($("#cargos").val());
    });

});

/* Nome da Função:  isEmail
/* Parâmetros de Entrada: (String) valor do email
/* Valor de Retorno: (Boolean)  
/* Descrição: Função de verificação de email, para saber se está em formato válido ou não.*/
function isEmail(email){
    var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    if(!filter.test(email)){
      return false;
    }
    else
    {
      return true;
    }
}

/* Nome da Função:  listarEmpresas
/* Parâmetros de Entrada: (String, String) Critério de Busca, Valor de Busca
/* Valor de Retorno: (String)  Lista de empresas
/* Descrição: Função que busca as empresas, podendo ser o critério o nome fantasia ou o cnpj*/
function listarEmpresas(criterio, valor, pagina_atual){
      valor = valor || "naoinformado";
      pagina_atual = pagina_atual || 1;
      if (valor == "" || valor.length < 4) {
        return;
    } else {
      document.getElementById("res_consulta").innerHTML = "<img style='display:block;margin: auto;' src='http://app.endogenese.com.br/egvagas/img/load.gif'>";
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("res_consulta").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("POST","http://app.endogenese.com.br/egvagas/action/listar_empresas.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("criterio="+criterio+
                      "&valor="+valor+
                      "&pagina_atual="+pagina_atual);
    }
}

/* Nome da Função:  salvarEmpresa
/* Parâmetros de Entrada: (String) Id do formulário
/* Valor de Retorno: (String)  Resposta da ação
/* Descrição: Função para salvar uma empresa no banco.*/
function salvarEmpresa(id_form){

    var x = document.getElementById(id_form);
    var txt = "";
    var i;
    for (i = 0; i < x.length; i++) {
      if (x.elements[i].getAttribute("required") != null && x.elements[i].value == "" ){
        document.getElementById("resposta").innerHTML = "<div class='alert alert-danger alert-dismissible fade in' role='alert'>"+
      "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>"+
      "<h4>humm...você esqueceu algo!</h4>"+
      "<p>Campos em destaque são de preenchimento obrigatório!"+
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

    if (!isEmail(document.getElementById("emp_email").value)) {
        document.getElementById("resposta").innerHTML = "<div class='alert alert-danger alert-dismissible fade in' role='alert'>"+
      "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>"+
      "<h4>Isso é um e-mail -> <strong>"+document.getElementById("emp_email").value+"</strong>?</h4>"+
      "<p>O e-mail informado parece estar em um formato inválido. Corrija!</p>"+
      "<p><button type='button' class='btn btn-danger'  data-dismiss='alert' aria-label='Close'>OK</button>"+
      "</p></div>";
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
        
        inter.open("POST","http://app.endogenese.com.br/egvagas/action/incluir_empresa.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        inter.send(txt);

}

/* Nome da Função:  atualizarEmpresa
/* Parâmetros de Entrada: (String) Id do formulário
/* Valor de Retorno: (String)  Resposta da ação
/* Descrição: Função para atualizar uma empresa no banco.*/
function atualizarEmpresa(id_form){

    var x = document.getElementById(id_form);
    var txt = "";
    var i;
    for (i = 0; i < x.length; i++) {
      if (x.elements[i].getAttribute("required") != null && x.elements[i].value == "" ){
        document.getElementById("resposta").innerHTML = "<div class='alert alert-danger alert-dismissible fade in' role='alert'>"+
      "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>"+
      "<h4>humm...você esqueceu algo!</h4>"+
      "<p>Campos em destaque são de preenchimento obrigatório!"+
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

    if (!isEmail(document.getElementById("emp_email").value)) {
        document.getElementById("resposta").innerHTML = "<div class='alert alert-danger alert-dismissible fade in' role='alert'>"+
      "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>"+
      "<h4>Isso é um e-mail -> <strong>"+document.getElementById("emp_email").value+"</strong>?</h4>"+
      "<p>O e-mail informado parece estar em um formato inválido. Corrija!</p>"+
      "<p><button type='button' class='btn btn-danger'  data-dismiss='alert' aria-label='Close'>OK</button>"+
      "</p></div>";
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
        
        inter.open("POST","http://app.endogenese.com.br/egvagas/action/atualizar_empresa.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        inter.send(txt);

}
/* Nome da Função:  salvarVaga
/* Parâmetros de Entrada: (String) Id do formulário
/* Valor de Retorno: (String)  Resposta da ação
/* Descrição: Função para salvar uma vaga de emprego no banco.*/
function salvarVaga(id_form){

    var x = document.getElementById(id_form);
    var txt = "";
    var i;
    for (i = 0; i < x.length; i++) {
      if (x.elements[i].getAttribute("required") != null && x.elements[i].value == "" ){
        document.getElementById("resposta").innerHTML = "<div class='alert alert-danger alert-dismissible fade in' role='alert'>"+
      "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>"+
      "<h4>humm...você esqueceu algo!</h4>"+
      "<p>Campos em destaque são de preenchimento obrigatório!"+
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
        
        inter.open("POST","http://app.endogenese.com.br/egvagas/action/incluir_vaga.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        inter.send(txt);

}
/* Nome da Função:  atualizarVaga
/* Parâmetros de Entrada: (String) Id do formulário
/* Valor de Retorno: (String)  Resposta da ação
/* Descrição: Função para atualizar uma vaga de emprego no banco.*/
function atualizarVaga(id_form){

    var x = document.getElementById(id_form);
    var txt = "";
    var i;
    for (i = 0; i < x.length; i++) {
      if (x.elements[i].getAttribute("required") != null && x.elements[i].value == "" ){
        document.getElementById("resposta").innerHTML = "<div class='alert alert-danger alert-dismissible fade in' role='alert'>"+
      "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>"+
      "<h4>humm...você esqueceu algo!</h4>"+
      "<p>Campos em destaque são de preenchimento obrigatório!"+
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
        
        inter.open("POST","http://app.endogenese.com.br/egvagas/action/atualizar_vaga.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        inter.send(txt);

}
/* Nome da Função:  listarVagas
/* Parâmetros de Entrada: (String) Id do empresa
/* Valor de Retorno: (String)  Lista de vagas
/* Descrição: Função para listar as vagas de emprego vinculadas a determinada empresa.*/
function listarVagas(id_empresa) {
        document.getElementById("res_consulta").innerHTML = "<img style='display:block;margin: auto;' src='http://app.endogenese.com.br/egvagas/img/load.gif'>";
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
                document.getElementById("res_consulta").innerHTML = inter.responseText;
            }
        }
        
        inter.open("POST","/egvagas/action/listar_vagas.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        inter.send("id_empresa="+id_empresa);
}


/* Nome da Função:  enviarForm
/* Parâmetros de Entrada: (String, Objeto) Endereço do Arquivo, Objetos a serem enviados
/* Valor de Retorno: (Null)   
/* Descrição: Função para simular o envio de dados de um formulário pelo método post.*/
function enviarForm(url, obj){
    //Define o formulário
    var myForm = document.createElement("form");
    myForm.action = url;
    myForm.method = "post";
    myForm.style.display = "none";
    for(var key in obj) {
        var input = document.createElement("input");
        input.type = "text";
        input.value = obj[key];
        input.name = key;
        
        myForm.appendChild(input);            
    }
    //Adiciona o form ao corpo do documento
    document.body.appendChild(myForm);
    //Envia o formulário
    myForm.submit();
}

/* Nome da Função:  selecionaEmpresa
/* Parâmetros de Entrada: (Null)
/* Valor de Retorno: (String)  Lista de empresas
/* Descrição: Função para listar as empresas dentro de um select.*/
function selecionaEmpresa(id_select) {
    
        
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(id_select).innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("POST","http://app.endogenese.com.br/egvagas/action/seleciona_empresa.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send();
    
}
/* Nome da Função:  listaCargos
/* Parâmetros de Entrada: (String) ID da empresa
/* Valor de Retorno: (String)  Lista de cargos
/* Descrição: Função para listar os cargos vinculados à uma determinada empresas dentro de um select.*/
function listaCargos(id_empresa) {
  

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("cargos").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("POST","http://app.endogenese.com.br/egvagas/action/lista_cargos.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("id_empresa="+id_empresa);

}
/* Nome da Função:  relatorioVaga
/* Parâmetros de Entrada: (String) ID da vaga
/* Valor de Retorno: (String)  Detalhamento da vaga
/* Descrição: Função para detalhar uma vaga selecionada.*/
function relatorioVaga(id_vaga) {
  

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("detalhamento_vaga").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("POST","http://app.endogenese.com.br/egvagas/action/relatorio_vaga.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("id_vaga="+id_vaga);

}


/* Nome da Função:  excluirEmpresa
/* Parâmetros de Entrada: (String) ID da empresa
/* Valor de Retorno: (String) Resposta da ação   
/* Descrição: Função para excluir uma empresa do banco.*/

function excluirEmpresa(id_empresa) {
    var r = confirm("Deseja realmente excluir a empresa?");
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
                document.getElementById("res_consulta").innerHTML = inter.responseText;
            }
        }
        
        inter.open("POST","/egvagas/action/excluir_empresa.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        inter.send("id_empresa="+id_empresa);
    }

}


/* Nome da Função:  excluirVaga
/* Parâmetros de Entrada: (String) ID da vaga
/* Valor de Retorno: (String) Resposta da ação   
/* Descrição: Função para excluir uma vaga de emprego do banco.*/

function excluirVaga(id_vaga) {
    var r = confirm("Deseja realmente excluir a Vaga de Emprego?");
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
                document.getElementById("res_consulta").innerHTML = inter.responseText;
            }
        }
        
        inter.open("POST","/egvagas/action/excluir_vaga.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        inter.send("id_vaga="+id_vaga);
    }

}
/* Nome da Função:  ativa
/* Parâmetros de Entrada: (Element) Elemento 
/* Valor de Retorno: (Null)
/* Descrição: Função para formatar de forma diferenciada o elemento que foi clicado.*/
function ativa(elemento){
    var x = document.getElementsByClassName("ativo");
    if (x.length) 
    {
        x[0].setAttribute("class", "list-group-item");
    }
    elemento.setAttribute("class", "list-group-item ativo");

}

/* Nome da Função:  getRelatorio
/* Parâmetros de Entrada: (String) Número do Relatóroi
/* Valor de Retorno: (String) Resposta da ação   
/* Descrição: Função para gerar relatórios diversos, conforme o número do relatório passado.*/
function getRelatorio(relatorio) {
    
        document.getElementById("res_relatorio").innerHTML = "<img style='display:block;margin: auto;' src='http://app.endogenese.com.br/egvagas/img/load.gif'>";
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("res_relatorio").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("POST","http://app.endogenese.com.br/egvagas/action/gera_relatorios.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("relatorio="+relatorio+
                    "&id_empresa="+document.getElementById("lista_empresas").value);
    
}