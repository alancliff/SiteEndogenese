<?php

include "../includes/conexao.php";
//recebe o email para consulta;
$id_relacao = $_POST['id_relacao'];

//prepara a query;
$sql_compareceu = $conexao->prepare("UPDATE relacao
		SET compareceu = true, data_compareceu = '".date("Y-m-d H:i:s")."'
		WHERE id_relacao=$id_relacao");
		
//execulta a query;
$sql_compareceu->execute();
	//verifica se retornou valor;
	if ($sql_compareceu->rowCount() > 0)
		{	
			echo "<span class='bg-success' style='color: green; width: 200px; padding: 10px 4px 10px 4px; border-radius: 5px; display:block; margin-top: 5px;'> Código marcado como usado!</span>";
		}
		else
		{
			echo "<span class='bg-danger' style='color: red; width: 220px; padding: 10px 4px 10px 4px; border-radius: 5px; display:block; margin-top: 5px;'> Não foi possivel confirmar o uso.</span>";
		}
?>