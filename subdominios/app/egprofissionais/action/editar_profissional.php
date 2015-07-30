<?php
/* ========================================================================
 * EG Profissionais - editar_profissional.php  V. 1.0
 * Endogênese Consultoria e Serviços LTDA
 * ========================================================================
 * Finalidade: Consulta o profissional e abre nos campos para edição.
 * Autor: Alan Cliff
 * Última Atualização - 20/05/2015
 * ======================================================================== */
include "../includes/conexao.php";
require $_SERVER["DOCUMENT_ROOT"]."/egvagas/includes/constantes.php"; 
date_default_timezone_set('America/Santarem');
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
				echo "<form id='edit_profissionais' method='post'>
		        <div class='modal-header'>
		        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
		        <h4 class='modal-title text-center' id='ModalEditCadastroLabel'>Edição  - Profissional Autônomo</h4>
		      </div>
		      
		      <div class='modal-body'>
		        <fieldset><legend>Dados Básicos</legend>
		          <div class='row'>
		          <div class='col-sm-4'>
		            <div id='preview_foto' style='background-image: url(\"".SITE.DIR."/img/$img_foto\");' class='foto' ></div>
		          </div>
		          <div class='col-sm-6'>
		           <label for='img_foto'> Escolha uma Foto:<br></label><input type='file' id='img_foto' name='img_foto'>
		          </div>
		        </div>
		        
		        <div class='row' style='margin-top:20px'>
		          <div class='col-xs-12 col-sm-4'>
		            <label for='profissao'>*Sua Profissão:</label><br><input type='text' id='profissao' name='profissao' size='15' maxlength='100' value='$valor[profissao]' required>
		          </div>
		          <div class='col-xs-12 col-sm-4'>
		            <label for='nome_conhecido'>*Nome Público:</label><br><input type='text' id='nome_conhecido' name='nome_conhecido' size='15' maxlength='250' required value='$valor[nome_conhecido]'>
		          </div>
		          <div class='col-xs-12 col-sm-4'>
		            <label for='nome_completo'>*Nome Completo:</label><br><input type='text' id='nome_completo' name='nome_completo' size='15' maxlength='250' required value='$valor[nome_completo]'>
		          </div>
		          <div class='col-xs-12 col-sm-4'>
		            <label for='genero'>Gênero:</label><br>
		            <select id='genero' name='genero'>";
		            $genero = array("N"=>"Não Informado", "F"=>"Feminino", "M"=>"Masculino");
		            foreach($genero as $key => $val) {
						    if ($valor[genero] == $key) {
						    	echo "<option value='$key' selected>$val</option>";
						    }
						    else
						    {
						    	echo "<option value='$key'>$val</option>";
						    }

					}
		            echo "</select>
		          </div>
		        </div>
		        </fieldset>
		        <fieldset style='margin-top:20px'><legend>Contatos</legend>
		          <div class='row'>
		          <div class='col-xs-12 col-sm-6'>
		            <label for='fone_a'>*Telefone 1:</label><br><input type='text' id='fone_a' name='fone_a' size='15' maxlength='14' required value='$valor[fone_a]'>
		          </div>
		          <div class='col-xs-12 col-sm-6'>
		            <label for='email_profissional'>*e-mail:</label><br><input type='text' id='email_profissional' name='email_profissional' size='15' maxlength='100' placeholder='email@email.com' required value='$valor[email_profissional]'>
		          </div>
		          <div class='col-xs-12 col-sm-6'>
		            <label for='fone_b'>Telefone 2:</label><br><input type='text' id='fone_b' name='fone_b' size='15' maxlength='14' value='$valor[fone_b]'>
		          </div>
		          <div class='col-xs-12 col-sm-6'>
		            <label for='link'>Perfil Social/Página Web:</label><br><input type='text' id='link' name='link' size='20' maxlength='200' value='$valor[link]'>
		          </div>
		        </div>
		        </fieldset>
		        <fieldset style='margin-top:20px'><legend>Endereço</legend>
		          <div class='row'>
		          <div class='col-xs-12 col-sm-5'>
		            <label for='logradouro'>Logradouro:</label><br><input type='text' id='logradouro' name='logradouro' size='30' maxlength='250' placeholder='Rua, Av. Trav.' value='$valor[logradouro]'>
		          </div>
		          <div class='col-xs-12 col-sm-3'>
		            <label for='numero'>Número:</label><br><input type='text' id='numero' name='numero' size='5' maxlength='8' value='$valor[numero]'>
		          </div>
		          <div class='col-xs-12 col-sm-4'>
		           <label for='bairro'>*Bairro:</label><br><input type='text' id='bairro' name='bairro' size='15' maxlength='150' placeholder='Bairro' required value='$valor[bairro]'>
		          </div>
		          <div class='col-xs-12 col-sm-4'>
		            <label for='cidade'>*Cidade:</label><br><input type='text' id='cidade' name='cidade' size='15' maxlength='150' placeholder='Cidade' required value='$valor[cidade]'>
		          </div>
		          <div class='col-xs-12 col-sm-2'>
		            <label for='uf'>*UF:</label><br>
		            <select id='uf' name='uf' required>";
		            $estados['PA'] = "PA";
					$estados['AC'] = "AC";
					$estados['AM'] = "AM";
					$estados['AP'] = "AP";
					$estados['TO'] = "TO";
					$estados['RO'] = "RO";
					$estados['RR'] = "RR";
		            foreach($estados as $key => $val) {
						    if ($valor[uf] == $key) {
						    	echo "<option value='$key' selected>$val</option>";
						    }
						    else
						    {
						    	echo "<option value='$key'>$val</option>";
						    }

					}
		            echo "</select>
		          </div>
		        </div>
		        </fieldset>
		        <fieldset style='margin-top:20px'><legend>Adicionais</legend>
		        <div class='row'>
		          <div class='col-xs-12'>
		            <label for='atividades'>*Quais as atividades que você executa?</label><br>
		            <textarea id='atividades' name='atividades' rows='6' cols='50' placeholder='Descreva resumidamente os principais serviços que você presta.' required>$valor[atividades]</textarea>
		          </div>

		          <div class='col-xs-12' style='margin-top:20px'>
		            <label for='referencias'>Informe suas experiências anteriores, se possível com contatos de referências:</label><br>
		            <textarea id='referencias' name='referencias' rows='6' cols='50' placeholder='Ex.: Prestação de \"SERVIÇOS\" para a \"EMPRESA X\" ou \"PESSOA Y\", contato (xx)xxxx-xxxx.'>$valor[referencias]</textarea>
		          </div>
		        </div>
		        </fieldset>
		      </div>
		      <div class='modal-footer'>
		        <div>
		          <div class='has-success text-justify'>
		          <input type='hidden' id='dt_atualizacao' name='dt_atualizacao' value='".date("Y-m-d H:i:s")."'>
		          <input type='hidden' id='ativa' name='ativa' value='1'>
		          <input type='hidden' id='id_profissional' name='id_profissional' value='$valor[id_profissional]'> 
		            <strong>(*)Campos de preenchimento Obrigatórios.</strong>
		            
		          </div>
		         </div>
		        <button type='button' class='btn btn-danger pull-left' data-dismiss='modal' style='font-weight: bold;'>CANCELAR</button>
		        <button type='button'  onclick='atualizaProfissional(\"edit_profissionais\")' class='btn btn-success pull-right' style='font-weight: bold;'>CADASTRAR</button>
		        
		      </div>
		    </form>";
			}
		}
	else
		{
			echo "Ocorreu um erro<br>";
		}

?>