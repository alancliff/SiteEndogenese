<?php
$modulo = 'egcontatos';
$subtitulo = 'EG Contatos :: Prospecção';
require $_SERVER["DOCUMENT_ROOT"]."/protecao/protecao_login.php";
include $_SERVER["DOCUMENT_ROOT"]."/padrao/constantes.php";
include $_SERVER["DOCUMENT_ROOT"]."/padrao/header.php";
include $_SERVER["DOCUMENT_ROOT"]."/padrao/menu.php";
?>
<script src="<?php echo BASE.'/js/maskMoney.min.js';?>" type="text/javascript"></script>

<div class="container topo_pagina">

	<img class="titulo_img" src="/egcontatos/img/egcontatos.png">
	<h1 class="titulo_agenda bg-info">PROSPECÇÃO DE CLIENTES</h1>
	<span class="btn btn-warning btn-lg" onclick="voltarHome()">Voltar para EG Contatos</span>

	<div class="row" style="margin-top:20px;">
		<div class="col-xs-4">
			<span class="btn btn-primary btn-xs" onclick="listaCompleta()">Lista Completa</span>
			<span class="btn btn-primary btn-xs" onclick="relatorioProspeccao()">Resumo</span>
		</div>
		<div class="col-xs-3">
			<div class="input-group">
			  <label class="input-group-addon" for="consultor" id="label_consultor">Consultor</label>
			  <select id="consultor" name="consultor" class="form-control" aria-describedby="label_consultor">
			  	<option value="" selected>Selecione</option>
			  	<option value="Alan Cliff">Alan Cliff</option>
				<option value="Cristiano Ghizoni">Cristiano Ghizoni</option>
				<option value="Glauco Fernandes">Glauco Fernandes</option>
				<option value="Wanderson Sousa">Wanderson Sousa</option>
			  </select>
			</div>
		</div>
		<div class="col-xs-3">
			<div class="input-group">
			  <label class="input-group-addon" for="prioridade" id="label_prioridade">Prioridade</label>
			  <select id="prioridade" name="prioridade" class="form-control" aria-describedby="label_prioridade">
			  	<option value="" selected>Selecione</option>
			  	<option value="A">A</option>
				<option value="B">B</option>
				<option value="C">C</option>
			  </select>
			</div>
		</div>
		<div class="col-xs-2 ">
			<span class="btn btn-primary" onclick="listaSimples()">Filtrar</span>
		</div>
	</div>
	<br>
	<div id="resposta"></div>
	<script type="text/javascript">listaCompleta();</script>

	<!-- MODAL CONTATO-->
<div class="modal fade" id="ModalContato" tabindex="-1" role="dialog" aria-labelledby="ModalContatoLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div style="text-align: center;"><img src='/img/load.gif'></div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<!-- MODAL CONTATO-->

</div>


<?php include $_SERVER["DOCUMENT_ROOT"]."/padrao/footer.php"; ?>