<?php
include "../includes/conexao.php";
require $_SERVER["DOCUMENT_ROOT"]."/egvagas/includes/constantes.php"; 

$criterio = $_POST["criterio"]; //critério a ser pesquisado;
$valor = $_POST["valor"]; //valor do critério;
$pagina_atual = $_POST["pagina_atual"]; //captura o valor da página atual;

switch ($criterio) {
	case 'cargo':
		$sqlBusca = ("SELECT id_vaga, cargo, qtde_ofertada, escolaridade_exg, dt_inclusao
				FROM vagas
				WHERE cargo LIKE '%$valor%'
				AND ativa = true
				");
		break;
	case 'salario':
		if ($valor == "null") 
		{
			$sqlBusca = ("SELECT id_vaga, cargo, qtde_ofertada, escolaridade_exg, dt_inclusao
				FROM vagas
				WHERE salario is null
				AND ativa = true
				");
		}
		else
		{
			list ($inicio, $fim) = explode("|", $valor);
			if ($fim == 0) {
				$sqlBusca = ("SELECT id_vaga, cargo, qtde_ofertada, escolaridade_exg, dt_inclusao
				FROM vagas
				WHERE salario > $inicio
				AND ativa = true
				");
			}
			else
			{
				$sqlBusca = ("SELECT id_vaga, cargo, qtde_ofertada, escolaridade_exg, dt_inclusao
				FROM vagas
				WHERE salario BETWEEN $inicio AND $fim
				AND ativa = true
				");
			}
			
		}
		
		break;
	case 'escolaridade':
		$sqlBusca = ("SELECT id_vaga, cargo, qtde_ofertada, escolaridade_exg, dt_inclusao
				FROM vagas
				WHERE escolaridade_exg = '$valor'
				AND ativa = true
				");
		break;
	case 'pne':
		if ($valor == "sim") 
		{
			$sqlBusca = ("SELECT id_vaga, cargo, qtde_ofertada, escolaridade_exg, dt_inclusao
				FROM vagas
				WHERE qtde_pne <> 0
				AND ativa = true
				");
		}
		else
		{
			$sqlBusca = ("SELECT id_vaga, cargo, qtde_ofertada, escolaridade_exg, dt_inclusao
				FROM vagas
				WHERE qtde_pne = 0
				AND ativa = true
				");
		}
		
		break;
	case 'periodo':


		if ($valor == "todos") {
			$sqlBusca = ("SELECT id_vaga, cargo, qtde_ofertada, escolaridade_exg, dt_inclusao
				FROM vagas
				WHERE trab_matutino = true
				AND trab_vespertino = true
				AND trab_noturno = true
				AND ativa = true
				");
		}
		else
		{
			list ($periodo1, $periodo2) = explode("|", $valor);

			$sqlBusca = ("SELECT id_vaga, cargo, qtde_ofertada, escolaridade_exg, dt_inclusao
				FROM vagas
				WHERE trab_$periodo1 = true
				AND ativa = true");

			if ($periodo1 == $periodo2) 
			{
				if (preg_match("/matutino/i", $periodo1)){
				$sqlBusca .= (" AND trab_vespertino = false
					AND trab_noturno = false ");
				}
				if (preg_match("/vespertino/i", $periodo1)){
				$sqlBusca .= (" AND trab_matutino = false
					AND trab_noturno = false ");
				}
				if (preg_match("/noturno/i", $periodo1)){
				$sqlBusca .= (" AND trab_vespertino = false
					AND trab_matutino = false ");
				}
			}
			else
			{
				if (!preg_match("/matutino/i", $valor)){
					$sqlBusca .= (" AND trab_$periodo2 = true
					AND trab_matutino = false ");
				}
				if (!preg_match("/vespertino/i", $valor)){
					$sqlBusca .= (" AND trab_$periodo2 = true
					AND trab_vespertino = false ");
				}
				if (!preg_match("/noturno/i", $valor)){
					$sqlBusca .= (" AND trab_$periodo2 = true
					AND trab_noturno = false ");
				}
				

			}
		}
			
		break;
	
	default:
		# code...
		break;
}

  
//Dados para paginação;
$linhas = $conexao->prepare($sqlBusca);
$linhas->execute();
$num_registros =  $linhas->rowCount();//obtem número de linhas;
$registros_por_pagina = 10; //informa quantas registros aparecerão por vez em cada página;

$num_pagina = ceil($num_registros/$registros_por_pagina); //calcula a quantidade de páginas totais. Ex: se temos 50 registos e aparece 10 por página, então temos 5 páginas;
$inicio = $registros_por_pagina * ($pagina_atual-1); //calcula o ponto de partida para a consulta, dentro do banco de dados;
$max_pagina = 5; //informa quantos elementos de páginação haverá na apresentação;
$meio_pag = floor($max_pagina/2);

//consulta para se obter os registros a cada página;
$sqlBusca .= ("ORDER BY dt_inclusao DESC
				LIMIT $registros_por_pagina OFFSET $inicio");


// echo $sqlBusca; //visualizar a query enviada ao banco.

$sqlBusca = $conexao->prepare($sqlBusca);
$sqlBusca->execute();
	//verifica se retorna linhas;

	if ($sqlBusca->rowCount() > 0)
		{	
			//se retornou, captura os dados e trata para exibição;
			echo "<span class='bg-success' >A sua busca retornou ".$num_registros." resultado(s)</span><br>";
			echo "<div style='margin-top: 15px'class='row titulo-relatorio'><div class='col-xs-5'>Cargo</div><div class='col-xs-2'>Vagas</div><div class='col-xs-3'>Escolaridade</div><div class='col-xs-2'>Divulgação</div></div><div class='box-dados'>";
			while ($dados = $sqlBusca->fetch(PDO::FETCH_ASSOC) )
			{
				echo "<div class='row dados-relatorio' onclick='mostrarDetalhes($dados[id_vaga], $pagina_atual, \"$criterio\", \"$valor\")'>
					<div class='col-xs-5'>$dados[cargo]</div>
					<div class='col-xs-2'>$dados[qtde_ofertada]</div>
					<div class='col-xs-3'>$dados[escolaridade_exg]</div>
					<div class='col-xs-2'>".date('d/m/Y', strtotime("$dados[dt_inclusao]"))."</div></div>";
			}
			echo "</div>";

			//Início da paginação, tratamento das diversas situações;
			//Primeiramente, só exibe os números na paginação se houverem a partir de 2 páginas a serem exibidas;
			if ($num_pagina >= 2) 
			{
				
				echo "<div style='text-align: center;' class='row'> <nav>
				  <ul class='pagination'>";
				//Tratamento para exibição do botão "Anterior", que fica indisponível se a página atual for a primeira;
				if ($pagina_atual <= 1) 
				{
					echo "<li class='disabled'>
							<span>
				        		<span aria-hidden='true'>&laquo;</span>
				      		</span>
				    	  </li>";				
				}
				else
				{
					echo "<li>
							<a onclick='buscarVaga(\"$criterio\", \"$valor\",$pagina_atual - 1)' aria-label='Previous'>
				        		<span aria-hidden='true'>&laquo;</span>
				      		</a>
				    	  </li>";
				}

				//Tratamento da exibição dos links para cada uma das páginas;
				//Primeiramente, se houverem poucas páginas, ou seja, se a quantidade total for menor que o máximo definido;
				if ($num_pagina <= $max_pagina) 
				{
					for ($i=1; $i <= $num_pagina ; $i++)
					{
						if ($pagina_atual == $i) 
						{
							echo " <li class='active'><a>$i</a></li>";
						}
						else
						{
							echo " <li ><a onclick='buscarVaga(\"$criterio\", \"$valor\", $i)'>$i</a></li>";
						}
							
					} 
				}
				//Caso contrário, será mostrado páginas até o limite definido;
				else
				{
					for ($i=1; $i <= $max_pagina ; $i++)
					{
						$mysql_a = $num_pagina-$max_pagina+$i; //cálculo para numerar as páginas, colocando a última página no fim, e não gerar páginas que não existem.
						$mysql_b = $pagina_atual-$max_pagina+$meio_pag+$i;//cálculo para colocar a página ativa sempre no meio da paginação;
						$ultima_pg = $pagina_atual+$meio_pag; //prevê qual será a última página;
						//caso a página atual seja menor ou igual ao máximo de páginas
						//simplesmente atribui o contador ao link da página
						
						if ($pagina_atual <= $max_pagina) 
						{
							if ($pagina_atual == $i) //Condição que exibe a página selecionada função de chamada, ou coloca a função na página que não está em evidência;
							{
								echo " <li class='active'><a>$i</a></li>";
							}
							else
							{
								echo " <li ><a onclick='buscarVaga(\"$criterio\", \"$valor\", $i)'>$i</a></li>";
							}
						}
						//caso a última página prevista seja maior que o total de páginas, 
						//será formada a paginação fixando a última página no fim. 
						elseif ($ultima_pg > $num_pagina)
						{
							
								if ($pagina_atual == $mysql_a) 
								{
									echo " <li class='active'><a>$mysql_a</a></li>";
								}
								else
								{
									echo " <li ><a onclick='buscarVaga(\"$criterio\", \"$valor\", $mysql_a)'>$mysql_a</a></li>";
								}
						}
						//código execultado quando se está longe do início ou do fim, colocando a página
						//ativa sempre no meio da paginação; 
						else
						{
								
								if ($pagina_atual == $mysql_b) 
								{
									echo " <li class='active'><a>$mysql_b</a></li>";
								}
								else
								{
									echo " <li ><a onclick='buscarVaga(\"$criterio\", \"$valor\", $mysql_b)'>$mysql_b</a></li>";
								}
						}
		
					}
				}
				//Tratamento para exibição do botão "Próximo", que fica indisponível 
				//se a página atual for a última;
				if ($pagina_atual >= $num_pagina) 
				{
					echo "<li class='disabled'>
							<span>
				        		<span aria-hidden='true'>&raquo;</span>
				      		</span>
				    	  </li>";
				}
				else
				{
					echo "<li>
				      		<a onclick='buscarVaga(\"$criterio\", \"$valor\", $pagina_atual + 1)' aria-label='Next'>
				        		<span aria-hidden='true'>&raquo;</span>
				      		</a>
				      	  </li>";
				}
			
				echo "</ul></nav></div>";
			}
	
		}
		//Se a consulta não retornar valores, é exibida a mensagem de erro; 
		else{
			echo "<span class='bg-danger' style='color: red; width: 500px; padding: 10px 4px 10px 4px; border-radius: 5px; display:block; margin-top: 5px;'> Seus critérios de busca não correspondem a nenhuma Vaga aberta! <br> Altere os critérios e tente novamente.<br><br>Se deseja incluir uma nova vaga, <a href='".SITE.DIR."/paginas/atendimento.php'>clique aqui.</a></span>";
		}





?>