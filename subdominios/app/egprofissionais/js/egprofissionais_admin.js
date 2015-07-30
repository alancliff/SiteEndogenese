/* ========================================================================
 * EG Profissionais - Java Scripts/JQuery - egprofissionais_admin.js  V. 1.0
 * Endogênese Consultoria e Serviços LTDA
 * ========================================================================
 * Finalidade: Scripts para manipular os elementos na página administrativa e deixá-la dinâmica.
 * Autor: Alan Cliff
 * Última Atualização - 20/05/2015
 * ======================================================================== */

$(document).ready(function(){
    /* Nome da Função:  Jquery- Exibe Modal de Edição de Cadastro
    /* Parâmetros de Entrada: (Event) shown.bs.modal
    /* Valor de Retorno: (String) Modal com o formulário e os dados do profissional para edição. 
    /* Descrição: Função executada para abrir o formulário de edição do cadastro do profissional */
	$('#ModalEditCadastro').on('shown.bs.modal', function (event) {
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
        inter.open("POST","http://app.endogenese.com.br/egprofissionais/action/editar_profissional.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        inter.send( "id_profissional="+id_consulta);

        inter.onreadystatechange = function() {
            if (inter.readyState == 4 && inter.status == 200) {
              modal.find('.modal-content').html(inter.responseText);
            }
        }
	});
    /* Nome da Função:  Jquery- Oculta Modal de cadastro
    /* Parâmetros de Entrada: (Event) hidden.bs.modal
    /* Valor de Retorno: (String) Modal com conteúdo padrão. 
    /* Descrição: Função executada após o ocultamento do modal de edição do cadastro do profissional */
		$('#ModalEditCadastro').on('hidden.bs.modal', function (e) {
	  var modal = $(this);
	  modal.find('.modal-content').html("<div class='modal-header'>"+
	        "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+
	        "</div><div class='modal-body'>"+
	          "<div style='text-align: center;'><img src='http://app.endogenese.com.br/egprofissionais/img/load.gif'></div>"+
	        "</div><div class='modal-footer'></div>");
	});

    /* Nome da Função:  Jquery- Escolha de Opção do select de profissões.
    /* Parâmetros de Entrada: (Event) Change
    /* Valor de Retorno: (Null) 
    /* Descrição: Monitorara o evendo de mudança da opção e chama a função de consulta de profissão. */
    $("#profissoes_admin").on("change", function(){
      ConsultaProfissao(1,$("#profissoes_admin").val());
    });

});

    /* Nome da Função:  ConsultaProfissao.
    /* Parâmetros de Entrada: (Integer, String) Página atual de exibição e profissão escolhida.
    /* Valor de Retorno: (String) Listagem de profissionais.
    /* Descrição: Realiza a busca e exibição com paginação, dos profissionais conforme a profissão escolhida. */
function ConsultaProfissao(pagina_atual, prof) {

    pagina_atual = pagina_atual || 1;
    prof = prof || "todas";
    
        document.getElementById("res_consulta").innerHTML = "<img src='http://app.endogenese.com.br/egprofissionais/img/load.gif'>";
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
        xmlhttp.open("POST","http://app.endogenese.com.br/egprofissionais/action/consulta_por_profissao.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("prof="+prof+
                    "&pagina_atual="+pagina_atual);

}
    /* Nome da Função:  ConsultaNome.
    /* Parâmetros de Entrada: (String) Nome buscado
    /* Valor de Retorno: (String) Listagem de Profissionais 
    /* Descrição: Realiza a busca de profissionais conforme o nome pesquisado. */
function ConsultaNome(str) {
    
    if (str == "" || str.length < 3) {
        return;
    } else {
        document.getElementById("res_consulta").innerHTML = "<img src='http://app.endogenese.com.br/egprofissionais/img/load.gif'>";
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
        xmlhttp.open("POST","http://app.endogenese.com.br/egprofissionais/action/consulta_por_nome.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("nome_conhecido="+str);
    }
}

    /* Nome da Função:  ConsultaPendentes.
    /* Parâmetros de Entrada: (Null) 
    /* Valor de Retorno: (String) Lista de Profissionais 
    /* Descrição: Pesquisa todos os profissionais que estão com cadastro pendente. */
function ConsultaPendentes() {
    

        document.getElementById("res_consulta").innerHTML = "<img src='http://app.endogenese.com.br/egprofissionais/img/load.gif'>";
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
        xmlhttp.open("POST","http://app.endogenese.com.br/egprofissionais/action/consulta_pendentes.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send();

}
    /* Nome da Função:  atualizaProfissional.
    /* Parâmetros de Entrada: (String) ID do form que contem os elementos a atualizar.
    /* Valor de Retorno: (String) Informação do sucesso ou fracasso da solicitação. 
    /* Descrição: Enviar os dados para atualização do profissional no banco de dados. */
function atualizaProfissional(id_form){
	var x = document.getElementById(id_form);
    var txt = "";
    var i;
    for (i = 0; i < x.length; i++) {
      if (x.elements[i].getAttribute("required") != null && x.elements[i].value == "" ){
          alert("Campos assinalados com ( * )\nsão de preenchimento obrigatório");
          x.elements[i].focus();
          return false;
        }
      if (x.elements[i].getAttribute("name") != null){
        txt = txt + x.elements[i].getAttribute("name")+"="+x.elements[i].value + "&";
        }

    }

    txt = txt.slice(0,-1);
    document.getElementById("conteudo_ModalEditCadastro").innerHTML = "<div class='modal-header'>"+
	        "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+
	        "</div><div class='modal-body'>"+
	          "<div style='text-align: center;'><img src='http://app.endogenese.com.br/egprofissionais/img/load.gif'></div>"+
	        "</div><div class='modal-footer'></div>";
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


               document.getElementById("conteudo_ModalEditCadastro").innerHTML = "<div class='modal-header'>"+
        "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+
        "<h4 class='modal-title text-center' id='ModalProfissionalLabel'>Confirmação de Atualização</h4>"+
        "</div><div class='modal-body'>"+
          "<div style='text-align: center;'>"+inter.responseText+"</div>"+
        "</div><div class='modal-footer'>"+
        "<button type='button' class='btn btn-success' data-dismiss='modal' style='font-weight: bold;' onclick='ConsultaPendentes()'>OK</button>"+
        "</div>";

          }
        }
        
        inter.open("POST","http://app.endogenese.com.br/egprofissionais/action/atualizar_profissional.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
   
        inter.send(txt);

}