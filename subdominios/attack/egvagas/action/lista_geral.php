<?php
include "../includes/conexao.php";
//recebe o id da empresa a ser tratada;
$sql_geral = $conexao->prepare("SELECT id_vaga, cargo, qtde_ofertada, escolaridade_exg, dt_inclusao
				FROM vagas
				WHERE ativa = true
				");

//Dados para paginação;
$sql_geral->execute(); //realiza consulta para saber a quantidade de linhas;
$num_registros = $sql_geral->rowCount(); //obtem número de linhas;
$registros_por_pagina = 20; //informa quantas registros aparecerão por vez em cada página;
$pagina_atual = $_POST["pagina_atual"]; //captura o valor da página atual;
$num_pagina = ceil($num_registros/$registros_por_pagina); //calcula a quantidade de páginas totais. Ex: se temos 50 registos e aparece 10 por página, então temos 5 páginas;
$inicio = $registros_por_pagina * ($pagina_atual-1); //calcula o ponto de partida para a consulta, dentro do banco de dados;
$max_pagina = 5; //informa quantos elementos de páginação haverá na apresentação;
$meio_pag = floor($max_pagina/2);

//consulta para se obter os registros a cada página;
$sql_geral = ("SELECT id_vaga, cargo, qtde_ofertada, escolaridade_exg, dt_inclusao
				FROM vagas
				WHERE ativa = true
				ORDER BY dt_inclusao DESC
				LIMIT $registros_por_pagina OFFSET $inicio");
$sql_geral = $conexao->prepare($sql_geral);
$sql_geral->execute();
	//verifica se retorna linhas;

	if ($sql_geral->rowCount() > 0)
		{	
			//se retornou, captura os dados e trata para exibição;
			echo "<span class='bg-success'>Você está visualizando todas as vagas!</span><br>";
			echo "<div style='margin-top: 15px' class='row titulo-relatorio'><div class='col-xs-5'>Cargo</div><div class='col-xs-2'>Vagas</div><div class='col-xs-3'>Escolaridade</div><div class='col-xs-2'>Divulgação</div></div><div class='box-dados'>";
			while ($valor = $sql_geral->fetch(PDO::FETCH_ASSOC) )
			{
				echo "<div class='row dados-relatorio' onclick='mostrarDetalhes($valor[id_vaga], $pagina_atual)'>
					<div class='col-xs-5'>$valor[cargo]</div>
					<div class='col-xs-2'>$valor[qtde_ofertada]</div>
					<div class='col-xs-3'>$valor[escolaridade_exg]</div>
					<div class='col-xs-2'>".date('d/m/Y', strtotime("$valor[dt_inclusao]"))."</div></div>";
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
							<a onclick='listaGeral($pagina_atual - 1)' aria-label='Previous'>
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
							echo " <li ><a onclick='listaGeral($i)'>$i</a></li>";
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
								echo " <li ><a onclick='listaGeral($i)'>$i</a></li>";
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
									echo " <li ><a onclick='listaGeral($mysql_a)'>$mysql_a</a></li>";
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
									echo " <li ><a onclick='listaGeral($mysql_b)'>$mysql_b</a></li>";
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
				      		<a onclick='listaGeral($pagina_atual + 1)' aria-label='Next'>
				        		<span aria-hidden='true'>&raquo;</span>
				      		</a>
				      	  </li>";
				}
			
				echo "</ul></nav></div>";
			}
		}
		//Se a consulta não retornar valores, é exibida a mensagem de erro; 
		else{
			echo "<span class='bg-danger' style='color: red; width: 180px; padding: 10px 4px 10px 4px; border-radius: 5px; display:block; margin-top: 5px;'> Nenhum Registro encontrado.</span>";
		}





?>