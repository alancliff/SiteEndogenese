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
	function atualizaPerfil(id_form) {
		var x = document.getElementById(id_form);
	    var txt = "";
	    var i;
	    for (i = 0; i < x.length; i++) {
	      if (x.elements[i].getAttribute("required") != null && x.elements[i].value == "" ){
	        document.getElementById("resposta").innerHTML = "<div class='alert alert-danger alert-dismissible fade in' role='alert'>"+
	      "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>"+
	      "<h4>humm...você esqueceu algo!</h4>"+
	      "<p>Os campos 'Nome', 'E-mail' e 'Senha Atual' são de preenchimento obrigatório!"+
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

	    if (!isEmail(document.getElementById("email_mestre"))) {
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
	        
	        inter.open("POST","/action/alterar-perfil.php",true);
	        inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	        inter.send(txt);
	}
