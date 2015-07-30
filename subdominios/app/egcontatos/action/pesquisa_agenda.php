<?php
include $_SERVER["DOCUMENT_ROOT"]."/padrao/conexao_egcontatos.php";

$busca= $_POST['busca'];
$condicao= $_POST['condicao'];


switch ($condicao) {
	case 'inicia_por':
		$consulta = ("SELECT * FROM contato WHERE LOWER(nome_contato) LIKE LOWER('$busca%')");
		break;
	case 'qualquer':
		$consulta = ("SELECT * FROM contato WHERE LOWER(nome_contato) LIKE LOWER('%$busca%')");
		break;
	
	default:
		$consulta = ("SELECT * FROM contato WHERE LOWER(nome_contato) LIKE LOWER('$busca%')"); 
		break;
}
// echo $consulta;



//Dados para paginação;
$sql_geral = $conexao->prepare($consulta);
$sql_geral->execute(); //realiza consulta para saber a quantidade de linhas;
$num_registros = $sql_geral->rowCount(); //obtem número de linhas;
$registros_por_pagina = 10; //informa quantas registros aparecerão por vez em cada página;
$pagina_atual = $_POST["pagina_atual"]; //captura o valor da página atual;
$num_pagina = ceil($num_registros/$registros_por_pagina); //calcula a quantidade de páginas totais. Ex: se temos 50 registos e aparece 10 por página, então temos 5 páginas;
$inicio = $registros_por_pagina * ($pagina_atual-1); //calcula o ponto de partida para a consulta, dentro do banco de dados;
$max_pagina = 5; //informa quantos elementos de páginação haverá na apresentação;
$meio_pag = floor($max_pagina/2);

 
//consulta para se obter os registros a cada página;
 switch ($condicao) {
	case 'inicia_por':
		$consulta = ("SELECT * 
			FROM contato 
			WHERE LOWER(nome_contato) 
			LIKE LOWER('$busca%') 
			ORDER BY nome_contato ASC
			LIMIT $registros_por_pagina OFFSET $inicio");
		break;
	case 'qualquer':
		$consulta = ("SELECT * 
			FROM contato 
			WHERE LOWER(nome_contato) 
			LIKE LOWER('%$busca%') 
			ORDER BY nome_contato ASC
			LIMIT $registros_por_pagina OFFSET $inicio");
		break;
	
	default:
		$consulta = ("SELECT * 
			FROM contato 
			WHERE LOWER(nome_contato) 
			LIKE LOWER('$busca%') 
			ORDER BY nome_contato ASC
			LIMIT $registros_por_pagina OFFSET $inicio");
		break;
}

$sql_geral = $conexao->prepare($consulta);
$sql_geral->execute();


//prepara os dados para exibição
	if ($sql_geral->rowCount() > 0)
		{	
			//se retornou, captura os dados e trata para exibição;
			echo "<div class='row' style='margin:auto; width: 800px;'>";
			echo "<div class='row'><div class='text-center alert alert-success col-xs-4 col-xs-offset-8'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><p>A busca retornou $num_registros registro(s). </p></div></div>";
			?>
			
				<div class="row tabela_resultado" >
					<div class="col-xs-4">
						<span>NOME</span>	
					</div>
					<div class="col-xs-4">
						<span>TELEFONE</span>	
					</div>
					<div class="col-xs-4">
						<span>E-MAIL</span>	
					</div>
				</div>

			<?php
		while ($dados = $sql_geral->fetch(PDO::FETCH_ASSOC)  )
			{
				echo "<div class='row linha_contato' data-toggle='modal' data-target='#ModalContato' data-idcontato='$dados[id_contato]'><div class='col-xs-4'>
						<span>$dados[nome_contato]</span>	
					</div>
					<div class='col-xs-4'>
						<span>$dados[telefone1]</span>	
					</div>
					<div class='col-xs-4'>
						<span>$dados[email]</span>	
					</div></div>";

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
							<a onclick='pesquisarContato(\"$busca\", \"$condicao\", $pagina_atual - 1)' aria-label='Previous'>
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
							echo " <li ><a onclick='pesquisarContato(\"$busca\", \"$condicao\", $i)'>$i</a></li>";
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
								echo " <li ><a onclick='pesquisarContato(\"$busca\", \"$condicao\", $i)'>$i</a></li>";
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
									echo " <li ><a onclick='pesquisarContato(\"$busca\", \"$condicao\", $mysql_a)'>$mysql_a</a></li>";
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
									echo " <li ><a onclick='pesquisarContato(\"$busca\", \"$condicao\", $mysql_b)'>$mysql_b</a></li>";
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
				      		<a onclick='pesquisarContato(\"$busca\", \"$condicao\", $pagina_atual + 1)' aria-label='Next'>
				        		<span aria-hidden='true'>&raquo;</span>
				      		</a>
				      	  </li>";
				}
			
				echo "</ul></nav></div>";
			}
		}
		//Se a consulta não retornar valores, é exibida a mensagem de erro; 
		else{
			echo "<div class='row' style='margin:auto; width: 800px;'>";
			echo "<div class='row'><div class='text-center alert alert-danger col-xs-8 col-xs-offset-4'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><p>NENHUM REGISTRO ENCONTRADO! Tente outro critério de busca.</p></div></div></div>";
		}

?>




