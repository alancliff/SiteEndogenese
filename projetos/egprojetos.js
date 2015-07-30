function getPagina (pagina) {
	pagina = pagina || "inicio";
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
			document.getElementById("conteudo").innerHTML = inter.responseText;
	    }
    }
    inter.open("POST","http://app.endogenese.com.br/egprojetos/action/conteudo.php",true);
    inter.setRequestHeader("Content-type","application/x-www-form-urlencoded");
   	inter.send("pagina="+pagina);
}

function ativa(elemento){
    var x = document.getElementsByClassName("ativo");
    if (x.length) 
    {
        x[0].setAttribute("class", "list-group-item");
    }
    elemento.setAttribute("class", "list-group-item ativo");

}