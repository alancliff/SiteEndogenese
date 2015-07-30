<?php
include $_SERVER["DOCUMENT_ROOT"]."/padrao/conexao_egvagas.php";

$tabela = $_POST['tabela'];

if ($tabela == "vagas")
{
	$sql = ("SELECT sum(qtde_ofertada) as contagem
					FROM $tabela
					WHERE ativa = true");
}
else
{
	$sql = ("SELECT count(*) as contagem
					FROM $tabela
					WHERE ativa = true");
}
	$sql = $conexao->prepare($sql);


	if ($sql->execute())
	{
		while ($dado = $sql->fetch(PDO::FETCH_OBJ))
		{
			echo $dado->contagem;
		}
	}
	else
	{
		echo $sql->errorInfo();
	}




?>