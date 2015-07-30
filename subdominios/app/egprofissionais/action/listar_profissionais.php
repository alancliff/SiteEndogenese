<?php
/* ========================================================================
 * EG Profissionais - listar_profissionais.php  V. 1.0
 * Endogênese Consultoria e Serviços LTDA
 * ========================================================================
 * Finalidade: Cria a lista de profissionais que aparecerão na home-page, conforme a profissão escolhida.
 * Autor: Alan Cliff
 * Última Atualização - 18/05/2015
 * ======================================================================== */

include "../includes/conexao.php";
require $_SERVER["DOCUMENT_ROOT"]."/egvagas/includes/constantes.php"; 
//prepara query para obter total de linhas;
$profissao = $_POST["prof"] ;
if ($profissao == "todas") {
	$sql_geral = $conexao->prepare("SELECT *
				FROM profissionais
				WHERE ativa = true
				");
}
else{
	$sql_geral = $conexao->prepare("SELECT *
				FROM profissionais
				WHERE ativa = true
				AND profissao = '$profissao'
				");
}


//Dados para paginação;
$sql_geral->execute(); //realiza consulta para saber a quantidade de linhas;
$num_registros = $sql_geral->rowCount(); //obtem número de linhas;
$registros_por_pagina = 10; //informa quantas registros aparecerão por vez em cada página;
$pagina_atual = $_POST["pagina_atual"]; //captura o valor da página atual;
$num_pagina = ceil($num_registros/$registros_por_pagina); //calcula a quantidade de páginas totais. Ex: se temos 50 registos e aparece 10 por página, então temos 5 páginas;
$inicio = $registros_por_pagina * ($pagina_atual-1); //calcula o ponto de partida para a consulta, dentro do banco de dados;
$max_pagina = 5; //informa quantos elementos de páginação haverá na apresentação;
$meio_pag = floor($max_pagina/2);

//consulta para se obter os registros a cada página;
if ($profissao == "todas") {
	$sql_geral = ("SELECT *
				FROM profissionais
				WHERE ativa = true
				ORDER BY dt_inclusao DESC
				LIMIT $registros_por_pagina OFFSET $inicio");
}
else{
	$sql_geral = ("SELECT *
				FROM profissionais
				WHERE ativa = true
				AND profissao = '$profissao'
				ORDER BY dt_inclusao DESC
				LIMIT $registros_por_pagina OFFSET $inicio");
}
$sql_geral = $conexao->prepare($sql_geral);
$sql_geral->execute();
	//verifica se retorna linhas;

	if ($sql_geral->rowCount() > 0)
		{	
			//se retornou, captura os dados e trata para exibição;
			echo "<h2 class='text-center'>A busca por \"$profissao\" retornou $num_registros registro(s). </h2>";
			while ($valor = $sql_geral->fetch(PDO::FETCH_ASSOC) )
			{
				// if ($valor["img_cartao"] <> "")
				// {
				// 	echo "<div class='col-xs-6 col-lg-4' style='margin-bottom: 10px;'><div data-toggle='modal' data-target='#ModalProfissional' data-idprofissional='$valor[id_profissional]' class='cartao_visita' style='background-image: url(\"".SITE.DIR."/img/$valor[img_cartao]\")'>
				// 		 </div></div>";
				// }
				// else
				// {
					if ($valor[img_foto] == "") {
						$img_foto = 'avatar.png';
					}
					else{
						$img_foto = $valor[img_foto];
					}
					echo "<div class='row box-profissional' data-toggle='modal' data-target='#ModalProfissional' data-idprofissional='$valor[id_profissional]'>";
					echo   "<div class='col-xs-3' style='margin-bottom: 10px;'>
					    <div style='background-image: url(\"".SITE.DIR."/img/$img_foto\");' class='foto'></div>
					  </div>
					    <div class='col-xs-9'>
					  <p class='fonte-md nomeProf'>$valor[nome_conhecido]</p>
					  <p class='fonte-sm funcaoProf'>$valor[profissao]</p>
					  <br>
					  <p class='fonte-xs'>Atividades:</p>
					  <p class='text-justify'>".substr($valor[atividades], 0, 340)."... (Clique e saiba mais)</p>
					    
					  </div>";
					// echo "<div class='col-xs-6 col-lg-4' style='margin-bottom: 10px;'><div data-toggle='modal' data-target='#ModalProfissional' data-idprofissional='$valor[id_profissional]' class='cartao_visita' style='background-color: white;'>
					//         <div style='background-image: url(\"".SITE.DIR."/img/img.png\");' class='foto'></div>
					//         <div class='textoProf'>
					//         <p class='fonte-sm text-center nomeProf'>$valor[nome_conhecido]</p>
					//         <p class='fonte-xs text-center funcaoProf'>$valor[profissao]</p>
					//   	  </div></div></div>";
				// }
				echo "</div>";
			}
			
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
							<a onclick='listaProfissionais($pagina_atual - 1, \"$profissao\")' aria-label='Previous'>
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
							echo " <li ><a onclick='listaProfissionais($i, \"$profissao\")'>$i</a></li>";
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
								echo " <li ><a onclick='listaProfissionais($i, \"$profissao\")'>$i</a></li>";
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
									echo " <li ><a onclick='listaProfissionais($mysql_a, \"$profissao\")'>$mysql_a</a></li>";
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
									echo " <li ><a onclick='listaProfissionais($mysql_b, \"$profissao\")'>$mysql_b</a></li>";
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
				      		<a onclick='listaProfissionais($pagina_atual + 1, \"$profissao\")' aria-label='Next'>
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