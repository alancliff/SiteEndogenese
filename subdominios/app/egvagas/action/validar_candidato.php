<?php
include $_SERVER["DOCUMENT_ROOT"]."/padrao/conexao_egvagas.php";
require $_SERVER["DOCUMENT_ROOT"]."/padrao/constantes.php"; 

$id_pessoa = $_POST["id"];
$emailMD5 = $_POST["cod"]; 
$dataMD5 = $_POST["dti"]; 


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
	$sql_confirma = $conexao->prepare("UPDATE pessoas
										SET ativa = true
										WHERE id_pessoa = $id_pessoa");
	if ($sql_confirma->execute())
	{
		echo "<p class='titulo1 fonte-lg bg-success'>PARABÉNS! <span class='glyphicon glyphicon-thumbs-up pull-right' aria-hidden='true'></span></p><p class='titulo1 fonte-md'>Seu e-mail foi validado com sucesso!</p>
		<p class='fonte-xs'>A partir de agora você receberá informações sobre Oportunidades de Emprego!
		Não esqueça de adicionar nosso e-mail (egvagas@endogenese.com.br) aos seus contatos, para que a comunicação não caia na sua caixa de span (lixo eletrônico).
		<br><br>Acesse as últimas vagas cadastradas!</p>
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
<p class='titulo1 fonte-md'>As informaçãos de validação não conferem. Seu cadastro não foi validado.<p>
<p class='fonte-xs'>Se precisar de auxílio, entre em contato com o nosso suporte: suporte@endogenese.com.br</p>
<br><a class='btn btn-default btn-voltar' href='".SITE."/vagas'>PÁGINA PRINCIPAL</a>";


}

?>