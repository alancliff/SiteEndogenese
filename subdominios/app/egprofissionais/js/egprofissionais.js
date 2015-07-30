/* ========================================================================
 * EG Profissionais - Java Scripts/JQuery egprofissionais.js V. 1.0
 * Endogênese Consultoria e Serviços LTDA
 * ========================================================================
 * Finalidade: Scripts para manipular os elementos na página e deixá-la dinâmica.
 * Autor: Alan Cliff
 * Última Atualização - 15/05/2015
 * ======================================================================== */

$(document).ready(function(){
    /* Nome da Função:  Jquery- Mascara de telefone A
    /* Parâmetros de Entrada: (String) Número de telefone
    /* Valor de Retorno: (String) Número de telefone formatado 
    /* Descrição: Função executada após o preenchimento do número do telefone no cadastro do profissional */
    $("#fone_a").mask("(99)9999-9999?9");
    $('#fone_a').focusout(function(){
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

    /* Nome da Função:  Jquery- Mascara de telefone B
    /* Parâmetros de Entrada: (String) Número de telefone
    /* Valor de Retorno: (String) Número de telefone formatado 
    /* Descrição: Função executada após o preenchimento do número do telefone no cadastro do profissional */
    $("#fone_b").mask("(99)9999-9999?9");
    $('#fone_b').focusout(function(){
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

    /* Nome da Função:  Jquery- Saída do Email
    /* Parâmetros de Entrada: (Evento) blur
    /* Valor de Retorno: (Function) Alert 
    /* Descrição: Função executada após preenchimento do campo e-mail no cadastro do profissional */
    $("#email_profissional").blur(function(){
        if(!isEmail($("#email_profissional").val() )){
            alert("Você digitou um e-mail inválido. Observe o padrão.")
            $("#email_profissional").val("");
            $("#email_profissional").focus();
        }


        });

/* Nome da Função:  Jquery- Exibe ModalProfissional
/* Parâmetros de Entrada: (Evento) shown.bs.modal
/* Valor de Retorno: (String) Detalhamento dos dados do profissional 
/* Descrição: Função executada quando o Modal Profissional é exibido, 
fazendo requisição AJAX para obter o detalhamento dos profissionais */
	$('#ModalProfissional').on('shown.bs.modal', function (event) {
	  var button = $(event.relatedTarget); // Elemento que iniciou o modal
	  var id_consulta = button.data('idprofissional'); // Extrai dado do atributo data-idprofissional
	  var modal = $(this);
	      var inter;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            inter = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            inter = new ActiveXObject("Microsoft.XMLHTTP");
        }
        inter.open("POST","http://app.endogenese.com.br/egprofissionais/action/detalhar_profissional.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        inter.send( "id_profissional="+id_consulta);

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

	$('#ModalProfissional').on('hidden.bs.modal', function (e) {
	  var modal = $(this);
	  modal.find('.modal-content').html("<div class='modal-header'>"+
	        "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+
	        "</div><div class='modal-body'>"+
	          "<div style='text-align: center;'><img src='http://app.endogenese.com.br/egprofissionais/img/load.gif'></div>"+
	        "</div><div class='modal-footer'></div>");
	});

/* Nome da Função:  Jquery- Seleciona Profissão
/* Parâmetros de Entrada: (Evento) change
/* Valor de Retorno: (String) Lista de profissionais 
/* Descrição: Função executada quando uma profissão é selecionada, 
 no SELECT da lateral esquerda, exibindo na direita a lista de profissionais */
	$("#profissoes").on("change", function(){
	  listaProfissionais(1,$("#profissoes").val());

	});


// var cs = 2;
/* Nome da Função:  Configura rotação do carousel/collapse
/* Parâmetros de Entrada: (Null)
/* Valor de Retorno: (Evento) Click no carousel e no collapse 
/* Descrição: Função que rotaciona o slide e o collapse automaticamente */
// setInterval(function(){ 

//     switch (cs){
//       case 1:
//         $("#c1").click();
//         $("#s1").click();
//         cs = 2;
//         break;
//       case 2:
//         $("#c2").click();
//         $("#s2").click();
//         cs = 3;
//       break;
//       case 3:
//         $("#c3").click();
//         $("#s3").click();
//         cs = 1;
//       break;
//     }

//    },12000);



});

/* Nome da Função:  listaProfissionais
/* Parâmetros de Entrada: (Integer, String) Número da página atual; Nome da profissão
/* Valor de Retorno: (String) Lista de profissionais 
/* Descrição: Função que faz chamada AJAX para listar os profissionais na home-page, conforme a profissão escolhida */
function listaProfissionais(pagina_atual, prof) {

        pagina_atual = pagina_atual || 1;
        prof = prof || "todas";
        document.getElementById("profissionais").innerHTML = "<img src='http://app.endogenese.com.br/egprofissionais/img/load.gif'>";
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

                document.getElementById("profissionais").innerHTML = inter.responseText;
            }
        }
        
        inter.open("POST","http://app.endogenese.com.br/egprofissionais/action/listar_profissionais.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
   
        inter.send("prof="+prof+
                    "&pagina_atual="+pagina_atual);

}
/* Nome da Função:  listaProfissoes
/* Parâmetros de Entrada: (String, String) ID do elemento que vai receber a resposta; Valor de busca da profissão
/* Valor de Retorno: (String) Lista de profissões 
/* Função que faz chamada AJAX para formar as opções do SELECT na lateral esquerda */
function listaProfissoes(id, busca) {
        busca = busca || "";
        // document.getElementById("listaProf").innerHTML = "<img src='http://app.endogenese.com.br/egvagas/img/load.gif'>";
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

                document.getElementById(id).innerHTML = inter.responseText;
            }
        }
        
        inter.open("POST","http://app.endogenese.com.br/egprofissionais/action/criar_lista_profissoes.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
   
        inter.send("busca="+busca);

}
/* Nome da Função:  incluirProfissional
/* Parâmetros de Entrada: (String) ID do form que contém os campos a serem cadastrados
/* Valor de Retorno: (String) Resposta de Sucesso e Fracasso 
/* Função que faz chamada AJAX para inclusão de profissional, 
verificando se os campos com required estão preenchidos, 
e enviando via POST apenas os campos que foram preenchidos*/
function incluirProfissional(id_form) {
    var x = document.getElementById(id_form);
    var txt = "";
    var i;
    for (i = 0; i < x.length; i++) {
      if (x.elements[i].getAttribute("required") != null && x.elements[i].value == "" ){
          alert("Campos assinalados com ( * )\nsão de preenchimento obrigatório");
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


               document.getElementById("conteudo_ModalCadastro").innerHTML = "<div class='modal-header'>"+
        "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+
        "<h4 class='modal-title text-center' id='ModalProfissionalLabel'>Cadastro  - Profissional Autônomo</h4>"+
        "</div><div class='modal-body'>"+
          "<div style='text-align: center;'>"+inter.responseText+"</div>"+
        "</div><div class='modal-footer'>"+
        "<button type='button' class='btn btn-success' data-dismiss='modal' style='font-weight: bold;'>OK</button>"+
        "</div>";

          }
        }
        
        inter.open("POST","http://app.endogenese.com.br/egprofissionais/action/incluir_profissional.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
   
        inter.send(txt);

}
/* Nome da Função:  isEmail
/* Parâmetros de Entrada: (String) Email do profissional
/* Valor de Retorno: (Boolean) Retorna true se o e-mail estiver no formato válido. 
/* Descrição: Função que verifica se um e-mail está no formato válido. */
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