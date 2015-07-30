<?php
require_once('Objeto.class.php');

if(file_exists('../paginas/subpaginas/constantes.php'))
	require_once('../paginas/subpaginas/constantes.php');

/*
* Por Fabrício Ribeiro
* Classe Validacao
*
* bool administrador() -- verifica se o usuário logado é administrador
* bool login($tipo, $email, $senha) -- valida o usuário junto ao banco de dados
*/

	class Validacao{

		public static function administrador(){
			
			if(session_id() == ""){

				session_start();

			}
			
			if(isset($_SESSION[RAIZSIMPLES]['EMAIL']) and isset($_SESSION[RAIZSIMPLES]['SENHA'])){
				
				$admin = new Objeto('administrador');
				$admin->addConsulta('email', $_SESSION[RAIZSIMPLES]['EMAIL']);
				$admin->addConsulta('senha', $_SESSION[RAIZSIMPLES]['SENHA']);
				$admin->addExtras('LIMIT 1');
				$admin->selecionarTudo();
				
				if($admin->getLinhasAfetadas() > 0){

					//caso tenha se passado 20 minutos desde a última atividade
					if((time() - $_SESSION[RAIZSIMPLES]["ULTIMA_ATIVIDADE"]) > 1200){
						session_unset(); 
						session_destroy(); 
						return false;
					}else{
						$_SESSION[RAIZSIMPLES]["ULTIMA_ATIVIDADE"] = time();
						return true;
					}
				}else{
					
					unset($_SESSION[RAIZSIMPLES]["ID"]);
					unset($_SESSION[RAIZSIMPLES]["EMAIL"]);
					unset($_SESSION[RAIZSIMPLES]["SENHA"]);

					return false;
				}

			}

		}

		public static function login($tipo, $email, $senha){

			if(session_id() == ""){

				session_start();

			}

			$senha = md5(sha1($senha));
			
			$usuario = new Objeto($tipo);
			$usuario->addConsulta('email', $email);
			$usuario->addConsulta('senha', $senha);
			$usuario->addExtras('LIMIT 1');
			
			$usuario->selecionarTudo();

			foreach ($usuario->retornarDados('assoc') as $key => $value) {
			 	$_SESSION[RAIZSIMPLES]["ID"] = $value['id'];
			 	$_SESSION[RAIZSIMPLES]["EMAIL"] = $value['email'];
			 	$_SESSION[RAIZSIMPLES]["SENHA"] = $value['senha'];
			 	$_SESSION[RAIZSIMPLES]["ULTIMA_ATIVIDADE"] = time();//date("Y-m-d H:i:s");
			 }

			 if(isset($_SESSION[RAIZSIMPLES]["EMAIL"])){
			 	return true;
			 }else{
			 	return false;
			 }
		}
	}

?>