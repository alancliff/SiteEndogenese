<?php
include $_SERVER["DOCUMENT_ROOT"]."/padrao/conexao_egcontatos.php";

$sql_geral =  $conexao->prepare("SELECT a.nome_contato, b.* 
									FROM contato a INNER JOIN prospeccao b
									ON a.id_contato = b.id_contato");



//Dados para paginação;
$sql_geral->execute(); //realiza consulta para saber a quantidade de linhas;
$num_registros = $sql_geral->rowCount(); //obtem número de linhas;
$registros_por_pagina = 5; //informa quantas registros aparecerão por vez em cada página;
$pagina_atual = $_POST["pagina_atual"]; //captura o valor da página atual;
$num_pagina = ceil($num_registros/$registros_por_pagina); //calcula a quantidade de páginas totais. Ex: se temos 50 registos e aparece 10 por página, então temos 5 páginas;
$inicio = $registros_por_pagina * ($pagina_atual-1); //calcula o ponto de partida para a consulta, dentro do banco de dados;
$max_pagina = 5; //informa quantos elementos de páginação haverá na apresentação;
$meio_pag = floor($max_pagina/2);

//consulta para se obter os registros a cada página;
$sql_geral = ("SELECT a.nome_contato, b.* 
				FROM contato a INNER JOIN prospeccao b
				ON a.id_contato = b.id_contato
				LIMIT $registros_por_pagina OFFSET $inicio");
$sql_geral = $conexao->prepare($sql_geral);
$sql_geral->execute();


	//verifica se retorna linhas;
	if ($sql_geral->rowCount() > 0)
	{	
		//se retornou, captura os dados retornados
		$class_item = "bg-info";
			while ($valor = $sql_geral->fetch(PDO::FETCH_ASSOC) )
			{
				echo "<div class='dados_cliente $class_item' data-toggle='modal' data-target='#ModalContato' data-idcontato='$valor[id_contato]'>
							<span class='label_pros'>Consultor Responsável: </span><span class='dados_pros'>$valor[consultor_responsavel]</span>
							<span class='label_pros'>Data Inclusão: </span><span class='dados_pros'>".date ('d/m/Y',strtotime("$valor[dt_inclusao]"))."</span><br>
							<span class='label_pros'>Cliente: </span><span class='dados_pros'>$valor[nome_contato] </span>
							<span class='label_pros'>Valor Estimado: </span><span class='dados_pros'>R$ ".number_format($valor[valor_estimado],2,",",".")."</span>
							<span class='label_pros'>Prioridade: </span><span class='dados_pros'>$valor[prioridade]</span><br>
							<span class='label_pros'>Seguimento: </span><span class='dados_pros'>$valor[seguimento]</span><br>
							<span class='label_pros'>Pretensão: </span><span class='dados_pros'>$valor[pretensao]</span><br>
					</div>";
				if ($class_item == "bg-info") {
					$class_item = "bg-warning";
				}
				else{
					$class_item = "bg-info";
				}
			}


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
							<a onclick='listaCompleta($pagina_atual - 1)' aria-label='Previous'>
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
							echo " <li ><a onclick='listaCompleta($i)'>$i</a></li>";
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
								echo " <li ><a onclick='listaCompleta($i)'>$i</a></li>";
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
									echo " <li ><a onclick='listaCompleta($mysql_a)'>$mysql_a</a></li>";
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
									echo " <li ><a onclick='listaCompleta($mysql_b)'>$mysql_b</a></li>";
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
				      		<a onclick='listaCompleta($pagina_atual + 1)' aria-label='Next'>
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