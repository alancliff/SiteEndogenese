<?php
//inclui arquivo de conexão
include "../includes/conexao.php";
//recebe a fantasia para consulta;
$fantasia = $_POST['fantasia'];
//recebe o cnpj para consulta;
$cnpj = $_POST['cnpj'];


//prepara a query;
if ($cnpj == "")
{
	$sql = "SELECT id_empresa, fantasia, cnpj
		FROM empresas
		WHERE fantasia LIKE '%$fantasia%' ";
}
else
{	
	$sql = "SELECT id_empresa, fantasia, cnpj
		FROM empresas
		WHERE cnpj LIKE '%$cnpj%' ";

}


$sql = $conexao->prepare($sql);
$sql->execute();



// //se retornou, captura os dados retornados
if($sql->rowCount() > 0){
	echo "<div class='row'>
						<div class='col-xs-2'>ID</div>
						<div class='col-xs-4'>Fantasia</div>
						<div class='col-xs-3'>CNPJ</div>
						<div class='col-xs-3'>Botão</div>";
	
	while ($empresa_item = $sql->fetch(PDO::FETCH_ASSOC) )
			{
				echo "<div class='col-xs-2'>$empresa_item[id_empresa]</div>
						<div class='col-xs-4'>$empresa_item[fantasia]</div>
						<div class='col-xs-3'>$empresa_item[cnpj]</div>
						<div class='col-xs-3'><span class='btn btn-default' onclick='Incluir($empresa_item[id_empresa])'>INCLUIR</span></div>";
			}
	echo "</div>";
						
					
}
else
{
	echo "não encontrado.";
}
?>