<?php 

require $_SERVER["DOCUMENT_ROOT"]."/protecao/protecao_login.php";

$login_mestre = $_SESSION['login_mestre'];
$modulo = 'admin';
$subtitulo = "Perfil";

include $_SERVER["DOCUMENT_ROOT"]."/padrao/constantes.php";
include $_SERVER["DOCUMENT_ROOT"]."/padrao/header.php";
include $_SERVER["DOCUMENT_ROOT"]."/padrao/menu.php";
include $_SERVER["DOCUMENT_ROOT"]."/padrao/conexao_login.php";


$sql = "SELECT * FROM mestre WHERE login_mestre = '$login_mestre'";
$sql = $conexao->prepare($sql);
$sql->execute();

if ($sql->rowCount() > 0)
	{	
			while ($dados = $sql->fetch(PDO::FETCH_ASSOC) )
			{



?>

<div class="container">


	<div class='titulo'>EDITAR PERFIL - <?php echo $dados[nome_mestre];?></div>
	<div style="margin-bottom: 30px">
	<form id="perfil">
	<input type="hidden" id="id_mestre" name="id_mestre" value="<?php echo $dados[id_mestre]; ?>">
	<div class="row">
		<div class="col-xs-8 col-sm-5">
			<div class="input-group">
			  <label class="input-group-addon" for="login_mestre" id="label_login_mestre"><span>Login</span></label>
			  <input type="text" id="login_mestre" name="login_mestre" required class="form-control" placeholder="login" aria-describedby="label_login_mestre" onkeyup="minuscula(this)" value="<?php echo $dados[login_mestre]; ?>" disabled>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-8 col-sm-5">
			<div class="input-group">
			  <label class="input-group-addon" for="nome_mestre" id="label_nome_mestre"><span>Nome</span></label>
			  <input type="text" id="nome_mestre" name="nome_mestre" value="<?php echo $dados[nome_mestre]; ?>"required class="form-control" aria-describedby="label_nome_mestre" placeholder="Nome">
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-xs-8 col-sm-5">
			<div class="input-group">
			  <label class="input-group-addon" for="email_mestre" id="label_email_mestre"><span>E-mail</span></label>
			  <input type="text" id="email_mestre" name="email_mestre" value="<?php echo $dados[email_mestre]; ?>"required class="form-control" aria-describedby="label_email_mestre" onkeyup="minuscula(this)" placeholder="email@email.com">
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-8 col-sm-5">
			<div class="input-group">
			  <label class="input-group-addon" for="senha_mestre" id="label_senha_mestre"><span>Senha Atual</span></label>
			  <input type="password" id="senha_mestre" name="senha_mestre" required class="form-control" aria-describedby="label_senha_mestre">
			</div>
		</div>
	</div>
	<div class="row"></div>

	<div class="row">
		<div class="col-xs-8 col-sm-5">
			<div class="input-group">
			  <label class="input-group-addon" for="n_senha_mestre" id="label_n_senha_mestre"><span>Nova Senha</span></label>
			  <input type="password" id="n_senha_mestre" name="n_senha_mestre" class="form-control" aria-describedby="label_n_senha_mestre">
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-8 col-sm-5">
			<div class="input-group">
			  <label class="input-group-addon" for="conf_senha" id="label_conf_senha"><span>Confirmação da Senha</span></label>
			  <input type="password" id="conf_senha" name="conf_senha" class="form-control" aria-describedby="label_conf_senha">
			</div>
		</div>
	</div>


		<span class="btn btn-success btn-lg" onclick="atualizaPerfil('perfil')">Atualizar</span>
		<a class="btn btn-default btn-lg pull-rigth" href="<?php echo APP; ?>">Voltar</a>
	</form>

	<div id="resposta"></div>
</div>

<?php 
	}
}

include $_SERVER["DOCUMENT_ROOT"]."/padrao/footer.php"; ?>