/* ========================================================================
 * EG Vagas - Java Scripts/JQuery  V. 1.0
 * Endogênese Consultoria e Serviços LTDA
 * ========================================================================
 * Autor: Alan Cliff
 * Última Atualização - 19/05/2015
 * ======================================================================== */


$(document).ready(function(){
    
    /* Nome da Função:  Jquery- Mascara para telefone
    /* Parâmetros de Entrada: (Evento) shown.bs.modal
    /* Valor de Retorno: (String) Detalhamento dos dados do profissional 
    /* Descrição: Função executada quando o Modal Profissional é exibido, 
    fazendo requisição AJAX para obter o detalhamento dos profissionais */
    $("#telefone").mask("(99)9999-9999?9");
    $('#telefone').focusout(function(){
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
    
    $("#email").keyup(function() {
        this.value = this.value.toLowerCase();
    });

    //muda o icone do botão caso os dados tenham sido preenchidos.
    $("#form-cliente input").keyup(function(){ 
        if (document.getElementById('email').value != "" && document.getElementById('telefone').value != "" && document.getElementById('nome').value != "") {
            $("#cadastro").removeAttr("disabled");
            $("#cadastro").html("CADASTRAR!");
       }
       else
       {
            $("#cadastro").attr("disabled", "disabled");
            $("#cadastro").html("Informe seus dados!");
       }
    });

    $("#email").blur(function(){
        checkEmail();
        });

    $("#criterio").change(function(){

        switch ($("#criterio").val()){
            case "cargo":
                $("#opcao").html("<div class='input-group'><span class='input-group-addon'>Cargo</span>"+
                    "<input type='text' class='form-control' placeholder='Cargo' id='valor' name='valor' maxlength='50' size='35'></div>");
                break;
            case "salario":
                $("#opcao").html("<div class='input-group'><span class='input-group-addon'>Faixa Salarial</span><div class='input-group'>"+
                 "<select class='form-control' id='valor' name='valor' >"+
                  "<option value='0|1000' selected> Até 1000,00</option>"+
                  "<option value='1001|2000'>Entre 1001,00 e 2.000,00</option>"+
                  "<option value='2001|3000'>Entre 2001,00 e 3.000,00</option>"+
                  "<option value='3001|4000'>Entre 3001,00 e 4.000,00</option>"+
                  "<option value='4001|0'>Acima de 4.001,00</option>"+
                  "<option value='null'>A combinar</option>"+
                "</select> "+
              "</div>");
                break;
            case "escolaridade":
                $("#opcao").html("<div class='input-group'><span class='input-group-addon'>Escolaridade</span><div class='input-group'>"+
                 "<select class='form-control' id='valor' name='valor'>"+
                  "<option value='Qualquer' selected>Qualquer</option>"+
                  "<option value='Fundamental'>Fundamental</option>"+
                  "<option value='Médio'>Médio</option>"+
                  "<option value='Técnico'>Técnico</option>"+
                  "<option value='Superior'>Superior</option>"+
                  "<option value='Especialista'>Especialista</option>"+
                  "<option value='Mestrado'>Mestrado</option>"+
                  "<option value='Doutorado'>Doutorado</option>"+
                "</select>"+ 
              "</div>");
                break;
            case "pne":
                $("#opcao").html("<div class='input-group'><span class='input-group-addon'><abbr title='Portador de Necessidades Especiais'>Vagas PNE<sup>?</sup></abbr></span><div class='input-group'>"+
                 "<select class='form-control' id='valor' name='valor'>"+
                  "<option value='sim' selected>SIM</option>"+
                  "<option value='nao'>NÃO</option>"+
                "</select>"+ 
              "</div>");
                break;
            case "periodo":
                $("#opcao").html("<div class='input-group'><span class='input-group-addon'>Período de Trabalho</span><div class='input-group'>"+
                 "<select class='form-control' id='valor' name='valor'>"+
                  "<option value='matutino|matutino' >Apenas Manhã</option>"+
                  "<option value='vespertino|vespertino'>Apenas Tarde</option>"+
                  "<option value='noturno|noturno'>Apenas Noite</option>"+
                  "<option value='matutino|vespertino' selected>Manhã e Tarde</option>"+
                  "<option value='vespertino|noturno'>Tarde e Noite</option>"+
                  "<option value='noturno|matutino'>Noite e Manhã</option>"+
                  "<option value='todos'>Escala Indefinida</option>"+
                "</select>"+ 
              "</div>");
                break;
            default:
                $("#opcao").html("<div class='input-group'><span class='input-group-addon'>Função</span>"+
                    "<input type='text' class='form-control' placeholder='Função' id='valor' name='valor' maxlength='50' size='35'></div>");

            } 
        
    });

});


/* Nome da Função:  incluirProfissional
/* Parâmetros de Entrada: (String) ID do form que contém os campos a serem cadastrados
/* Valor de Retorno: (String) Resposta de Sucesso e Fracasso 
/* Função que faz chamada AJAX para inclusão de profissional, 
verificando se os campos com required estão preenchidos, 
e enviando via POST apenas os campos que foram preenchidos*/
function muda(id){
 var a= id.innerHTML;
 a = (a+1);
 return id.innerHTML = a;
  
}

function mensagem(msg, id, tipo){
    tipo = tipo || "nenhum";
    switch (tipo){
      case "success":

        return document.getElementById(id).innerHTML = "<span class='bg-success' style='display: block;'><span class='glyphicon glyphicon-ok' "+
               "aria-hidden='true'></span> "+msg+"</span>";
      case "danger":
        return document.getElementById(id).innerHTML = "<span class='bg-danger' style='display: block;'><span class='glyphicon glyphicon-remove' "+
               "aria-hidden='true'></span> "+msg+"</span>";
       
      case "nenhum":

        return document.getElementById(id).innerHTML = msg;

    }
 
}
function mensagemEmail(){
    alert("O email informado já consta em nosso sistema.\nEm caso de dúvidas, entre em contato conosco!");
}
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

function checkEmail()
{
        var email = $("#email").val().trim();
        if (isEmail(email)) {


        var inter;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            inter = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            inter = new ActiveXObject("Microsoft.XMLHTTP");
        }
        inter.open("POST","http://app.endogenese.com.br/egvagas/action/consulta_email.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        inter.send("email="+email);

        inter.onreadystatechange = function() {
            if (inter.readyState == 4 && inter.status == 200) {

                if (inter.responseText !== "") {
                valor = $("#email").val();
                $("#email").val("");
                
                mensagem(valor+" já está cadastrado!<br>"+inter.responseText, "resposta", "danger");
                setTimeout(function(){
                  document.getElementById("resposta").innerHTML="<p class='titulo1 tam1 text-center' style='margin-top: -15px;'>Receba via e-mail ofertas de vagas de emprego!</p>";
                  },15000);
                }

            }
            
        }
      }
      else{
                em = $("#email").val();
                mensagem("O e-mail \""+em+"\" está incorreto", "resposta", "danger");
                $("#email").val("");
                setTimeout(function(){
                  document.getElementById("resposta").innerHTML="<p class='titulo1 tam1 text-center' style='margin-top: -15px;'>Receba via e-mail ofertas de vagas de emprego!</p>";
                  },10000);
      }


       
}

function excluirCandidato()
{
        var ex_email = $("#ex_email").val().trim();

        var inter;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            inter = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            inter = new ActiveXObject("Microsoft.XMLHTTP");
        }
        inter.open("POST","http://app.endogenese.com.br/egvagas/action/excluir_candidato.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        inter.send("ex_email="+ex_email);

        inter.onreadystatechange = function() {
            if (inter.readyState == 4 && inter.status == 200) {


              switch (inter.responseText)
              {

                case "0": 
                mensagem("O e-mail <strong>"+ex_email+"</strong> não está cadastrado em nosso sistema!<br>", "resposta", "danger");
                break;

                case "1":
                mensagem("Enviamos um e-mail para <strong>"+ex_email+"</strong> com um link para você clicar e efetivar o descadastramento!<br>", "resposta", "success");
                break;

                default:
                mensagem("Um erro ocorreu. Entre em contato com nosso suporte para fazer a exclusão do seu cadastro: suporte@endogenese.com.br", "resposta", "danger");
              }


            }
            
        }
      


       
}

function salvarCandidato() {

        if (!validarEntradas()) {
            return false;
        }
        document.getElementById("resposta").innerHTML = "<img src='http://app.endogenese.com.br/egvagas/img/load.gif'>";


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
                mensagem(inter.responseText, "resposta", "nenhum");
                $("#email").val("");
                $("#nome").val("");
                $("#telefone").val("");
                $("#cadastro").attr("disabled", "disabled");
                $("#cadastro").html("Informe seus dados!");
                $('#alerta').modal('show');
                setTimeout(function(){
                  document.getElementById("resposta").innerHTML="<p class='titulo1 tam1 text-center' style='margin-top: -15px;'>Receba via e-mail ofertas de vagas de emprego!</p>";
                  },30000);
                
            }
        }


        inter.open("POST","http://app.endogenese.com.br/egvagas/action/incluir_candidato.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
   
        inter.send( "pes_email="+document.getElementById("email").value+
                    "&pes_nome="+document.getElementById("nome").value+
                    "&pes_telefone_a="+document.getElementById("telefone").value
                     );
    }

function validarEntradas(){
    if (document.getElementById('email').value == "")
    {
                  mensagem('Você tem e-mail!?','resposta', "danger");
                setTimeout(function(){
                  document.getElementById("resposta").innerHTML="<p class='titulo1 tam1 text-center' style='margin-top: -15px;'>Receba via e-mail ofertas de vagas de emprego!</p>";
                  },5000);
                $("#email").focus();
            return false;

    }
     if (document.getElementById('telefone').value == "")
    {
                mensagem('Pode informar seu número!?', 'resposta', "danger");
                setTimeout(function(){
                  document.getElementById("resposta").innerHTML="<p class='titulo1 tam1 text-center' style='margin-top: -15px;'>Receba via e-mail ofertas de vagas de emprego!</p>";
                  },5000);
                $("#celular").focus();
            return false;

    }
     if (document.getElementById('nome').value == "" ) 
    {
                mensagem('Qual o seu Nome!?', 'resposta', "danger");
                setTimeout(function(){
                  document.getElementById("resposta").innerHTML="<p class='titulo1 tam1 text-center' style='margin-top: -15px;'>Receba via e-mail ofertas de vagas de emprego!</p>";
                  },5000);
                $("#nome_cliente").focus();
            return false;

    }

    return true;

}

function mostrarDetalhes(id, pg, criterio, valor){

    pg = pg || 1;
    criterio = criterio || "";
    valor = valor || "";
    document.getElementById("conteudo").innerHTML = "<img src='http://app.endogenese.com.br/egvagas/img/load.gif'>";
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
                  document.getElementById("conteudo").innerHTML = inter.responseText;
            }
        }


        inter.open("POST","http://app.endogenese.com.br/egvagas/action/detalhar_vaga.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        inter.send( "id_vaga="+id+
                    "&pagina_atual="+pg+
                    "&criterio="+criterio+
                    "&valor="+valor
                    );

}

