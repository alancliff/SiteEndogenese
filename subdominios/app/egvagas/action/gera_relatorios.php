<?php
include $_SERVER["DOCUMENT_ROOT"]."/padrao/conexao_egvagas.php";

$tipo = $_POST["relatorio"]; 
$id_empresa = $_POST["id_empresa"];


switch ($tipo) {
	case '1':
		$sqlBusca = ("SELECT b.fantasia, sum(a.qtde_visualiza) total FROM vagas a
					INNER JOIN empresas b
					ON a.id_empresa = b.id_empresa
					GROUP BY b.fantasia
					");
		$query = $conexao->prepare($sqlBusca);
		$query->execute();

		if ($query->rowCount() > 0) 
		{
				echo "<div class='row titulo_rel'>
								<div class='col-xs-3'>Fantasia</div>
								<div class='col-xs-2'>Visualizações</div>
					</div>";
			$class_item = "bg-warning";
			while ($item = $query->fetch(PDO::FETCH_ASSOC) )
					{
						echo "<div class='row dados_rel $class_item'>
								<div class='col-xs-3'>$item[fantasia]</div>
								<div class='col-xs-2'>$item[total]</div>
							</div>";
						if ($class_item == "bg-info") {
							$class_item = "bg-warning";
						}
						else{
							$class_item = "bg-info";
						}
					}
		}

		break;
	case '2':
		$sqlBusca = ("SELECT b.fantasia, sum(a.qtde_visualiza) total FROM vagas a
					INNER JOIN empresas b
					ON a.id_empresa = b.id_empresa
					WHERE b.id_empresa = $id_empresa
					");
		$query = $conexao->prepare($sqlBusca);
		$query->execute();

		if ($query->rowCount() > 0) 
		{
				echo "<div class='row titulo_rel'>
								<div class='col-xs-3'>Fantasia</div>
								<div class='col-xs-2'>Visualizações</div>
					</div>";
			$class_item = "bg-warning";
			while ($item = $query->fetch(PDO::FETCH_ASSOC) )
					{
						echo "<div class='row dados_rel $class_item'>
								<div class='col-xs-3'>$item[fantasia]</div>
								<div class='col-xs-2'>$item[total]</div>
							</div>";
						if ($class_item == "bg-info") {
							$class_item = "bg-warning";
						}
						else{
							$class_item = "bg-info";
						}
					}
		}

		break;
	case '3':
		$sqlBusca = ("SELECT b.fantasia, a.cargo, sum(a.qtde_visualiza) total FROM vagas a
					INNER JOIN empresas b
					ON a.id_empresa = b.id_empresa
					GROUP BY a.cargo, b.fantasia
					ORDER BY b.fantasia;
					");
		$query = $conexao->prepare($sqlBusca);
		$query->execute();

		if ($query->rowCount() > 0) 
		{
				echo "<div class='row titulo_rel'>
								<div class='col-xs-3'>Fantasia</div>
								<div class='col-xs-3'>Cargo</div>
								<div class='col-xs-2'>Visualizações</div>
					</div>";
			$class_item = "bg-warning";
			while ($item = $query->fetch(PDO::FETCH_ASSOC) )
					{
						echo "<div class='row dados_rel $class_item'>
								<div class='col-xs-3'>$item[fantasia]</div>
								<div class='col-xs-3'>$item[cargo]</div>
								<div class='col-xs-2'>$item[total]</div>
							</div>";
						if ($class_item == "bg-info") {
							$class_item = "bg-warning";
						}
						else{
							$class_item = "bg-info";
						}
					}
		}

		break;
	case '4':
		$sqlBusca = ("SELECT b.fantasia, a.cargo, sum(a.qtde_visualiza) total FROM vagas a
					INNER JOIN empresas b
					ON a.id_empresa = b.id_empresa
					WHERE b.id_empresa = $id_empresa
					GROUP BY a.cargo
					");
		$query = $conexao->prepare($sqlBusca);
		$query->execute();

		if ($query->rowCount() > 0) 
		{
				echo "<div class='row titulo_rel'>
								<div class='col-xs-3'>Fantasia</div>
								<div class='col-xs-3'>Cargo</div>
								<div class='col-xs-2'>Visualizações</div>
					</div>";
			$class_item = "bg-warning";
			while ($item = $query->fetch(PDO::FETCH_ASSOC) )
					{
						echo "<div class='row dados_rel $class_item'>
								<div class='col-xs-3'>$item[fantasia]</div>
								<div class='col-xs-3'>$item[cargo]</div>
								<div class='col-xs-2'>$item[total]</div>
							</div>";
						if ($class_item == "bg-info") {
							$class_item = "bg-warning";
						}
						else{
							$class_item = "bg-info";
						}
					}
		}

		break;

	default:
		# code...
		break;
}




?>