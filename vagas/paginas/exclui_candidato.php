<?php
    require $_SERVER["DOCUMENT_ROOT"]."/padrao/constantes.php";
    require $_SERVER["DOCUMENT_ROOT"]."/padrao/header_egvagas.php";
    echo    "</head><body>"; 
    require $_SERVER["DOCUMENT_ROOT"]."/padrao/menu.php";

?>
<script type="text/javascript">
$(document).ready(function(){

    $("#ex_email").keyup(function(){
		if (!isEmail($("#ex_email").val() )) {
			$("#ex_btn").attr("disabled", "disabled");
		}
		else
		{
			$("#ex_btn").removeAttr("disabled");
		}
    });

    $("#ex_email").blur(function(){
		if (!isEmail($("#ex_email").val() )) {
			$("#ex_email").val("");
			$("#ex_email").focus();


		}


    });



});
</script>
<div style="margin-top: 70px;"></div>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<p class='titulo1 fonte-lg bg-danger'>QUER MESMO FAZER ISSO!? <span class='glyphicon glyphicon-thumbs-down pull-right' aria-hidden='true'></span>  </p>
			<p class='titulo1 fonte-md'>O EG Vagas mantém você informado a respeito de Oportunidades de Emprego que surgem em nossa região! Tais informações são úteis a você, além de seus amigos e parentes que podem estar desempregados.<p>
		</div>		
		<div class="col-xs-12">
			<a class='btn btn-default btn-voltar btn-lg' href="<?php echo SITE.'/vagas'; ?>">VER AS VAGAS!</a>
		</div>
		<div class="col-xs-12" style="margin-top:20px;">
			<p class='fonte-xs'>Ainda assim, se a sua decisão for pela exclusão de seu cadastro, favor informar seu e-mail a seguir. Você receberá um e-mail com um link para a exclusão de seu cadastro!</p>
			<form method="post" action="<?php echo APP.'/egvagas/action/excluir_candidato.php';?>">
				<div class="input-group" style="width:30%">
			              <span class="input-group-addon"> <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></span>
			              <input type="email" id="ex_email" name="ex_email" size="30" class="form-control" placeholder="Informe seu e-mail" >
			              <button id="ex_btn" type="button" onclick="excluirCandidato()" class="btn btn-default btn-xs" disabled= "disabled" style="margin-top:10px;">Excluir Cadastro</button>
			    </div>
			</form>
		</div>
	</div>

<div id="resposta"></div>
</div>


<?php 
require $_SERVER["DOCUMENT_ROOT"]."/padrao/footer.php";  ?>