$(document).ready(function(){
    
    $("#celular").mask("(99)99999-9999");

    $("#fone_emp").mask("(99)99999-9999");
    
 
    $("#codigo").keyup(function() {
        
        mascara(this, hexa);
        this.value = this.value.toUpperCase();
    });

    $("#email").blur(function(){
        
        var email = $("#email").val().trim();
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
                var resultado = inter.responseText;
                if (resultado !== "") {
                    var arr = resultado.split("|");
                    $("#nome_cliente").val(arr[0]);
                    $("#celular").val(arr[1]);
                    alert("E-mail já cadastrado!!\nAtualize seus dados!");

                }
            }
        }

        inter.open("POST","http://www.endogenese.com.br/egcodigo/action/consulta_email.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        inter.send("email="+email);
    });
    
    //muda o icone do botão caso os dados tenham sido preenchidos.
    $("#form-cliente input").blur(function(){ 
        if (document.getElementById('email').value != "" && document.getElementById('celular').value != "" && document.getElementById('nome_cliente').value != "") {
            $("#botao_salvar").attr("class", "glyphicon glyphicon-ok-sign");
       }
       else
       {
            $("#botao_salvar").attr("class", "glyphicon glyphicon-remove");
       }

    });

 
});


function mascara(o,f){
    v_obj=o;
    v_fun=f;
    setTimeout("execmascara()",1);
}

function execmascara(){
    v_obj.value=v_fun(v_obj.value);
}


function hexa(v){
    
    v=v.replace(/[^A-F0-9]/gi,"") ;
    return v;
}

function over(id) {
    id.innerHTML = "Confirma USO";
}
function out(id){
    id.innerHTML = "NÃO";
}


function atualizaPerfil(){
  if (!validarPerfil()) {
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
                $("#resposta_perfil").attr("class", "mensagem_aparece");
                document.getElementById("resposta_perfil").innerHTML = inter.responseText;
                setTimeout(function(){
                  document.getElementById("resposta_perfil").innerHTML="&nbsp;";
                  $("#resposta_perfil").attr("class", "mensagem_some");
                  },5000);
                
            }
        }


        inter.open("POST","http://www.endogenese.com.br/egcodigo/action/atualiza_perfil.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
   
        inter.send("id_empresaweb="+document.getElementById("id_empresaweb").value+
                    "&email_empresa="+document.getElementById("email_emp").value+
                    "&telefone="+document.getElementById("fone_emp").value+
                    "&nova_senha="+document.getElementById("nova_senha").value+
                    "&senha_empresa="+document.getElementById("senha_atual").value                  
                     );
        $("#nova_senha").val("");
        $("#conf_senha").val("");
        $("#senha_atual").val("");
}
function mensagem_erro(msg){
    var mensagem = "<span class='bg-danger' style='color: red; padding:"+ 
            "10px 4px 10px 4px; border-radius: 5px; display:block;"+ 
            "margin-top: 5px;' ><span class='glyphicon glyphicon-exclamation-sign'"+ 
            "aria-hidden='true'></span> "+msg+"</span>";
    return mensagem;
}
function validarPerfil(){
    if (document.getElementById('email_emp').value == "")
    {
        $("#resposta_perfil").attr("class", "mensagem_aparece");
                document.getElementById("resposta_perfil").innerHTML = mensagem_erro('Informe um e-mail!!');
                setTimeout(function(){
                  document.getElementById("resposta_perfil").innerHTML="&nbsp;";
                  $("#resposta_perfil").attr("class", "mensagem_some");
                  },8000);
                $("#email_emp").focus();
            return false;

    }
     if (document.getElementById('fone_emp').value == "")
    {
        $("#resposta_perfil").attr("class", "mensagem_aparece");
                document.getElementById("resposta_perfil").innerHTML = mensagem_erro('Informe um Telefone!!');
                setTimeout(function(){
                  document.getElementById("resposta_perfil").innerHTML="&nbsp;";
                  $("#resposta_perfil").attr("class", "mensagem_some");
                  },8000);
                $("#fone_emp").focus();
            return false;

    }
     if (document.getElementById('nova_senha').value !== document.getElementById('conf_senha').value) 
    {
        $("#resposta_perfil").attr("class", "mensagem_aparece");
                document.getElementById("resposta_perfil").innerHTML = mensagem_erro('Informe o mesmo valor na nova senha e na confirmação da senha!!');
                setTimeout(function(){
                  document.getElementById("resposta_perfil").innerHTML="&nbsp;";
                  $("#resposta_perfil").attr("class", "mensagem_some");
                  },8000);
                $("#nova_senha").focus();
            return false;

    }
     if (document.getElementById('senha_atual').value == "")
    {
        $("#resposta_perfil").attr("class", "mensagem_aparece");
                document.getElementById("resposta_perfil").innerHTML = mensagem_erro('Informe a senha atual!!');
                setTimeout(function(){
                  document.getElementById("resposta_perfil").innerHTML="&nbsp;";
                  $("#resposta_perfil").attr("class", "mensagem_some");
                  },8000);
                $("#senha_atual").focus();
            return false;

    }

    return true;

}

