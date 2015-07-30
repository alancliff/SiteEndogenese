<?php 
$modulo = "egvagas";
$subtitulo = "EG Vagas";
require $_SERVER["DOCUMENT_ROOT"]."/protecao/protecao_login.php";
require $_SERVER["DOCUMENT_ROOT"]."/padrao/constantes.php"; 
include $_SERVER["DOCUMENT_ROOT"]."/padrao/header.php";
include $_SERVER["DOCUMENT_ROOT"]."/padrao/menu.php";

?>
<div style="margin-top:60px;" class="container">

<img class="titulo_img" src="/egvagas/img/egvagas.png">
<h1 class="titulo_tela bg-info">Empresas</h1>
<div class="row">
	<div class="col-xs-12 text-center">
		<a class="btn btn-primary" href="<?php echo APP.'/egvagas/admin/formulario_empresa.php';?>">Cadastrar Empresa</a>
		<a class="btn btn-info" href="<?php echo APP.'/egvagas/admin/detalhamento_vaga.php';?>">Detalhamento da Vaga</a>
		<a class="btn btn-default" href="<?php echo APP.'/egvagas/admin/relatorios_egvagas.php';?>">RELATÓRIOS</a>
	</div>
</div>
<br>
<div class="row">
	<div class="col-xs-5">
		<div class="input-group">
		  <label class="input-group-addon" id="label_fantasia_empresa" for="fantasia_empresa">Nome Fantasia</label>
		  <input id="fantasia_empresa" type="text" class="form-control" placeholder="Empresa..." aria-describedby="label_fantasia_empresa" onkeyup="listarEmpresas('fantasia', this.value)">
		</div>
	</div>
	<div class="col-xs-5">
		<div class="input-group">
		  <label class="input-group-addon" id="label_cnpj" for="cnpj">CNPJ</label>
		  <input id="cnpj" type="text" class="form-control" placeholder="CNPJ..." aria-describedby="label_cnpj" onkeyup="listarEmpresas('cnpj', this.value)">
		</div>
	</div>
	<div class="col-xs-2">
		<span class="btn btn-primary btn-lg" onclick="listarEmpresas('todas')">LISTAR EMPRESAS</span>
	</div>
</div>
<br>
<div id="res_consulta"></div>

</div>
 
<?php include $_SERVER["DOCUMENT_ROOT"]."/padrao/footer.php"; ?>