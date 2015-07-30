/* ========================================================================
 * EG Vagas - Java Scripts/JQuery  V. 1.5
 * Endogênese Consultoria e Serviços LTDA
 * ========================================================================
 * Autor: Alan Cliff
 * Criado em - 19/05/2015
 * Última Atualização - 27/07/2015
 * ======================================================================== */


$(document).ready(function(){

    /* Nome da Função:  Jquery- Mascara de telefone
    /* Parâmetros de Entrada: (String) Número de telefone
    /* Valor de Retorno: (String) Número de telefone formatado 
    /* Descrição: Função executada após o preenchimento do número do telefone no cadastro da candidato */
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


    /* Nome da Função:  Jquery- Mascara de email
    /* Parâmetros de Entrada: (String) Número de email
    /* Valor de Retorno: (String) Número de email formatado 
    /* Descrição: Função executada após o preenchimento do email cadastro da candidato */
    $("#email").keyup(function() {
        this.value = this.value.toLowerCase();
    });

    /* Nome da Função:  Jquery- Alterna estado
    /* Parâmetros de Entrada: (Event) Keyup nos campos do formulário
    /* Valor de Retorno: (Null)
    /* Descrição: Função que muda o icone do botão caso os dados tenham sido preenchidos.*/

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

    /* Nome da Função:  Jquery- Verifica email
    /* Parâmetros de Entrada: (Event) Blur
    /* Valor de Retorno: (Funcrion) checkEmail
    /* Descrição: Função executada após o usuário deixar o campo de email cadastro da candidato, e verifica o email. */
    $("#email").blur(function(){
        checkEmail();
    });

    /* Nome da Função:  Jquery- Muda valor do Select de busca
    /* Parâmetros de Entrada: (Event) Change
    /* Valor de Retorno: (String) Lista de Opções
    /* Descrição: Função executada a mudança no critério de busca, na home page do egvagas. */
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

/* Nome da Função:  mensagem
/* Parâmetros de Entrada: (String, String, String) A mensagem, id do elemento, tipo de mensagem
/* Valor de Retorno: (String)  Mensagem formatada
/* Descrição: Função que cria uma mensagem, podendo ser de sucesso ou fracasso.*/
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
/* Nome da Função:  checkEmail
/* Parâmetros de Entrada: (Null)
/* Valor de Retorno: (String)  Resposta da Ação
/* Descrição: Função que consulta o e-mail que o usuário está tentando cadastra, para ver se já não foi cadastrado anteriormente.*/
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
                
                mensagem("<strong>"+valor+"</strong> já está cadastrado!<br>"+inter.responseText, "resposta", "danger");
                setTimeout(function(){
                  document.getElementById("resposta").innerHTML="<p class='titulo1 tam1 text-center'>Cadastre-se e receba informativos sobre empregos!</p>";
                  },10000);
                }

            }
            
        }
      }
      else{
                em = $("#email").val();
                if (em !== "" && em.length > 5) {
                 mensagem("O e-mail \""+em+"\" está incorreto", "resposta", "danger");
                }
                $("#email").val("");
                setTimeout(function(){
                  document.getElementById("resposta").innerHTML="<p class='titulo1 tam1 text-center'>Cadastre-se e receba informativos sobre empregos!</p>";
                  },5000);
      }
}
/* Nome da Função:  excluirCandidato
/* Parâmetros de Entrada: (Null)
/* Valor de Retorno: (String)  Resposta da Ação
/* Descrição: Função que exclui o candidato do banco, acionada pelo próprio usuáiro.*/
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
/* Nome da Função:  salvarCandidato
/* Parâmetros de Entrada: (Null)
/* Valor de Retorno: (String)  Resposta da Ação
/* Descrição: Função que salva o candidato no banco.*/
function salvarCandidato() {

        if (!validarEntradas()) {
            return false;
        }
        document.getElementById("resposta").innerHTML = "<img style='display:block;margin: auto;' src='http://app.endogenese.com.br/egvagas/img/load.gif'>";


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
                  document.getElementById("resposta").innerHTML="<p class='titulo1 tam1 text-center'>Cadastre-se e receba informativos sobre empregos!</p>";
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
/* Nome da Função:  validarEntradas
/* Parâmetros de Entrada: (Null)
/* Valor de Retorno: (String)  Resposta
/* Descrição: Função que valida a entrada de dados do usuário.*/
function validarEntradas(){
    if (document.getElementById('email').value == "")
    {
                  mensagem('Você tem e-mail!?','resposta', "danger");
                setTimeout(function(){
                  document.getElementById("resposta").innerHTML="<p class='titulo1 tam1 text-center'>Cadastre-se e receba informativos sobre empregos!</p>";
                  },5000);
                $("#email").focus();
            return false;

    }
     if (document.getElementById('telefone').value == "")
    {
                mensagem('Pode informar seu número!?', 'resposta', "danger");
                setTimeout(function(){
                  document.getElementById("resposta").innerHTML="<p class='titulo1 tam1 text-center'>Cadastre-se e receba informativos sobre empregos!</p>";
                  },5000);
                $("#celular").focus();
            return false;

    }
     if (document.getElementById('nome').value == "" ) 
    {
                mensagem('Qual o seu Nome!?', 'resposta', "danger");
                setTimeout(function(){
                  document.getElementById("resposta").innerHTML="<p class='titulo1 tam1 text-center'>Cadastre-se e receba informativos sobre empregos!</p>";
                  },5000);
                $("#nome_cliente").focus();
            return false;

    }

    return true;

}
/* Nome da Função:  mostrarDetalhes
/* Parâmetros de Entrada: (String, Integer, String, String) ID da vaga, página atual, critério de busca, valor da busca
/* Valor de Retorno: (String)  Detalhamento da Vaga
/* Descrição: Função que apresenta o detalhamento da vaga de emprego.*/
function mostrarDetalhes(id, pg, criterio, valor){

    pg = pg || 1;
    criterio = criterio || "";
    valor = valor || "";
    document.getElementById("conteudo").innerHTML = "<img style='display:block;margin: auto;' src='http://app.endogenese.com.br/egvagas/img/load.gif'>";
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
/* Nome da Função:  listaGeral
/* Parâmetros de Entrada: (Integer) Página atual da pesquisa
/* Valor de Retorno: (String)  Lista de todas as vagas
/* Descrição: Função que apresenta as listagem geral das vagas de emprego.*/
function listaGeral(pagina_atual) {

        pagina_atual = pagina_atual || 1;
        document.getElementById("conteudo").innerHTML = "<img style='display:block;margin: auto;' src='http://app.endogenese.com.br/egvagas/img/load.gif'>";
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

/* Nome da Função:  buscarVaga
/* Parâmetros de Entrada: (String, String, Integer) Critério de Busca, Valor da Busca, e Número da Página
/* Valor de Retorno: (String)  Lista de Vagas
/* Descrição: Função que faz uma busca no banco, conforme os critérios escolhidos pelo usuário.*/
function buscarVaga(criterio, valor, pagina_atual) {
        pagina_atual = pagina_atual || 1;
        document.getElementById("conteudo").innerHTML = "<img style='display:block;margin: auto;' src='http://app.endogenese.com.br/egvagas/img/load.gif'>";
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

/* Nome da Função:  relInfo
/* Parâmetros de Entrada: (String, String) Nome da tabela no banco, ID do DIV
/* Valor de Retorno: (Integer)  Valor do cálculo
/* Descrição: Função que apresenta as estatísticas simplificadas do sistema.*/
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
/* Nome da Função:  validarCadastro
/* Parâmetros de Entrada: (String, String, String) ID do candidato, código criptografado e data criptografada
/* Valor de Retorno: (String)  Mensagem 
/* Descrição: Função que valida um cadastro de pessoa no sistema. Acionada pelo próprio usuário.*/
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
/* Nome da Função:  excluirCadastro
/* Parâmetros de Entrada: (String, String, String) ID do candidato, código criptografado e data criptografada
/* Valor de Retorno: (String)  Mensagem 
/* Descrição: Função que exclui um cadastro de pessoa no sistema. Acionada pelo próprio usuário.*/
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
/* Nome da Função:  geraMapa
/* Parâmetros de Entrada: (String, String, String) ID da DIV, Latitude e Longitude
/* Valor de Retorno: (Objeto)  Mapa 
/* Descrição: Função que exibe um mapa dentro de uma DIV, conforme a latitude e logitude passadas.*/
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
        
