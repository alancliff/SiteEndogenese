<?php

include $_SERVER["DOCUMENT_ROOT"]."/padrao/conexao_egcontatos.php";
echo "<div class='row'>";
//CONSULTA 01
$sql = ("SELECT consultor_responsavel, COUNT(consultor_responsavel) as numero_prospeccao
		FROM prospeccao
		GROUP BY consultor_responsavel;");
// echo($sql);
$sql = $conexao->prepare($sql);
$sql->execute();
if ($sql->rowCount() > 0)
{	
	echo "<div class='col-xs-4' >
				<div class='row titulo_rel'>
					<div class='col-xs-8'>Consultor
					</div>
					<div class='col-xs-3'>Prospecção
					</div>
				</div>";
	$class_item = "bg-info";
	while ($dados = $sql->fetch(PDO::FETCH_ASSOC)) 
	{
	echo "<div class='row dados_rel $class_item'>
			<div class='col-xs-8'>$dados[consultor_responsavel]
			</div>
			<div class='col-xs-3'>$dados[numero_prospeccao]
			</div>
		</div>";
		if ($class_item == "bg-info") {
			$class_item = "bg-warning";
		}
		else{
			$class_item = "bg-info";
		}
	}
	echo "</div>";
}
//Se a consulta não retornar valores, é exibida a mensagem de erro; 
else{
	echo "<div class='col-xs-4'><span class='bg-danger' style='color: red; width: 180px; padding: 10px 4px 10px 4px; border-radius: 5px; display:block; margin-top: 5px;'> Nenhum Registro encontrado.</span></div>";
}

//CONSULTA 02

$sql = ("SELECT prioridade, COUNT(prioridade) as numero_prioridade
		FROM prospeccao
		GROUP BY prioridade;");
// echo($sql);
$sql = $conexao->prepare($sql);
$sql->execute();
if ($sql->rowCount() > 0)
{	
	echo "<div class='col-xs-4'>
				<div class='row titulo_rel'>
					<div class='col-xs-4'>Prioridade
					</div>
					<div class='col-xs-4'>Quantidade
					</div>
				</div>";
	$class_item = "bg-info";
	while ($dados = $sql->fetch(PDO::FETCH_ASSOC)) 
	{
	echo "<div class='row dados_rel $class_item'>
			<div class='col-xs-4'>$dados[prioridade]
			</div>
			<div class='col-xs-4'>$dados[numero_prioridade]
			</div>
		</div>";
		if ($class_item == "bg-info") {
			$class_item = "bg-warning";
		}
		else{
			$class_item = "bg-info";
		}
	}
	echo "</div>";
}
//Se a consulta não retornar valores, é exibida a mensagem de erro; 
else{
	echo "<div class='col-xs-4'><span class='bg-danger' style='color: red; width: 180px; padding: 10px 4px 10px 4px; border-radius: 5px; display:block; margin-top: 5px;'> Nenhum Registro encontrado.</span></div>";
}

//CONSULTA 03

$sql = ("SELECT prioridade, sum(valor_estimado) as valor_prioridade
		FROM prospeccao
		GROUP BY prioridade;");
// echo($sql);
$sql = $conexao->prepare($sql);
$sql->execute();
if ($sql->rowCount() > 0)
{	
	echo "<div class='col-xs-4'>
				<div class='row titulo_rel'>
					<div class='col-xs-4'>Prioridade
					</div>
					<div class='col-xs-6'>Valor
					</div>
				</div>";
	$class_item = "bg-info";
	while ($dados = $sql->fetch(PDO::FETCH_ASSOC)) 
	{
	echo "<div class='row dados_rel $class_item'>
			<div class='col-xs-4'>$dados[prioridade]
			</div>
			<div class='col-xs-6'>R$ ".number_format($dados[valor_prioridade],2,",",".")."
			</div>
		</div>";
		if ($class_item == "bg-info") {
			$class_item = "bg-warning";
		}
		else{
			$class_item = "bg-info";
		}
	}
	echo "</div>";
}
//Se a consulta não retornar valores, é exibida a mensagem de erro; 
else{
	echo "<div class='col-xs-4'><span class='bg-danger' style='color: red; width: 180px; padding: 10px 4px 10px 4px; border-radius: 5px; display:block; margin-top: 5px;'> Nenhum Registro encontrado.</span></div>";
}


echo "</div>";

echo "<div class='row'>";

//CONSULTA 04

$sql = ("SELECT consultor_responsavel, prioridade, COUNT(prioridade) as numero_prioridade, sum(valor_estimado) as valor_prioridade
		FROM prospeccao
		GROUP BY consultor_responsavel, prioridade;");
// echo($sql);
$sql = $conexao->prepare($sql);
$sql->execute();
if ($sql->rowCount() > 0)
{	
	echo "<div class='col-xs-12'>
				<div class='row titulo_rel'>
					<div class='col-xs-4'>Consultor
					</div>
					<div class='col-xs-2'>Prioridade
					</div>
					<div class='col-xs-2'>Quantidade
					</div>
					<div class='col-xs-4'>Valor
					</div>
				</div>";
	$class_item = "bg-info";
	while ($dados = $sql->fetch(PDO::FETCH_ASSOC)) 
	{
	echo "<div class='row dados_rel $class_item'>
					<div class='col-xs-4'>$dados[consultor_responsavel]
					</div>
					<div class='col-xs-2'>$dados[prioridade]
					</div>
					<div class='col-xs-2'>$dados[numero_prioridade]
					</div>
					<div class='col-xs-4'>R$ ".number_format($dados[valor_prioridade],2,",",".")."
					</div>
				</div>";
		if ($class_item == "bg-info") {
			$class_item = "bg-warning";
		}
		else{
			$class_item = "bg-info";
		}
	}
	echo "</div>";
}
//Se a consulta não retornar valores, é exibida a mensagem de erro; 
else{
	echo "<div class='col-xs-4'><span class='bg-danger' style='color: red; width: 180px; padding: 10px 4px 10px 4px; border-radius: 5px; display:block; margin-top: 5px;'> Nenhum Registro encontrado.</span></div>";
}

echo "</div>";
 ?>


