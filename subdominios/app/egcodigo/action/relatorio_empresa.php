<?php
include "../includes/conexao.php";
	
	$id_empresaweb = $_POST['id_empresaweb'];
	//QUERYS E FETCHS DOS TOTAIS;
	$sql = 	$conexao->prepare("SELECT count(a.id_relacao) as c_dia 
				FROM relacao a
				WHERE a.data_inclusao > (now()-interval 1 day)
				AND a.id_empresaweb = $id_empresaweb");
	//verifica se retorna linhas;
	$sql->execute();
	if ($sql->rowCount() > 0)
		{	
			//se retornou, captura os dados retornados
			while ($valor = $sql->fetch(PDO::FETCH_ASSOC))
			{
				$c_dia = $valor['c_dia'];
			}
		}
	$sql = $conexao->prepare("SELECT count(a.id_relacao) as c_semana 
				FROM relacao a
				WHERE a.data_inclusao > (now()-interval 7 day)
				AND a.id_empresaweb = $id_empresaweb");
	$sql->execute();
	if ($sql->rowCount() > 0)
		{	
			while ($valor = $sql->fetch(PDO::FETCH_ASSOC))
			{
				$c_semana = $valor['c_semana'];
			}
		}
	$sql = 	$conexao->prepare("SELECT count(a.id_relacao) as c_mes 
				FROM relacao a
				WHERE a.data_inclusao > (now()-interval 30 day)
				AND a.id_empresaweb = $id_empresaweb");
	$sql->execute();
	if ($sql->rowCount() > 0)
		{	
			while ($valor = $sql->fetch(PDO::FETCH_ASSOC) )
			{
				$c_mes = $valor['c_mes'];
			}
		}
	$sql = $conexao->prepare("SELECT count(a.id_relacao) as c_geral 
				FROM relacao a
				WHERE a.id_empresaweb = $id_empresaweb");
	$sql->execute();
	if ($sql->rowCount() > 0)
		{	
			while ($valor = $sql->fetch(PDO::FETCH_ASSOC)  )
			{
				$c_geral = $valor['c_geral'];
			}
		}
	//QUERYS E FETCHS DOS COMPARECIMENTOS;
	$sql = $conexao->prepare("SELECT count(a.id_relacao) as comp_dia 
				FROM relacao a
				WHERE a.data_compareceu > (now()-interval 1 day)
				AND a.compareceu = true
				AND a.id_empresaweb = $id_empresaweb");
	$sql->execute();
	if ($sql->rowCount() > 0)
		{	
			while ($valor = $sql->fetch(PDO::FETCH_ASSOC)  )
			{
				$comp_dia = $valor['comp_dia'];
			}
		}
	$sql = $conexao->prepare("SELECT count(a.id_relacao) as comp_semana 
				FROM relacao a
				WHERE a.data_compareceu > (now()-interval 7 day)
				AND a.compareceu = true
				AND a.id_empresaweb = $id_empresaweb");
	$sql->execute();
	if ($sql->rowCount() > 0)
		{	
			while ($valor = $sql->fetch(PDO::FETCH_ASSOC)  )
			{
				$comp_semana = $valor['comp_semana'];
			}
		}
	$sql = $conexao->prepare("SELECT count(a.id_relacao) as comp_mes 
				FROM relacao a
				WHERE a.data_compareceu > (now()-interval 30 day)
				AND a.compareceu = true
				AND a.id_empresaweb = $id_empresaweb");
	$sql->execute();
	if ($sql->rowCount() > 0)
		{	
			while ($valor = $sql->fetch(PDO::FETCH_ASSOC)  )
			{
				$comp_mes = $valor['comp_mes'];
			}
		}
	$sql = $conexao->prepare("SELECT count(a.id_relacao) as comp_geral 
				FROM relacao a
				WHERE a.id_empresaweb = $id_empresaweb
				AND a.compareceu = true");
	$sql->execute();
	if ($sql->rowCount() > 0)
		{	
			while ($valor = $sql->fetch(PDO::FETCH_ASSOC)  )
			{
				$comp_geral = $valor['comp_geral'];
			}
		}
	$sql= $conexao->prepare("SELECT count(a.id_relacao) as comp 
		FROM relacao a
		WHERE a.compareceu = true
		AND a.id_empresaweb = $id_empresaweb");
	$sql->execute();
	if ($sql->rowCount() > 0)
		{	
			while ($valor = $sql->fetch(PDO::FETCH_ASSOC)  )
			{
				$comp = $valor['comp'];
			}
		}
	$sql=$conexao->prepare("SELECT count(a.id_relacao) as geral 
		FROM relacao a
		WHERE a.id_empresaweb = $id_empresaweb");
	$sql->execute();
	if ($sql->rowCount() > 0)
		{	
			while ($valor = $sql->fetch(PDO::FETCH_ASSOC)  )
			{
				$geral = $valor['geral'];
			}
		}
	
	$comp = number_format(($comp/$geral*100), 0, ',', '.');
	$nao_comp = 100 - $comp;

	//APRESENTAÇÃO DOS DADOS;
	echo "<div class='titulo' style='width: 200px;  margin-bottom: 20px '><div style='margin: 0px 15px 0px 15px;'>Relatório Geral</div></div>
		<div class='row'>";
	echo "<div class='col-sm-4'>
			<div class='bg-primary rel-titulo' >Códigos Gerados</div>
			<ul class='rel-dados'>
				<li>Último dia: <span>$c_dia</span></li>
				<li>Última semana: <span>$c_semana</span></li>
				<li>Último mês: <span>$c_mes</span></li>
				<li>Total geral: <span>$c_geral</span></li>
			</ul></div>";
	echo "<div class='col-sm-4'>
			<div class='bg-primary rel-titulo'>Códigos Usados</div>
			<ul class='rel-dados'>
				<li>No dia: <span>$comp_dia</span></li>
				<li>Na semana: <span>$comp_semana</span></li>
				<li>No mês: <span>$comp_mes</span></li>
				<li>Total de uso: <span>$comp_geral</span></li>
			</ul></div>";
	echo "<div class='col-sm-4'>
			<div class='bg-primary rel-titulo'>Comparativo dos Códigos</div>
			
			<div class='progress' style='margin-top: 20px;'>
			  <div class='progress-bar progress-bar-success' style='width: ".$comp."%'>
			    ".$comp."%
			  </div>
			  <div class='progress-bar progress-bar-warning' style='width: ".$nao_comp."%'>
			    ".$nao_comp."%
			  </div>
			 </div>
			 <div class='rel-comp'> &nbsp;
			  <div style='float: left; color:#5CB85C; font-weight: bolder;'>Usado</div><div style='float: right; color:#F0AD4E; font-weight: bolder;'>Não Usado</div>
			</div>";



	?>