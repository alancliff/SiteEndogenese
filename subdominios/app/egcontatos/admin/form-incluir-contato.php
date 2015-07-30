<?php
$modulo = 'egcontatos';
$subtitulo = 'EG Contatos :: Incluir';
require $_SERVER["DOCUMENT_ROOT"]."/protecao/protecao_login.php";
include $_SERVER["DOCUMENT_ROOT"]."/padrao/constantes.php";
include $_SERVER["DOCUMENT_ROOT"]."/padrao/header.php";
include $_SERVER["DOCUMENT_ROOT"]."/padrao/menu.php";

?>

<div class="container topo_pagina">
	<form id="formulario">
	<img class="titulo_img" src="/egcontatos/img/egcontatos.png">
	<h1 class="titulo_agenda bg-info">INCLUSÃO DE CONTATOS</h1>
	<span class="btn btn-warning btn-lg" onclick="voltarHome()">Voltar para EG Contatos</span>
	<div class="row">
		<div class="col-xs-8">
			<div class="input-group">
			  <label class="input-group-addon" for="nome_contato" id="label_nome"><span class="glyphicon glyphicon-user visible-xs visible-sm" aria-hidden="true"></span><span class="visible-lg visible-md">Nome</span></label>
			  <input type="text" id="nome_contato" name="nome_contato" class="form-control" placeholder="Nome" aria-describedby="label_nome" required onkeyup="maiuscula(this)">
			  <div class="input-group-addon"><span class="glyphicon glyphicon-star" aria-hidden="true"></span></div>
			</div>
		</div>
		<div class="col-xs-4">
			<div class="input-group">
			  <label class="input-group-addon" for="empresa_trabalha" id="label_empresa"><span class="glyphicon glyphicon-user visible-xs visible-sm" aria-hidden="true"></span><span class="visible-lg visible-md">Empresa</span></label>
			  <input type="text" id="empresa_trabalha" name="empresa_trabalha" class="form-control" placeholder="Empresa" aria-describedby="label_empresa" onkeyup="maiuscula(this)">
			  
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-4">
			<div class="input-group">
			  <label class="input-group-addon" for="telefone1" id="label_telefone1"><span class="glyphicon glyphicon-phone visible-xs visible-sm" aria-hidden="true"></span><span class="visible-lg visible-md">Fone 01</span></label>
			  <input type="text" id="telefone1" name="telefone1" class="form-control" placeholder="Telefone 01" aria-describedby="label_telefone1" required>
			  <div class="input-group-addon"><span class="glyphicon glyphicon-star" aria-hidden="true"></span></div>
			</div>
		</div>
		<div class="col-xs-4">
			<div class="input-group">
			  <label class="input-group-addon" for="telefone2" id="label_telefone2"><span class="glyphicon glyphicon-phone visible-xs visible-sm" aria-hidden="true"></span><span class="visible-lg visible-md">Fone 02</span></label>
			  <input type="text" id="telefone2" name="telefone2" class="form-control" placeholder="Telefone 02" aria-describedby="label_telefone2">
			</div>
		</div>
		<div class="col-xs-4">
			<div class="input-group">
			  <label class="input-group-addon" for="telefone3" id="label_telefone3"><span class="glyphicon glyphicon-phone-alt visible-xs visible-sm" aria-hidden="true"></span><span class="visible-lg visible-md">Fone 03</span></label>
			  <input type="text" id="telefone3" name="telefone3" class="form-control" placeholder="Telefone 03" aria-describedby="label_telefone3">
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-3">
			<div class="input-group">
			  <label class="input-group-addon" for="email" id="label_email"><span class="glyphicon glyphicon-envelope visible-xs visible-sm" aria-hidden="true"></span><span class="visible-lg visible-md">E-mail</span></label>
			  <input onblur="isEmail(this)" type="text" id="email" name="email" class="form-control" placeholder="email@email.com" aria-describedby="label_email" onkeyup="minuscula(this)">
			</div>
		</div>
		<div class="col-xs-3">
			<div class="input-group">
			  <label class="input-group-addon" for="site" id="label_site"><span class="glyphicon glyphicon-globe visible-xs visible-sm" aria-hidden="true"></span><span class="visible-lg visible-md">Site</span></label>
			  <input type="text" id="site" name="site" class="form-control" placeholder="www.site.com.br" aria-describedby="label_site">
			</div>
		</div>
		<div class="col-xs-3">
			<div class="input-group">
			  <label class="input-group-addon" for="cidade" id="label_cidade"><span class="glyphicon glyphicon-flag visible-xs visible-sm" aria-hidden="true"></span><span class="visible-lg visible-md">Cidade</span></label>
			  <input type="text" id="cidade" name="cidade" class="form-control" placeholder="Cidade" aria-describedby="label_cidade">
			</div>
		</div>
		<div class="col-xs-2">
			<div class="input-group">
			  <label class="input-group-addon" for="uf" id="label_uf"><span class="glyphicon glyphicon-flag visible-xs visible-sm" aria-hidden="true"></span><span class="visible-lg visible-md">UF</span></label>
			  <select id="uf" name="uf" class="form-control" aria-describedby="label_uf">
			  	<option value="PA">PA</option>
			  	<option value="AM">AM</option>
			  </select>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="input-group">
			  <label class="input-group-addon" for="observacao" id="label_observacao"><span class="glyphicon glyphicon-comment visible-xs visible-sm" aria-hidden="true"></span><span class="visible-lg visible-md">Observação</span></label>
			  <textarea id="observacao" name="observacao"class="form-control" placeholder="Descrição livre" aria-describedby="label_observacao"></textarea> 
			</div>
		</div>
	</div>
	<div class="row"></div>
	<span class="btn btn-primary btn-lg" onclick="salvarContato('formulario')">SALVAR</span>
	</form>
	<div id="resposta"></div>

</div>


<?php include $_SERVER["DOCUMENT_ROOT"]."/padrao/footer.php"; ?>