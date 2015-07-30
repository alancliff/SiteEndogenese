<?php
/* ========================================================================
 * EG Profissionais - consulta_por_nome.php  V. 1.0
 * Endogênese Consultoria e Serviços LTDA
 * ========================================================================
 * Finalidade: Consulta o profissional conforme o nome digitado.
 * Autor: Alan Cliff
 * Última Atualização - 20/05/2015
 * ======================================================================== */
//inclui arquivo de conexão
include "../includes/conexao.php";
//recebe o nome para consulta;
$nome_conhecido = $_POST['nome_conhecido'];



//prepara a query;

	$sql = "SELECT id_profissional, nome_conhecido, profissao
		FROM profissionais
		WHERE nome_conhecido LIKE '%$nome_conhecido%' ";


$sql = $conexao->prepare($sql);
$sql->execute();



// //se retornou, captura os dados retornados
if($sql->rowCount() > 0){
	echo "<div class='row'>
						<div class='col-xs-2'>ID</div>
						<div class='col-xs-4'>Nome</div>
						<div class='col-xs-3'>Profissão</div>
						<div class='col-xs-3'>Botão</div></div>";
	echo "<div class='row'>";
	while ($profissional = $sql->fetch(PDO::FETCH_ASSOC) )
			{
				echo "<div class='col-xs-2'>$profissional[id_profissional]</div>
						<div class='col-xs-4'>$profissional[nome_conhecido]</div>
						<div class='col-xs-3'>$profissional[profissao]</div>
						<div class='col-xs-3'><span class='btn btn-default'  data-toggle='modal' data-target='#ModalEditCadastro' data-idprofissional='$profissional[id_profissional]'>EDITAR</span></div>";
			}
	echo "</div>";
						
					
}
else
{
	echo "não encontrado.";
}
?>