<?php
include $_SERVER["DOCUMENT_ROOT"]."/padrao/conexao_egvagas.php";
require $_SERVER["DOCUMENT_ROOT"]."/padrao/constantes.php"; 

$id_pessoa = $_POST["id"];
$emailMD5 = $_POST["cod"]; 
$dataMD5 = $_POST["dti"]; 





	// try
	// {
	//  $sql_excluir->bindParam(":pes_email", $pes_email , PDO::PARAM_STR);
	//  $sql_excluir->execute();
	// }
	//   catch(PDOException $e){
	//   echo $e->getMessage();
	//   $arr = $sql_excluir->errorInfo();
	//   print_r($arr);
	// }

$sql_verifica = $conexao->prepare("SELECT pes_email, dt_inclusao
									FROM pessoas
									WHERE id_pessoa = $id_pessoa");
if ($sql_verifica->execute())
{
	while ($dados = $sql_verifica->fetch(PDO::FETCH_OBJ)){
		$pes_email = md5($dados->pes_email);
		$dt_inclusao = md5($dados->dt_inclusao);
	}

}
else
{
	echo "As informaçãos de validação não conferem. Seu cadastro não foi validado. Entre em contato com o suporte.";	
}

if ($emailMD5 == $pes_email && $dataMD5 == $dt_inclusao)
{
	$sql_excluir = $conexao->prepare("DELETE FROM pessoas
		WHERE id_pessoa = $id_pessoa");
	if ($sql_excluir->execute())
	{
		echo "<p class='titulo1 fonte-lg bg-success'>SUCESSO! <span class='glyphicon glyphicon-thumbs-up pull-right' aria-hidden='true'></span></p><p class='titulo1 fonte-md'>O seu cadastro foi excluído com sucesso!</p>
		<p class='fonte-xs'>A partir de agora você não mais receberá informações sobre Oportunidades de Emprego via e-mail!<br>
		Entretanto, você ainda pode acessar as informações gratuitamente por meio do site.
		<br><br>Fique à vontade para acessar as últimas vagas cadastradas!</p>
		<br><a class='btn btn-default btn-voltar' href='".SITE."/vagas'>MOSTRAR VAGAS</a>";
	}
	else
	{
		echo "Ocorreu um erro na validação. Entre em contato com o suporte.";
	}
	
}
else
{

echo "<p class='titulo1 fonte-lg bg-danger'>ERRO! <span class='glyphicon glyphicon-thumbs-down pull-right' aria-hidden='true'></span>  </p>
<p class='titulo1 fonte-md'>As informaçãos para confirmar a exclusão do cadastro não conferem, ou talvez seu cadastro já tenha sido excluído.<p>
<p class='fonte-xs'>Se precisar de auxílio, entre em contato com o nosso suporte: suporte@endogenese.com.br. </p>
<br><a class='btn btn-default btn-voltar' href='".SITE."/vagas'>PÁGINA PRINCIPAL</a>";


}

?>