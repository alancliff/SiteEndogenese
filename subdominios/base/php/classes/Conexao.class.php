<?php
/*
 * Por Fabrício Ribeiro
 * Classe Conexao
 */
	class Conexao{

		############## PROPRIEDADES ###############
		protected $servidor		= "localhost";
		//protected $usuario		= "root";
		protected $usuario		= "root";
		protected $porta		= "3306";
		protected $senha		= "";
		//protected $senha		= "";
		protected $nomeBanco	= "endog103_kananda";
		//protected $nomeBanco	= "kananda";
		protected $conexao 		= NULL;

		################# MÉTODOS ###################
		public function Conecta(){			

			//Armazena configurações exclusivas de cada SGBD
    		$configuracoes_extras = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
		try {

		      $this->conexao = new PDO('mysql:host='.$this->servidor.';port='.$this->porta.';dbname='.$this->nomeBanco, $this->usuario, $this->senha,$configuracoes_extras);
		      $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		    }catch(PDOException $e) {
		    	"Erro: ".$e->getMessage();
		        $this->trataErro($e, __FUNCTION__, TRUE);

		    }

		}//conecta

		//public function trataErro($arquivo=NULL, $rotina=NULL, $num_erro=NULL, $msg_erro=NULL, $gera_except=FALSE){
		public function trataErro($e, $rotina =NULL, $gera_except=FALSE){

			if($rotina == NULL) $rotina ="Não informada";

			$resultado =	'<strong>Ocorreu um erro com os seguintes detalhes:</strong><br>
							<strong>Arquivo:</strong> '.$e->getFile().'<br>
							<strong>Rotina:</strong> '.$rotina.'<br>
							<strong>Codigo:</strong> '.$e->getCode().'<br>
							<strong>Mensagem:</strong> '.$e->getMessage();

			if($gera_except==FALSE):
				echo ($resultado);
			else:
				die($resultado);
			endif;
			
		}//trataErro

	}
?>