<?php
include "../includes/conexao.php";


$id_empresaweb = $_POST["id_empresaweb"];
$email_empresa = $_POST["email_empresa"];
$telefone = $_POST["telefone"];
$senha_empresa = md5(sha1($_POST["senha_empresa"]));
//Comente a linha acima e descomente a linha abaixo para inserir a empresa diretamente no
//banco e atualizar com senha criptografada pelo painel administrativo. 
//Depois deixe como está.
//Faça o mesmo no arquivo /action/autenticar.php
// $senha_empresa = $_POST["senha_empresa"];

$nova_senha=md5(sha1($_POST["nova_senha"]));



$sql = $conexao->prepare("SELECT id_empresaweb
		FROM empresaweb
		WHERE id_empresaweb = $id_empresaweb
		AND senha_empresa = '$senha_empresa'");


$sql->execute();
if ($sql->rowCount() <> 1) {
	echo "Não foi possível autenticar. Verifique a senha atual.";
	die();
}
if ($nova_senha == "") {
	$sql = $conexao->prepare("UPDATE empresaweb
		SET email_empresa='$email_empresa',
		telefone = '$telefone'
		WHERE id_empresaweb=$id_empresaweb");
}
else
{
	$sql = $conexao->prepare("UPDATE empresaweb
		SET email_empresa='$email_empresa',
		telefone = '$telefone',
		senha_empresa='$nova_senha'
		WHERE id_empresaweb=$id_empresaweb");
}


$sql->execute();

if ($sql->rowCount() == 1) {
	session_start();
	$_SESSION['email_empresa']     = $email_empresa;	
    $_SESSION['telefone']     = $telefone;
	echo "<span class='bg-success' style='color: green; padding: 10px 4px 10px 4px; border-radius: 5px; display:block; margin-top: 5px;'> Atualização realizada com sucesso.</span>";
}
else
{
	echo "<span class='bg-danger' style='color: red; padding: 10px 4px 10px 4px; border-radius: 5px; display:block; margin-top: 5px;'> Houve problemas na Atualização.</span>";

}

?>
