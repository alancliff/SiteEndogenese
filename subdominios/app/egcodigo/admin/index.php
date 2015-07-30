<?php 

require $_SERVER["DOCUMENT_ROOT"]."/egcodigo/action/protecao_login.php";
require $_SERVER["DOCUMENT_ROOT"]."/egcodigo/modelos/header.php"; 
$id_empresaweb = $_SESSION['id_empresaweb'];
?>

<div style="margin:40px;"></div>
<?php 
echo "<div class='row bg-success'><div class='col-xs-6'><input type='hidden' value='$id_empresaweb' name='id_empresaweb' id='id_empresaweb'>";
echo "<div style='color:green; font-weight: bold;' >Olá <a href='/egcodigo/admin/perfil.php'>$_SESSION[nome_empresa]</a><br>$_SESSION[email_empresa]</div></div>";

echo "<div class='col-xs-6'><span class='btn btn-danger' onclick='sair()' style='float:right;'>SAIR</span></div></div>"; 

?>


<hr>
<div id="relatorio">
	<script type="text/javascript">
	geraRelatorio();
	</script>
</div>
<hr>
<div class='titulo' style="width: 200px; margin-bottom: 20px; margin-top: 20px;"><div style="margin: 0px 15px 0px 15px;">Consultar Código:</div></div>
<div style="margin-bottom: 30px">
<div class="input-group input-group-lg" style="width:170px; float:left">
	<span class="input-group-addon" id="leg-codigo"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span> </span>
	<input type="text" name="codigo" id="codigo" class="form-control" maxlength="8" size="10" placeholder="XXXXXX" aria-describedby="leg-codigo">
</div>

<span class="btn btn-success btn-lg" onclick="consultaCodigo()" style="margin-left: 30px">Consultar</span>
<span style="float:right" class="btn btn-success btn-lg" onclick="listaGeral(1)" style="margin-left: 30px">Listar TODOS</span>
</div>

<div class="row titulo" >
	<div class="col-xs-4">Nome

		
	</div>
	<div class="col-xs-3">e-mail
		
	</div>
	<div class="col-xs-3">Celular
		
	</div>
	<div class="col-xs-2">Usado?</div>
</div>
<div id="consulta_resultado"></div>
<div id="confirma_uso"></div>

</div>
 
<?php require $_SERVER["DOCUMENT_ROOT"]."/egcodigo/modelos/footer.php"; ?>