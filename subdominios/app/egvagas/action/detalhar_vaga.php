<?php
include $_SERVER["DOCUMENT_ROOT"]."/padrao/conexao_egvagas.php";

$id_vaga = $_POST["id_vaga"];
$pagina_atual = $_POST["pagina_atual"];
if ($_POST["criterio"] == "" && $_POST["valor"] == "" ) {
	$funcaoJava = "listaGeral($pagina_atual)";
}
else
{
	$funcaoJava = "buscarVaga(\"$_POST[criterio]\", \"$_POST[valor]\", $pagina_atual)";
}

$detalhe_vaga = ("SELECT a.*, b.emp_email, b.fantasia, b.emp_telefone_a, b.emp_telefone_b,
				b.setor_predominante, b.responsavel, b.emp_logradouro, b.emp_num, b.observacao, b.emp_comp, 
				b.emp_bairro, b.emp_cidade, b.emp_uf, b.emp_site, b.latitude, b.longitude
				FROM vagas a 
				INNER JOIN empresas b on a.id_empresa = b.id_empresa
				WHERE a.id_vaga = $id_vaga
				AND a.ativa = true");
$detalhe_vaga = $conexao->prepare($detalhe_vaga);

//Prepara a lista de vagas a serem enviadas;
try
{
 $detalhe_vaga->execute();
}
catch(PDOException $e){
  echo $e->getMessage();
  $arr = $sql->errorInfo();
  print_r($arr);
}

if ($detalhe_vaga->rowCount() > 0) 
{
	while ($vaga_item = $detalhe_vaga->fetch(PDO::FETCH_ASSOC) )
			{
				echo "<a class='btn btn-default btn-voltar' style='margin-bottom: 20px;' onclick='".$funcaoJava."' style='cursor:pointer;'>Voltar</a>
		<div class='row'>
			<div class='col-xs-12'>
				<div class='box-info' style='min-height:90px; '>
					<p class='info-bloco'>Cargo</p><p class='dados fonte-lg'>$vaga_item[cargo]</p>
				</div>
			</div>
			
		</div>
		<div class='row'>
			<div class='col-xs-4'>
				<div class='box-info' style='min-height:160px;'>
					<p class='info-bloco'>Formação Exigida</p><p class='dados fonte-md'  style='margin-top:10%;'>$vaga_item[formacao_exg]</p>
	
				</div>
			</div>
			<div class='col-xs-5' >
				<div class='row' style='height:80px;'>
					<div class='col-xs-6'>

						<div class='box-info' >
							<p class='info-bloco'>Vagas</p><p class='dados fonte-sm'>$vaga_item[qtde_ofertada]</p>
			
						</div>
					</div>
					<div class='col-xs-6'>
						<div class='box-info'>
							<p class='info-bloco'>Vagas <abbr title='Portador de Necessidades Especiais'>PNE</abbr></p><p class='dados fonte-sm'>$vaga_item[qtde_pne]</p>
			
						</div>
					</div>
				</div>
				<div class='box-info' style='height:80px;'>
					<p class='info-bloco'>Escolaridade</p><p class='dados fonte-sm'>$vaga_item[escolaridade_exg]</p>
	
				</div>
			</div>
			<div class='col-xs-3'>
				<div class='box-info'>
					<p class='info-bloco'>Período de Trabalho</p>";

					if ($vaga_item['trab_matutino']) {
						echo "<div class='periodo-green'>
					<p class='dados fonte-xs' style='text-align: left;'>Matutino <span class='glyphicon glyphicon-ok periodo-icone' aria-hidden='true'></span></p>
					</div>";
						
					}
					else
					{
						echo "<div class='periodo-red'>
					<p class='dados fonte-xs' style='text-align: left;'>Matutino <span class='glyphicon glyphicon-remove periodo-icone' aria-hidden='true'></span></p>
					</div>";
					}

					if ($vaga_item['trab_vespertino']) {
						echo "<div class='periodo-green'>
					<p class='dados fonte-xs' style='text-align: left;'>Vespertino <span class='glyphicon glyphicon-ok periodo-icone' aria-hidden='true'></span></p>
					</div>";
						
					}
					else
					{
						echo "<div class='periodo-red'>
					<p class='dados fonte-xs' style='text-align: left;'>Vespertino <span class='glyphicon glyphicon-remove periodo-icone' aria-hidden='true'></span></p>
					</div>";
					}

					if ($vaga_item['trab_noturno']) {
						echo "<div class='periodo-green'>
					<p class='dados fonte-xs' style='text-align: left;'>Noturno <span class='glyphicon glyphicon-ok periodo-icone' aria-hidden='true'></span></p>
					</div>";
						
					}
					else
					{
						echo "<div class='periodo-red'>
					<p class='dados fonte-xs' style='text-align: left;'>Noturno <span class='glyphicon glyphicon-remove periodo-icone' aria-hidden='true'></span></p>
					</div>";
					}
	
			echo "</div>
				
			</div>
		</div>

<div role='tabpanel' class='tab-panel'>

  <!-- Nav tabs -->
  
  <ul class='nav nav-tabs tab-titulo' role='tablist'>
     <li role='presentation' class='active'><a href='#hab-basica' aria-controls='hab-basica' role='tab' data-toggle='tab'>Habilidades<br>Básicas</a></li>";
     if ($vaga_item[habilidades_desejaveis] <> "") {
     	echo "<li role='presentation'><a href='#hab-desejavel' aria-controls='hab-desejavel' role='tab' data-toggle='tab'>Habilidades<br>Desejáveis</a></li>";
     }
    
    echo "<li role='presentation'><a href='#desc-atividade' aria-controls='desc-atividade' role='tab' data-toggle='tab'>Descrição das<br>Atividades</a></li>";
    if ($vaga_item[descricao_pne] <> "") {
    	echo "<li role='presentation'><a href='#observacao-pne' aria-controls='observacao-pne' role='tab' data-toggle='tab'>Observações<br><abbr title='Portador de Necessidades Especiais'>PNE</abbr></a></li>";
	}
  echo "</ul>
<hr style='margin-top:-5px;'>
  <!-- Tab panes -->
	<div class='tab-content'>
	  <div role='tabpanel' class='tab-pane fade in active' id='hab-basica'>$vaga_item[habilidades_basicas]</div>
	  <div role='tabpanel' class='tab-pane fade' id='hab-desejavel'>$vaga_item[habilidades_desejaveis]</div>
	  <div role='tabpanel' class='tab-pane fade' id='desc-atividade'>$vaga_item[descricao_atividades]</div>
	  <div role='tabpanel' class='tab-pane fade' id='observacao-pne'>$vaga_item[descricao_pne]</div>
	</div>

</div>

<div>&nbsp;</div>
		<div class='row'>
			<div class='col-xs-3'>
				<div class='container-title box-info' style='height:170px;'>
					<p class='info-bloco'>Salário</p><p class='dados fonte-md' style='margin-top: 20%'>";

					if ($vaga_item[salario] <> "") {
						echo number_format($vaga_item[salario], 2, ',', '.');
					}
					else
					{
						echo "A combinar";
					}

					echo "</p>
	
				</div>
			</div>
			<div class='col-xs-5' >
				<div class='row' >
					<div class='col-xs-12'>
						<div class='row'>
							<div class='col-xs-6'>
								<div class='box-info' style='height: 50px;'>
									<p class='info-bloco'>Comissão</p><p class='dados fonte-sm'>$vaga_item[comissao]</p>
					
								</div>
							</div>
							<div class='col-xs-6'>
								<div class='box-info' style='height: 50px;'>
									<p class='info-bloco'>Necess. Viajar</p><p class='dados fonte-sm'>$vaga_item[viagem_frequente]</p>
					
								</div>
							</div>

						</div>
					</div>
					<div class='col-xs-12'>
						<div class='box-info' style='height: 50px;'>
							<p class='info-bloco'>Periodicidade de pagamento</p><p class='dados fonte-sm'>$vaga_item[periodicidade_pagamento]</p>
			
						</div>
					</div>
					<div class='col-xs-12'>
						<div class='box-info' style='height: 50px;' >
							<p class='info-bloco'>Tempo de Experiência</p><p class='dados fonte-sm'>$vaga_item[tempo_exp_exg]</p>
			
						</div>
					</div>
				</div>
			</div>

			<div class='col-xs-4' >
				<div class='row' style='height:50px;'>
					<div class='col-xs-6'>
						<div class='box-info' style='height: 85px;' >
							<p class='info-bloco'>C.H. Semanal</p><p class='dados fonte-xs'>$vaga_item[carga_semanal]</p>
			
						</div>
					</div>
					<div class='col-xs-6'>
						<div class='box-info' style='height: 85px;'>
							<p class='info-bloco'>Duração do Emprego</p><p class='dados fonte-xs'>$vaga_item[duracao_emprego]</p>
			
						</div>
					</div>
					<div class='col-xs-12'>
						<div class='box-info' style='height: 75px;'>
							<p class='info-bloco'>Gênero de Preferência</p><p class='dados fonte-sm'>$vaga_item[genero_preferencia]</p>
			
						</div>
					</div>
				</div>
			</div>

		</div>


		<div class='row' style='margin:auto; width: 450px;'>
			
			<button class='btn btn-primary btn-lg' type='button' data-toggle='collapse' data-target='#contato_empresa' aria-expanded='false' aria-controls='collapseExample' style='width: 450px'><span class='fonte-md'>QUERO ESTE EMPREGO!</span><br><span class='glyphicon glyphicon-download' aria-hidden='true'></span></button>
		</div>
		<div>&nbsp;</div> 
		<div class='row'>

			<div class='collapse' id='contato_empresa'>
			
			  <div class='row'>
			    <div class='col-xs-12'>
			    	<div class='box-info' style='height:100px;'>
					<p class='dados fonte-xs'>Entre em contato com a EMPRESA OFERTANTE para obter mais informações e se inscrever para esta vaga de emprego!</p><p class='dados fonte-lg'>$vaga_item[fantasia]</p>
					</div>
			    </div>";
			    if ($vaga_item[observacao] <> "") {
			    	echo "<div class='col-xs-12'>
			    	<div class='box-info' style='height:120px;'>
					<p class='info-bloco'>Observações</p><p class='dados fonte-md'>$vaga_item[observacao]</p>
					</div>
			    </div>";
			    }
			    

			  	echo "<div class='col-xs-6'>
					<div class='box-info' style='height:140px;'>
							<p class='info-bloco'>Responsável</p><p class='dados fonte-md'  style='margin-top:30px'>$vaga_item[responsavel]</p>
					</div>
			  	</div>
			  	<div class='col-xs-6'>
					<div class='row' >
							<div class='col-xs-12'>
								<div class='box-info' style='height: 40px;'>
									<p class='info-bloco'>Fone 1</p><p class='dados fonte-xs' style='margin-top:-20px'>$vaga_item[emp_telefone_a]</p>
					
								</div>
							</div>
							<div class='col-xs-12'>
								<div class='box-info' style='height: 40px;'>
									<p class='info-bloco'>Fone 2</p><p class='dados fonte-xs'  style='margin-top:-20px'>$vaga_item[emp_telefone_b]</p>
					
								</div>
							</div>
							<div class='col-xs-12'>
								<div class='box-info' style='height: 40px;' >
									<p class='info-bloco'>E-mail</p><p class='dados fonte-xs'  style='margin-top:-20px'>$vaga_item[emp_email]</p>
					
								</div>
							</div>
						</div>
					</div>
			  	</div>
			  	<div class='row'>
				    <div class='col-xs-12'>
				    	<div class='box-info' style='height:60px;'>
							<p class='info-bloco'>Ramo de atividade da empresa</p><p class='dados fonte-xs'>$vaga_item[setor_predominante]</p>
						</div>
				    </div>
				</div>
				<div class='row'>
					<div class='col-xs-6'>
						<div class='box-info' style='height:150px;'>
							<p class='info-bloco'>Endereço</p><p class='dados fonte-xs'>$vaga_item[emp_logradouro], $vaga_item[emp_num]";
							if ($vaga_item[emp_comp] <> "") {
								echo " ($vaga_item[emp_comp])";
							}

							echo " - $vaga_item[emp_bairro] / $vaga_item[emp_cidade]-$vaga_item[emp_uf]</p>
						</div>
					</div>

					<div class='col-xs-6' style='height:150px;'>
						<div class='clear'></div>
						<div class='mapa box-info' id='map'><span class='btn btn-default btn-mapa' onclick='geraMapa(\"map\", \"$vaga_item[latitude]\", \"$vaga_item[longitude]\")'>Veja no Mapa</span></div>
						<div class='clear'></div>
					</div>





					</div>


				</div>	
						


			  </div><div>&nbsp;</div> 
						
			

</div>

<a class='btn btn-default btn-voltar' style='margin-bottom: 20px;' onclick='".$funcaoJava."' style='cursor:pointer;'>Voltar</a>";

$sqlIncrementa = $conexao->prepare("UPDATE vagas
				SET qtde_visualiza = $vaga_item[qtde_visualiza]+1
				WHERE id_vaga = $id_vaga");



 $sqlIncrementa->execute();



}
}
 
else
{

	// echo "Página não encontrada";
	header("location: /egvagas/action/lista_geral.php");

}
	



?>