<?php 
require $_SERVER["DOCUMENT_ROOT"]."/egcodigo/action/protecao_login.php";
require $_SERVER["DOCUMENT_ROOT"]."/egcodigo/modelos/header.php"; 
$id_empresaweb = $_SESSION['id_empresaweb'];



echo "<input type='hidden' value='$id_empresaweb' name='id_empresaweb' id='id_empresaweb'>";
?>


<div class='titulo' style="width: 200px; margin-bottom: 20px; margin-top: 20px;"><div style="margin: 0px 15px 0px 15px;">Editar perfil:</div></div>
<div style="margin-bottom: 30px">
<div class="row">
	<div class="col-xs-4">
		Nome: <?php echo $_SESSION['nome_empresa']; ?>
	</div>
</div>
<div class="row">
	<div class="col-xs-4">
		CNPJ: <?php echo $_SESSION['cnpj']; ?>
	</div>
</div>
<div class="row">
	<div class="col-xs-6">
		E-mail: <input type="email" name="email_emp" id="email_emp" value="<?php echo $_SESSION['email_empresa']; ?>" size="30">
	</div>
</div>
<div class="row">
	<div class="col-xs-6">
		Telefone: <input type="text" name="fone_emp" id="fone_emp" value="<?php echo $_SESSION['telefone']; ?>" size="15">
	</div>
</div>

<div class="row">
	<div class="col-xs-6">
		Nova Senha: <input type="password" name="nova_senha" id="nova_senha" size="15">
	</div>
</div>
<div class="row">
	<div class="col-xs-6">
		Confirma Senha: <input type="password" name="conf_senha" id="conf_senha" size="15">
	</div>
</div>

<hr style="width: 30%; margin-left: 0px">

<div class="row">
	<div class="col-xs-6">
		Senha Atual: <input type="password" name="senha_atual" id="senha_atual" size="15">
	</div>
</div>
<span class="btn btn-success btn-lg" onclick="atualizaPerfil()" style="margin-left: 30px">Atualizar</span>
<span class="btn btn-default btn-lg" onclick="voltar()" style="margin-left: 30px">Voltar</span>


<div id="resposta_perfil"></div>

<?php require $_SERVER["DOCUMENT_ROOT"]."/egcodigo/modelos/footer.php"; ?>