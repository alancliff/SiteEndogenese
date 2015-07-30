<?php
/* ========================================================================
 * EG Profissionais - detalhar_profissional.php  V. 1.0
 * Endogênese Consultoria e Serviços LTDA
 * ========================================================================
 * Finalidade: Consulta o profissional selecionado e envia os detalhes.
 * Autor: Alan Cliff
 * Última Atualização - 18/05/2015
 * ======================================================================== */
include "../includes/conexao.php";
require $_SERVER["DOCUMENT_ROOT"]."/egvagas/includes/constantes.php"; 
$id_profissional = $_POST["id_profissional"]; 

$sql_geral = ("SELECT *
				FROM profissionais
				WHERE id_profissional = $id_profissional");
$a = $sql_geral;
$sql_geral = $conexao->prepare($sql_geral);
$sql_geral->execute();
	//verifica se retorna linhas;

	if ($sql_geral->rowCount() > 0)
		{	
			//se retornou, captura os dados e trata para exibição;
			while ($valor = $sql_geral->fetch(PDO::FETCH_ASSOC) )
			{
			
			if ($valor[img_foto] <> "") {
				$img_foto = $valor[img_foto];
			}
			else{
				$img_foto = 'avatar.png';
			}
      		echo "<div class='modal-header'>
        		<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
        		<h4 class='modal-title text-center' id='ModalProfissionalLabel'>$valor[nome_conhecido] - $valor[profissao]</h4>
      		</div>
      		<div class='modal-body'>
      			<div class='row'>
      			    <div class='col-md-5'>
						<div style='background-image: url(\"".SITE.DIR."/img/$img_foto\"); margin:auto;' class='foto_detalhe' ></div> 
					</div>
      				<div class='col-md-7'><fieldset><legend>Dados Pessoais</legend>
				        <div class='fonte-md'>$valor[nome_completo]</div>
						<div class='fonte-sm'>$valor[fone_a]</div>
						<div class='fonte-sm'>$valor[fone_b]</div>
						<div class='fonte-sm'>$valor[email_profissional]</div>
						<div><a href='$valor[link]' target='blank'>$valor[link]</a></div>
						
					</fieldset></div>
					
					<div class='col-md-12'><fieldset><legend>Localização</legend>";
					if ($valor[logradouro] <> "") {
						echo "<div class='text-justify'>$valor[logradouro], $valor[numero]</div>";
					}
						
					echo "<div class='text-justify'>$valor[bairro] / $valor[cidade]-$valor[uf]</div>
					</fieldset></div>
					
					<div class='col-md-12'><fieldset><legend>Atividades</legend>
						<div class='text-justify'>$valor[atividades]</div>
					</fieldset></div>";
					if ($valor[referencias] <> "") {

					echo "<div class='col-md-12'><fieldset><legend>Referências</legend>
						<div class='text-justify'>$valor[referencias]</div>
					</fieldset></div>";
						}

				echo "</div>
		    </div>
		    <div class='modal-footer'>";

		    $sqlRegistra = $conexao->prepare("INSERT INTO visitas
				VALUES (default, $id_profissional,default)");
 			$sqlRegistra->execute();
		    
		    $sqlContagem = $conexao->prepare("SELECT COUNT(*) contagem FROM visitas WHERE id_profissional = $id_profissional");
		    $sqlContagem->execute();

			    while ($visita = $sqlContagem->fetch(PDO::FETCH_ASSOC) )
				{

			    echo"<div class='pull-left'><span id='cont' class='btn btn-info' style='font-weight: bold;'>Visualizações: $visita[contagem]</span></div>
			        <button type='button' class='btn btn-info' data-dismiss='modal' style='font-weight: bold;'>FECHAR</button>
			    </div>";
				}


				



				
			
			}

			

		}
	else
		{
			echo "Ocorreu um erro<br>$a";
		}

 //<div>Cadastrado em: ".date('d/m/Y', strtotime("$valor[dt_inclusao]"))."</div>
?>