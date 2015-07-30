function inserirBox(id)
{
document.writeln("<meta charset='utf-8'>");
document.writeln("<link href='http://www.endogenese.com.br/base/css/bootstrap.min.css' rel='stylesheet'>");
document.writeln("<link href='http://www.endogenese.com.br/egcodigo/css/egcodigo.css' rel='stylesheet'>");
document.writeln("<script src='http://www.endogenese.com.br/base/js/jquery-1.11.0.js'></script>");
document.writeln("<script src='http://www.endogenese.com.br/base/js/maskedinput.min.js'></script>");
document.writeln("<script src='http://www.endogenese.com.br/egcodigo/js/egcodigo.js'></script>");


document.writeln("<form id='form-cliente' data-empresaweb='"+id+"'>"+
	"<div style='width:400px; margin: auto'>"+
		"<div class='row'>"+
			"<div class='col-md-6'>"+
				"<div class='input-group input-group-sm '>"+
				  "<span class='input-group-addon' id='leg-email'> <span class='glyphicon glyphicon-envelope' aria-hidden='true'></span></span>"+
				  "<input type='email' class='form-control' placeholder='email@email.com' aria-describedby='leg-email' name='email' id='email'>"+
				"</div>"+
			"</div>"+
			"<div class='col-md-6'>"+
				"<div class='input-group input-group-sm '>"+
				  "<span class='input-group-addon' id='leg-cel'> <span class='glyphicon glyphicon-phone' aria-hidden='true'></span></span>"+
				  "<input type='text' class='form-control' placeholder='celular'aria-describedby='leg-cel' name='celular' id='celular' >"+
				"</div>"+
			"</div>"+
		"</div>"+
		"<div class='input-group input-group-lg'>"+
		  "<span class='input-group-addon' id='leg-nome'> <span class='glyphicon glyphicon-user' aria-hidden='true'></span> </span>"+
		 "<input type='text' class='form-control' placeholder='Nome Completo' aria-describedby='leg-nome' name='nome_cliente' id='nome_cliente'>"+
		"</div>"+
		"<span class='btn btn-success btn-lg' id='asd' onclick='salvarCliente()' >"+
		  "<span class='glyphicon glyphicon-remove' aria-hidden='true' id='botao_salvar'></span> SALVAR"+
		"</span>"+
	"<div id='resposta'></div>"+
	"</div>"+
"</form>");

     
    
}