function listaGeral(pagina_atual) {

        pagina_atual = pagina_atual || 1;
        document.getElementById("conteudo").innerHTML = "<img src='http://app.endogenese.com.br/egvagas/img/load.gif'>";
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

                document.getElementById("conteudo").innerHTML = inter.responseText;
            }
        }
        
        inter.open("POST","http://app.endogenese.com.br/egvagas/action/lista_geral.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
   
        inter.send("pagina_atual="+pagina_atual);

}

function buscarVaga(criterio, valor, pagina_atual) {
        pagina_atual = pagina_atual || 1;
        document.getElementById("conteudo").innerHTML = "<img src='http://app.endogenese.com.br/egvagas/img/load.gif'>";
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
                document.getElementById("conteudo").innerHTML = inter.responseText;
            }
        }
        
        inter.open("POST","http://app.endogenese.com.br/egvagas/action/buscar_vaga.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
   
        inter.send("criterio="+criterio+
                  "&valor="+valor+
                  "&pagina_atual="+pagina_atual);

}

function relInfo(tabela, id) {
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
        
        inter.open("POST","http://app.endogenese.com.br/egvagas/action/contagem.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
   
        inter.send("tabela="+tabela);

}

function validarCadastro(id, cod, dti)
{
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
                document.getElementById("resultado_valida").innerHTML = inter.responseText;
            }
        }
        
        inter.open("POST","http://app.endogenese.com.br/egvagas/action/validar_candidato.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
   
        inter.send("id="+id+
                  "&cod="+cod+
                  "&dti="+dti);
}
function excluirCadastro(id, cod, dti)
{
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
                document.getElementById("resultado_exclui").innerHTML = inter.responseText;
            }
        }
        
        inter.open("POST","http://app.endogenese.com.br/egvagas/action/validar_exclusao.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
   
        inter.send("id="+id+
                  "&cod="+cod+
                  "&dti="+dti);
}

        function geraMapa(id, lat, lon) {
            var myLocation = new google.maps.LatLng(lat, lon);
            var mapOptions = {
                center: myLocation,
                zoom: 16
            };
            var marker = new google.maps.Marker({
                position: myLocation,
                title: 'Property Location'
            });
            var map = new google.maps.Map(document.getElementById(id),
                mapOptions);
            marker.setMap(map);
        }
        
