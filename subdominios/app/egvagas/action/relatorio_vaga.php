<?php
include $_SERVER["DOCUMENT_ROOT"]."/padrao/conexao_egvagas.php";

$id_vaga = $_POST["id_vaga"];

$detalhe_vaga = ("SELECT a.*, b.emp_email, b.fantasia, b.emp_telefone_a, b.emp_telefone_b,
				b.setor_predominante, b.responsavel, b.emp_logradouro, b.emp_num, b.observacao, b.emp_comp, 
				b.emp_bairro, b.emp_cidade, b.emp_uf, b.emp_site, b.latitude, b.longitude
				FROM vagas a 
				INNER JOIN empresas b on a.id_empresa = b.id_empresa
				WHERE a.id_vaga = $id_vaga");
$detalhe_vaga = $conexao->prepare($detalhe_vaga);

//Prepara a lista de vagas a serem enviadas;
try
{
 $detalhe_vaga->execute();
}
catch(PDOException $e){
  echo $e->getMessage();
  $arr = $sql->errorInfo();
  print_r($arr);
}

if ($detalhe_vaga->rowCount() > 0) 
{
	while ($vaga_item = $detalhe_vaga->fetch(PDO::FETCH_ASSOC) )
			{
				echo "
					<h3><span style='font-weight: bold;'>EMPRESA: </span>$vaga_item[fantasia]</h3>
					<p><span style='font-weight: bold;'>Cargo: </span>$vaga_item[cargo]</p>

					<p><span style='font-weight: bold;'>Formação Exigida: </span>$vaga_item[formacao_exg]</p>

				<p><span style='font-weight: bold;'>Vagas: </span>$vaga_item[qtde_ofertada]</p>
				<p><span style='font-weight: bold;'>Vagas PNE: </span>$vaga_item[qtde_pne]</p>
				<p><span style='font-weight: bold;'>Escolaridade: </span>$vaga_item[escolaridade_exg]</p>

					<p><span style='font-weight: bold;'>Período de Trabalho: </span>";

					if ($vaga_item['trab_matutino']) {
						echo "<span style='text-align: left;'>Matutino <span class='glyphicon glyphicon-ok' aria-hidden='true'></span></span>";
					}
					else
					{
						echo "<span style='text-align: left;'>Matutino <span class='glyphicon glyphicon-remove' aria-hidden='true'></span></span>";
					}
					echo " | ";
					if ($vaga_item['trab_vespertino']) {
						echo "<span style='text-align: left;'>Vespertino <span class='glyphicon glyphicon-ok' aria-hidden='true'></span></span>";
					}
					else
					{
						echo "<span style='text-align: left;'>Vespertino <span class='glyphicon glyphicon-remove' aria-hidden='true'></span></span>";
					}
					echo " | ";
					if ($vaga_item['trab_noturno']) {
						echo "<span style='text-align: left;'>Noturno <span class='glyphicon glyphicon-ok' aria-hidden='true'></span></span>";
					}
					else
					{
						echo "<span style='text-align: left;'>Noturno <span class='glyphicon glyphicon-remove' aria-hidden='true'></span></span>";
					}
	
			echo "

	  <p><span style='font-weight: bold;'>Habilidades Básicas: </span>$vaga_item[habilidades_basicas]</p>
	  <p><span style='font-weight: bold;'>Habilidades Desejáveis: </span>$vaga_item[habilidades_desejaveis]</p>
	  <p><span style='font-weight: bold;'>Descrição das atividades: </span>$vaga_item[descricao_atividades]</p>
	  <p><span style='font-weight: bold;'>Descrição PNE: </span>$vaga_item[descricao_pne]</p>

					<p><span style='font-weight: bold;'>Salário: </span>";

					if ($vaga_item[salario] <> "") {
						echo number_format($vaga_item[salario], 2, ',', '.');
					}
					else
					{
						echo "A combinar";
					}
				echo "</p>
				<p><span style='font-weight: bold;'>Comissão: </span>$vaga_item[comissao]</p>
				<p><span style='font-weight: bold;'>Necess. Viajar: </span>$vaga_item[viagem_frequente]</p>
				<p><span style='font-weight: bold;'>Periodicidade de pagamento: </span>$vaga_item[periodicidade_pagamento]</p>
				<p><span style='font-weight: bold;'>Tempo de Experiência: </span>$vaga_item[tempo_exp_exg]</p>
				<p><span style='font-weight: bold;'>C.H. Semanal: </span>$vaga_item[carga_semanal]</p>
				<p><span style='font-weight: bold;'>Duração do Emprego: </span>$vaga_item[duracao_emprego]</p>
				<p><span style='font-weight: bold;'>Gênero de Preferência: </span>$vaga_item[genero_preferencia]</p>
				<span class='btn btn-success nao_impresso' onclick='window.print();'>IMPRIMIR</span>
				";



}
}
 




?>