<?php

/*
 * Por Fabrício Ribeiro
 * Classe Funcao
 *
 * - Métodos da classe -
 *
 * string formatarPreco(float $valor)
 * float desformatarPreco(string $valor)
 * array capturarUrlAmigavel()
 * string Raiz()
 * string enviarEmail($destinarario, $assunto, $mensagem) //Adicionado por Fabrício Ribeiro
 * string gerarSenha();
 * gerarSelectOptions($table, $campo_option, $campo_value , $idselected) // gera um select  com opções do banco
 * gerarArraySelectOptions($array, $idselected) // gera um select a partir de um array
 * gerarPaginacao($link_pagina, $qtd_paginas, $pagina_atual, $id, $class) // cria a estrutura de um sistema paginação
*/

class Funcao{
	
	//Formata para o padrão brasileiro do Real.
	public static function formatarPreco($valor){

		if(is_float($valor)){

			return "R$ " . number_format($valor,2,",",".");

		}

	}


	public static function desformatarPreco($valor){
		
		$array = array("0","1","2","3","4","5","6","7","8","9",".");

		if(is_string($valor)){
			$valor = str_replace(".","",$valor);// adicionado por Fabrício Ribeiro
			$valor = str_replace(",",".",$valor);
			$valor = str_replace("R$","",$valor);
			$valor = str_replace(" ","",$valor);
			$number = "";
			
			for($i=0;$i<strlen($valor);$i++){
				$v = $valor[$i];
				if(in_array($v,$array)){
					$number .= $v;
				}
			}
			return (float)$number;

		}

	}

	//Captura e retorna um array da url amigável
	public static function capturarUrlAmigavel(){

		if(isset($_GET['url'])){

			$barra = array();

			$barra = explode("/",$_GET['url']);

			return $barra;

		}else{

			return false;

		}

	}

	//Retornar a raíz do sistema
	public static function Raiz(){

		$raiz = array();
		$raiz = explode("/",$_SERVER['PHP_SELF']);

		$caminho = NULL;

		for($i = 0; $i < count($raiz); $i++){

			if($i != (count($raiz) - 1)){

				$caminho .= $raiz[$i] . "/";

			}

		}

		return $caminho;

	}


	public static function enviaEmail($destinatario = NULL, $assunto = NULL, $mensagem = NULL, $anexo = NULL){
		
		require_once("phpmailer/class.phpmailer.php");
		
		if($destinatario !=null || $assunto != null || $mensagem !=null){

			$config = new Objeto('empresa');
  			$config->selecionarTudo();
  			$config = $config->retornar();

			$email_contato = $config['email'];
			$assunto = $assunto." - ".$config['titulo_site'];

			$email = new PHPMailer();
			$email->From      = $email_contato;
			$email->FromName  = $email_contato;
			$email->Subject   = utf8_decode($assunto);
			$email->Body      =  $mensagem;
			$email->AddAddress( $destinatario);
			$email->isHtml(true);
			$email->SMTPDebug  = 2;

			if(file_exists($anexo) and !empty($anexo)){
				$email->AddAttachment($anexo);
			}

			if($email->Send()){
				$envio = true;
				$email->ClearAddresses();  
			}else{
				echo $email->ErrorInfo;
				$envio = false;
			}

		}else{
			$envio = false;
		}

		return $envio;
	}

    public static function gerarSenha($tamanho=9, $forca=0) {
	    $vogais = 'aeuy';
	    $consoantes = 'bdghjmnpqrstvz';

	    if ($forca >= 1) {
	    	$consoantes .= 'BDGHJLMNPQRSTVWXZ';
	    }

	    if ($forca >= 2) {
	   		$vogais .= "AEUY";
	    }

	    if ($forca >= 4) {
	    	$consoantes .= '23456789';
	    }

	    if ($forca >= 8 ) {
	    	$vogais .= '@#$%';
	    }
	     
	    $senha = '';
	    $alt = time() % 2;
	    for ($i = 0; $i < $tamanho; $i++) {
		    if ($alt == 1) {
			    $senha .= $consoantes[(rand() % strlen($consoantes))];
			    $alt = 0;
		    } else {
			    $senha .= $vogais[(rand() % strlen($vogais))];
			    $alt = 1;
		    }
	    }
	    return $senha;
	}


	public static function gerarSelectOptions($table, $campo_option, $campo_value = NULL, $idselected = NULL){
		
		if(is_null($campo_value)){
			$campo_value = "id";
		}
		

		
		$return = "";
		$objeto = new Objeto($table);
		$objeto->selecionarTudo();
		foreach($objeto->retornarDados() as $option){
			
			if($option[$campo_value] == $idselected){$selected = ' selected="selected"';}else{$selected = "";}
			
			$return .= '<option value="'.$option[$campo_value].'"'.$selected.'>'.$option[$campo_option].'</option>';
			
		}
		
		return $return;
	}

	//Array (""=>"Selecione...","Masculino","Feminino") só passe strings;
	public static function gerarArraySelectOptions($array,$idselected = NULL){
		
		$return = "";
		if(gettype($array) === "string" and $array === "s/n"){
			if($idselected === NULL){
				return "<option value=\"\">Selecione...</option>\n<option value=\"1\">Sim</option><option value=\"0\">Não</option>";
			}else{
				if($idselected == "1"){
					return "<option value=\"\">Selecione...</option>\n<option value=\"1\" selected=\"selected\">Sim</option><option value=\"0\">Não</option>";
				}elseif($idselected == "0"){
					return "<option value=\"\">Selecione...</option>\n<option value=\"1\">Sim</option><option value=\"0\" selected=\"selected\">Não</option>";
				}
			}
		}
		foreach($array as $k=>$option){
			$value = gettype($k)=="integer"?$option:$k;
			$mask = $option;
			if($value == $idselected){$selected = ' selected="selected"';}else{$selected = "";}
			
			$return .= '<option value="'.$value.'"'.$selected.'>'.$mask.'</option>'."\n";
			
		}
		
		return $return;
	}


	public static function gerarPaginacao($link_pagina, $qtd_paginas, $pagina_atual, $id = NULL, $class = NULL){

		$paginacao = '';
		if($qtd_paginas > 1 && $pagina_atual <= $qtd_paginas){

			$paginacao = "<ul ".$id." ".$class.">";

			$pagina_inicial = ($pagina_atual > 10 ) ? $pagina_atual - 9 : 1;

			$paginacao .= "<li><a href='".$link_pagina.'/'.(($qtd_paginas>10 && $pagina_inicial>1) ? ($pagina_inicial-1): $pagina_inicial)."'>&laquo;</a></li>";

			for ($i = $pagina_inicial; $i <= $qtd_paginas; $i++) { 
				
				if($i == $pagina_inicial+10)
					break;

				if($i == $pagina_atual)
					$ativo = "class='active'";
				else
					$ativo = "";

				$paginacao .= "<li ".$ativo."><a href='".$link_pagina."/".$i."'>".$i."</a></li>";
			}

			$paginacao .= "<li><a href='".$link_pagina.'/'.(($qtd_paginas>10) ? ($pagina_inicial+10): $qtd_paginas)."'>&raquo;</a></li>";

			$paginacao .= "</ul>";

		}

		return $paginacao;
	}
}

?>