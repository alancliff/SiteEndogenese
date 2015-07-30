<?php
//inclui arquivo de conexão
include $_SERVER["DOCUMENT_ROOT"]."/padrao/conexao_egvagas.php";

$criterio = $_POST['criterio'];
$valor = $_POST['valor'];


//prepara a query;

switch ($criterio) {
	case 'fantasia':
	$sql = "SELECT id_empresa, fantasia, cnpj
		FROM empresas
		WHERE fantasia LIKE '%$valor%' ";
		break;
	case 'cnpj':
	$sql = "SELECT id_empresa, fantasia, cnpj
		FROM empresas
		WHERE cnpj LIKE '%$valor%' ";
		break;
	case 'todas':
	$sql = "SELECT id_empresa, fantasia, cnpj
		FROM empresas";
		break;
	default:
	$sql = "SELECT id_empresa, fantasia, cnpj
		FROM empresas";
		break;
}

$sql_geral = $conexao->prepare($sql);

//Dados para paginação;
$sql_geral->execute();//realiza consulta para saber a quantidade de linhas;
$num_registros = $sql_geral->rowCount(); //obtem número de linhas;
$registros_por_pagina = 5; //informa quantas registros aparecerão por vez em cada página;
$pagina_atual = $_POST["pagina_atual"]; //captura o valor da página atual;
$num_pagina = ceil($num_registros/$registros_por_pagina); //calcula a quantidade de páginas totais. Ex: se temos 50 registos e aparece 10 por página, então temos 5 páginas;
$inicio = $registros_por_pagina * ($pagina_atual-1); //calcula o ponto de partida para a consulta, dentro do banco de dados;
$max_pagina = 5; //informa quantos elementos de páginação haverá na apresentação;
$meio_pag = floor($max_pagina/2);

//consulta para se obter os registros a cada página;
$sql = $sql." ORDER BY fantasia
			LIMIT $registros_por_pagina OFFSET $inicio";
$sql_geral = $conexao->prepare($sql);
$sql_geral->execute();

//se retornou, captura os dados retornados
if($sql_geral->rowCount() > 0)
{
	echo "<div class='row titulo_rel'>
						<div class='col-xs-2'>ID</div>
						<div class='col-xs-3'>Fantasia</div>
						<div class='col-xs-2'>CNPJ</div>
						<div class='col-xs-4'>Ações</div>
			</div>";
	$class_item = "bg-warning";
		while ($empresa_item = $sql_geral->fetch(PDO::FETCH_ASSOC) )
			{
				echo "<div class='row dados_rel $class_item'>
						<div class='col-xs-2'>$empresa_item[id_empresa]</div>
						<div class='col-xs-3'>$empresa_item[fantasia]</div>
						<div class='col-xs-2'>$empresa_item[cnpj]</div>
						<div class='col-xs-4'>
							<span class='btn btn-info' onclick='listarVagas($empresa_item[id_empresa])'>Ver VAGAS</span>
							<span class='btn btn-primary' onclick='enviarForm(\"/egvagas/admin/formulario_vaga.php\",{id_empresa:$empresa_item[id_empresa]})'>Incluir VAGA</span>
							<span class='btn btn-warning' onclick='enviarForm(\"/egvagas/admin/formulario_empresa.php\",{id_empresa:$empresa_item[id_empresa]})'>EDITAR</span>
							<span class='btn btn-danger btn-xs disabled' onclick='excluirEmpresa($empresa_item[id_empresa])'>excluir</span>
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
							<a onclick='listarEmpresas(\"$criterio\", \"$valor\", $pagina_atual - 1)' aria-label='Previous'>
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
							echo " <li ><a onclick='listarEmpresas(\"$criterio\", \"$valor\", $i)'>$i</a></li>";
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
								echo " <li ><a onclick='listarEmpresas(\"$criterio\", \"$valor\", $i)'>$i</a></li>";
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
									echo " <li ><a onclick='listarEmpresas(\"$criterio\", \"$valor\", $mysql_a)'>$mysql_a</a></li>";
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
									echo " <li ><a onclick='listarEmpresas(\"$criterio\", \"$valor\", $mysql_b)'>$mysql_b</a></li>";
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
				      		<a onclick='listarEmpresas(\"$criterio\", \"$valor\", $pagina_atual + 1)' aria-label='Next'>
				        		<span aria-hidden='true'>&raquo;</span>
				      		</a>
				      	  </li>";
				}
			
				echo "</ul></nav></div>";
			}
}
else
{
		echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
      <h4>Nenhum registro foi encontrado.</h4>
      <p>Experimente alterar os critérios de busca!</p>
      <p>
        <button type='button' class='btn btn-danger'  data-dismiss='alert' aria-label='Close'>OK</button>
      </p>
    </div>";	
}
?>