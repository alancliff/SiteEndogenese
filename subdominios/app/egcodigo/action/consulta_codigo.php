<?php
include "../includes/conexao.php";

$codigo_promocao = $_POST["codigo"];
$id_empresaweb = $_POST["id_empresaweb"];

function validaCodigo ($codigo) {
	
	$calc = substr($codigo, 0, -2);
	$dig1 = hexdec(substr($codigo, -2, -1));
	$dig2 = hexdec(substr($codigo, -1));
	$calc_dig1 = 0;
	$calc_dig2 = 0;
	
	$tamanho = strlen($calc); 
    for ($i = 0; $i < $tamanho;$i++){
    	$item = $calc[$i];
    	$calc_dig1 += hexdec($item)*(($tamanho-$i)+1); 
    	$calc_dig2 += hexdec($item)*($i+2);
    }
    
    $calc_dig1 = ($calc_dig1%16);
    $calc_dig2 = ($calc_dig2%16);
    if ($dig1 == $calc_dig1 && $dig2 == $calc_dig2) {
    	return true;
    }
    else{
    	return false;
    }

    
	
}

if (!validaCodigo ($codigo_promocao)) {
	echo "<span class='bg-danger' style='color: red; width: 180px; padding: 10px 4px 10px 4px; border-radius: 5px; display:block; margin-top: 5px;'> Código Inválido.</span>";
	die();
}


$sql_codigo =  $conexao->prepare("SELECT a.nome_cliente, a.email, a.celular, b.id_relacao, b.compareceu
				FROM clienteweb a
				INNER JOIN relacao b 
				ON a.id_clienteweb = b.id_clienteweb
				WHERE b.codigo_promocao = '$codigo_promocao'
				AND b.id_empresaweb = $id_empresaweb");

$sql_codigo->execute();
	//verifica se retornou valor;
	//echo $sql_codigo;
	if ($sql_codigo->rowCount() > 0)
		{	
			//se retornou, captura os dados retornados
			while ($valor = $sql_codigo->fetch(PDO::FETCH_ASSOC) )
			{
				echo "<div class='row' style='margin: 10px -15px 10px -15px;'>
					<div class='col-sm-4'>$valor[nome_cliente]</div>
					<div class='col-sm-3'>$valor[email]</div>
					<div class='col-sm-3'>$valor[celular]</div>";
					if ($valor['compareceu'] == 1){
						echo "<div class='col-sm-2'><span class='btn btn-success active'>SIM</span></div></div>";
					}
						else{
					echo "<div class='col-sm-2'><span onclick='confirmaUso($valor[id_relacao])' class='btn btn-warning' onMouseOver='over(this)' onmouseout='out(this)'>NÃO</span></div></div>";
				}


			}

		}
		else{
			echo "<span class='bg-danger' style='color: red; width: 180px; padding: 10px 4px 10px 4px; border-radius: 5px; display:block; margin-top: 5px;'> Código não encontrado.</span>";
		}

?>