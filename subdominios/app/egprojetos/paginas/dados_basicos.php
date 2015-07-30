<?php
include "../includes/conexao.php";

$sql_geral = ("SELECT *
				FROM profissionais
				WHERE id_profissional = $id_profissional");
// $a = $sql_geral;
$sql_geral = $conexao->prepare($sql_geral);
$sql_geral->execute();
	//verifica se retorna linhas;

	if ($sql_geral->rowCount() > 0)
		{	
			//se retornou, captura os dados e trata para exibição;
			while ($valor = $sql_geral->fetch(PDO::FETCH_ASSOC) )
			{
echo "Dados básicos";

?>