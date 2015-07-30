<?php
$modulo = 'egcontatos';
$subtitulo = 'EG Contatos';
require $_SERVER["DOCUMENT_ROOT"]."/protecao/protecao_login.php";
include $_SERVER["DOCUMENT_ROOT"]."/padrao/constantes.php";
include $_SERVER["DOCUMENT_ROOT"]."/padrao/header.php";
include $_SERVER["DOCUMENT_ROOT"]."/padrao/menu.php";
?>
<script src="<?php echo BASE.'/js/maskMoney.min.js';?>" type="text/javascript"></script>

<div class="container topo_pagina" >


<img class="titulo_img" src="/egcontatos/img/egcontatos.png">
<h1 class="titulo_agenda bg-info">CONTATOS</h1>
<div class="row">
	<div class="col-xs-6">
		<div class="input-group input-group-lg">
		  <label class="input-group-addon" id="label_pesquisa" for="nome_contato"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></label>
		  <input id="nome_contato" type="text" class="form-control" placeholder="PESQUISE..." aria-describedby="label_pesquisa" onkeyup="pesquisarContato(this.value, 'qualquer')">
		</div>
	</div>
	<div class="col-xs-6">
		<a href="/egcontatos/admin/form-incluir-contato.php" class="btn btn-warning btn-lg">Inserir novo contato</a>
		<a href="/egcontatos/admin/prospeccao_clientes.php" class="btn btn-success btn-lg">Prospecção</a>
	</div>
</div>

<br>

<div class="lista_alfabetica">
	<span onclick="ativa(this), pesquisarContato('a')">A</span>
	<span onclick="ativa(this), pesquisarContato('b')">B</span>
	<span onclick="ativa(this), pesquisarContato('c')">C</span>
	<span onclick="ativa(this), pesquisarContato('d')">D</span>
	<span onclick="ativa(this), pesquisarContato('e')">E</span>
	<span onclick="ativa(this), pesquisarContato('f')">F</span>
	<span onclick="ativa(this), pesquisarContato('g')">G</span> 
	<span onclick="ativa(this), pesquisarContato('h')">H</span> 
	<span onclick="ativa(this), pesquisarContato('i')">I</span> 
	<span onclick="ativa(this), pesquisarContato('j')">J</span> 
	<span onclick="ativa(this), pesquisarContato('k')">K</span> 
	<span onclick="ativa(this), pesquisarContato('l')">L</span> 
	<span onclick="ativa(this), pesquisarContato('m')">M</span>
	<span onclick="ativa(this), pesquisarContato('n')">N</span> 
	<span onclick="ativa(this), pesquisarContato('o')">O</span> 
	<span onclick="ativa(this), pesquisarContato('p')">P</span> 
	<span onclick="ativa(this), pesquisarContato('q')">Q</span> 
	<span onclick="ativa(this), pesquisarContato('r')">R</span> 
	<span onclick="ativa(this), pesquisarContato('s')">S</span> 
	<span onclick="ativa(this), pesquisarContato('t')">T</span> 
	<span onclick="ativa(this), pesquisarContato('u')">U</span> 
	<span onclick="ativa(this), pesquisarContato('v')">V</span> 
	<span onclick="ativa(this), pesquisarContato('w')">W</span> 
	<span onclick="ativa(this), pesquisarContato('x')">X</span> 
	<span onclick="ativa(this), pesquisarContato('y')">Y</span> 
	<span onclick="ativa(this), pesquisarContato('z')">Z</span>
</div>

<div id="resposta" style="margin-top:15px;"></div>

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