function validarEntradas(){
    if (document.getElementById('email').value == "")
    {
        $("#resposta").attr("class", "mensagem_aparece");
                document.getElementById("resposta").innerHTML = mensagem_erro('Você tem e-mail!?');
                setTimeout(function(){
                  document.getElementById("resposta").innerHTML="&nbsp;";
                  $("#resposta").attr("class", "mensagem_some");
                  },5000);
                $("#email").focus();
            return false;

    }
     if (document.getElementById('celular').value == "")
    {
        $("#resposta").attr("class", "mensagem_aparece");
                document.getElementById("resposta").innerHTML = mensagem_erro('Pode informar seu número!?');
                setTimeout(function(){
                  document.getElementById("resposta").innerHTML="&nbsp;";
                  $("#resposta").attr("class", "mensagem_some");
                  },5000);
                $("#celular").focus();
            return false;

    }
     if (document.getElementById('nome_cliente').value == "" ) 
    {
        $("#resposta").attr("class", "mensagem_aparece");
                document.getElementById("resposta").innerHTML = mensagem_erro('Qual o seu Nome!?');
                setTimeout(function(){
                  document.getElementById("resposta").innerHTML="&nbsp;";
                  $("#resposta").attr("class", "mensagem_some");
                  },5000);
                $("#nome_cliente").focus();
            return false;

    }
    return true;

}


    function salvarCliente() {

        if (!validarEntradas()) {
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
                $("#resposta").attr("class", "mensagem_aparece");
                document.getElementById("resposta").innerHTML = inter.responseText;
                setTimeout(function(){
                  document.getElementById("resposta").innerHTML="&nbsp;";
                  $("#resposta").attr("class", "mensagem_some");
                  },5000);
                
            }
        }


        inter.open("POST","http://www.endogenese.com.br/egcodigo/action/cadastra_cliente.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
   
        inter.send("nome_cliente="+document.getElementById("nome_cliente").value+
        			"&email="+document.getElementById("email").value+
                    "&celular="+document.getElementById("celular").value+
                    "&id_empresaweb="+document.getElementById("form-cliente").getAttribute('data-empresaweb')                  
                     );

    }

    function consultaCodigo() {

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
                document.getElementById("consulta_resultado").innerHTML = inter.responseText;
            }
        }
        
        inter.open("POST","http://www.endogenese.com.br/egcodigo/action/consulta_codigo.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
   
        inter.send("codigo="+document.getElementById("codigo").value+
                   "&id_empresaweb="+document.getElementById("id_empresaweb").value);

    }
    function listaGeral(pagina_atual) {

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
                document.getElementById("consulta_resultado").innerHTML = inter.responseText;
            }
        }
        
        inter.open("POST","http://www.endogenese.com.br/egcodigo/action/lista_geral.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
   
        inter.send("id_empresaweb="+document.getElementById("id_empresaweb").value+
                    "&pagina_atual="+pagina_atual);

    }
    function confirmaUso(id_relacao) {

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
                consultaCodigo();
                geraRelatorio();
                $("#confirma_uso").attr("class", "mensagem_aparece");
                document.getElementById("confirma_uso").innerHTML = inter.responseText;
                setTimeout(function(){
                  document.getElementById("confirma_uso").innerHTML="&nbsp;";
                  $("#confirma_uso").attr("class", "mensagem_some");
                  },5000);

            }
        }
        
        inter.open("POST","http://www.endogenese.com.br/egcodigo/action/confirma_uso.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
   
        inter.send("id_relacao="+id_relacao);

    }
    function geraRelatorio() {

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
                document.getElementById("relatorio").innerHTML = inter.responseText;
            }
        }
        
        inter.open("POST","http://www.endogenese.com.br/egcodigo/action/relatorio_empresa.php",true);
        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
   
        inter.send("id_empresaweb="+document.getElementById("id_empresaweb").value);

    }
   function sair () {
        window.location.href='http://www.endogenese.com.br/egcodigo/action/sair.php';
    }
    function voltar () {
        window.location.href='http://www.endogenese.com.br/egcodigo/admin/index.php';
    }

