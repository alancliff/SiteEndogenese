<?php
	
	require_once("Conexao.class.php");
/*
 * Por Fabrício Ribeiro
 * Classe Objeto
 *
 * - Métodos do objeto -
 *
 * void Objeto(string $tabela, string $id, array $campos) -- construtor
 * void getId() -- retrona o último ID inserido no banco
 * void addCampo(string $campo, string $valor) -- adiciona um novo elemento ao array do objeto
 * void addExtras(string $extras) -- adiciona comandos extras ao final da SQL
 * void delCampo(string $campo) -- remove um elemento  do array do objeto
 * void setValor(string $campo, string $valor) -- adiciona um novo elemento ao array do objeto com seu respectivo valor
 * string getValor(string $campo) -- retorna o valor do campo informado
 * void getLinhasAfetadas() --  retorna a quantidade de linhas afetadas na última operação com o banco
 * int inserir() -- insere o array $camposValores na tabela
 * int atualizar() -- atualiza a tabela com o conteúdo do array $camposValores
 * int deletar() -- exclui os registro que satisfazem  os valores definidos para a consulta
 * bool selecionarTudo() -- armazena todos os componentes de uma tabela na variável $dataset
 * bool selecionarCampos() -- armazena os componentes de uma tabela na variável $dataset de acordo com os elemento do array $camposValores do objeto
 * array retornar() - retorna a primeira linha do conteúdo do $dataset (consulta)
 * array retornarDados(string $tipo) - retorna o conteúdo do $dataset (consulta)
 * int executarSql(string $sql) --  executa SQL, retorna a quantidade de linhas afetadas 
 * void limparDados() -- apaga o conteúdo do array $camposValores
 * void imprimirObjeto() - imprimir todo o conteúdo do objeto
 * void addConsulta(string $campo, string $valor) -- adiciona os elementos de consulta
*/
	class Objeto extends Conexao{
		
		############## PROPRIEDADES ###############
		protected $dataset			= NULL; //armazena o conteúdo de uma consulta
		protected $linhasAfetadas 	= -1;
		protected $tabela 			= "";
		protected $camposValores 	= array(); // armazena os elementos usados pelo objeto
		protected $camposConsulta	= array(); // campos usados para atualizações ou consultas
		protected $camposConsultaOR	= array(); // campos usados para atualizações ou consultas utilizando o operador OR
		protected $extrasSelect 	= "";
		protected $idInserido		= NULL;
		protected $ultimaSql		= NULL;


		################ MÉTODOS ##################

		public function __construct($tabela, $campos = array()){
			$this->tabela = $tabela;

			if(sizeof($campos)>0)
				$this->camposValores = $campos;

			$this->conecta();
		}// construct


		/*public function __destruct(){
			if($this->conexao != NULL):
				//mysql_close($this->conexao);
			endif;
		}*/

		public function getId(){
			return $this->idInserido;
		}// getID


		public function addConsulta($campo = NULL, $valor = NULL){
			if($campo!=NULL):
				$this->camposConsulta[$campo] = $valor;
			endif;
		}//addConsulta

		public function addConsultaOR($campo = NULL, $valor = NULL){
			if($campo!=NULL):
				$this->camposConsultaOR[$campo] = $valor;
			endif;
		}//addConsulta


		public function addExtras($extras = NULL){
			if($extras!=NULL):
				$this->extrasSelect = $extras;
			endif;
		}// addExtras


		public function addCampo($campo = NULL, $valor = NULL){
			if($campo!=NULL):
				$this->camposValores[$campo] = $valor;
			endif;
		}//addCampo


		public function delCampo($campo = NULL){
			if(array_key_exists($campo, $this->camposValores)):
				unset($this->camposValores[$campo]);
			endif;
		}// delCampo


		public function setValor($campo = NULL, $valor = NULL){
			if($campo!=NULL && $valor!=NULL):
				$this->camposValores[$campo] = $valor;
			endif;
		}//setValor


		public function getValor($campo = NULL){
			if($campo!=NULL && array_key_exists($campo, $this->camposValores[$campo])):
				return $this->$camposValores[$campo];
			else:
				return false;
			endif;
		}//getValor


		public function getLinhasAfetadas(){
			return $this->linhasAfetadas;
		}// getLinhasAfetadas

		public function inserir (){

			$sql = "INSERT INTO ".$this->tabela." (";
			for ($i=0 ; $i < count($this->camposValores); $i++):
				$sql .=  key($this->camposValores);
				if($i < count($this->camposValores) - 1):
					$sql .= " , ";
				else:
					$sql .= ", data_cadastro) ";
				endif;
				next($this->camposValores);
			endfor;

			reset($this->camposValores);

			$sql .= "VALUES (";
			for ($i=0 ; $i < count($this->camposValores); $i++):
				$sql .=  is_numeric($this->camposValores[key($this->camposValores)]) ? $this->camposValores[key($this->camposValores)] : ":".key($this->camposValores);
				if($i < count($this->camposValores) - 1):
					$sql .= " , ";
				else:
					$sql .= ", '".date("Y-m-d H:i:s")."'".") ";
				endif;
				next($this->camposValores);
			endfor;
			
			return $this->executarSql($sql);

		}// inserir


		public function atualizar(){

			$sql = "UPDATE ".$this->tabela." SET ";
			for ($i=0 ; $i < count($this->camposValores); $i++):
				$sql .= key($this->camposValores)." = ";
				$sql .= is_numeric($this->camposValores[key($this->camposValores)]) ? $this->camposValores[key($this->camposValores)] : ":".key($this->camposValores);
				if($i < count($this->camposValores) - 1):
					$sql .= " , ";
				else:
					$sql .= " ";
				endif;
				next($this->camposValores);
			endfor;

			if(count($this->camposConsulta)>0):
				$i = 0;
				$sql .= " WHERE ";
				foreach ($this->camposConsulta as $key => $value) {
					if($i!=0)
						$sql .= " AND ";	
							
					$sql .= $key."=";	
					$sql .= is_numeric($value) ? $value : ":".$key."_update";
					$i++;
				}
			endif;
			
			return $this->executarSql($sql);

		}//atualizar


		public function deletar(){

			$sql = "DELETE FROM ".$this->tabela;
			if(count($this->camposConsulta)>0):
				$i = 0;
				$sql .= " WHERE ";
				foreach ($this->camposConsulta as $key => $value) {
					if($i!=0)
						$sql .= " AND ";	
							
					$sql .= $key."=";	
					$sql .= is_numeric($value) ? $value : ":".$key;
					$i++;
				}
			endif;

			return $this->executarSql($sql);

		}//deletar


		public function selecionarTudo(){
			$and = false;
			$sql = "SELECT * FROM ".$this->tabela;
			if(count($this->camposConsulta)>0):
				$and = true;
				$i = 0;
				$sql .= " WHERE ";
				foreach ($this->camposConsulta as $key => $value) {
					if($i!=0)
						$sql .= " AND ";	
							
					$sql .= $key."=";	
					$sql .= is_numeric($value) ? $value : ":".$key;
					$i++;
				}
			endif;

			if (count($this->camposConsultaOR)>0):
				$i = 0;
				if(!$and)
					$sql .= " WHERE ";
				else
					$sql .= " AND (";
				foreach ($this->camposConsultaOR as $key => $value) {
					if($i!=0)
						$sql .= " OR ";	
							
					if($value == '+')
						$sql .= $key.">= 5";
					else{
						$sql .= $key."=";	
						$sql .= is_numeric($value) ? $value : ":".$key;
					}
					$i++;
				}
				if($and)
					$sql .= " ) ";

			endif;

			if($this->extrasSelect != NULL):
				$sql .= " ".$this->extrasSelect;
			endif;
			
			
			if($this->executarSql($sql))
				return TRUE;
			else
				return FALSE;

		}//selecionarTudo


		public function selecionarCampos(){
			$sql = "SELECT ";
			for ($i = 0 ; $i < count($this->camposValores); $i++):
				$sql .=  key($this->camposValores);
				if($i < count($this->camposValores) - 1):
					$sql .= " , ";
				else:
					$sql .= " ";
				endif;
				next($this->camposValores);
			endfor;

			$sql .= " FROM ".$this->tabela;

			if(count($this->camposConsulta)>0):
				$i = 0;
				$sql .= " WHERE ";
				foreach ($this->camposConsulta as $key => $value) {
					if($i!=0)
						$sql .= " AND ";	
							
					$sql .= $key."=";	
					$sql .= is_numeric($value) ? $value : ":".$key;
					$i++;
				}
			endif;

			if($this->extrasSelect != NULL):
				$sql .= " ".$this->extrasSelect;
			endif;
			
			return $this->executarSql($sql);

		}//selecionarCampos


		public function executarSql($sql = NULL){
			
			if($sql != NULL):
				$this->ultimaSql = $sql;
				try{
					$query = $this->conexao->prepare($sql);
					// valida entradas
					if(count($this->camposValores)>0):
						foreach ($this->camposValores as $key => $value){
							if(strpos($sql, ':'.$key)):
								$query->bindValue(":".$key,$value);
							endif;
						}
					endif;
					// valida consultas
					if(count($this->camposConsulta)>0):
						foreach ($this->camposConsulta as $key => $value){

							if(strpos($sql, ':'.$key.'_update')):
								$query->bindValue(":".$key.'_update',$value);
							elseif(strpos($sql, ':'.$key)):
								$query->bindValue(":".$key,$value);
							endif;
						}
					endif;

					$query->execute();
					$this->linhasAfetadas = $query->rowCount();

					if(substr(trim(strtolower($sql)), 0, 6) == 'select'):
						$this->dataset = $query;
						return $this->dataset;
					elseif(substr(trim(strtolower($sql)), 0, 6) == 'insert'):
						$this->idInserido = $this->conexao->lastInsertId();
						return $this->linhasAfetadas;
					else:
						if((substr(trim(strtolower($sql)), 0, 6) == 'update') && ($this->linhasAfetadas == 0))
							return true;
						else
							return $this->linhasAfetadas;
					endif;
				}catch(PDOException $e){

					$this->trataErro($e, __FUNCTION__, TRUE);
					return false;
				}
			else:
				echo "Comando SQL não informado!";
			endif;

		}//executaSql

		/*
		Exemplo de chamada do tipo ASSOC
		foreach ($cliente->retornarDados('assoc') as $key => $value) {
			echo $value['nome']. ' / '. $value['descricao'].'<br>';
		}

		Exemplo de chamada do tipo OBJECT
		while ($res = $cliente->retornarDados()) {
			echo $res->nome. ' / '. $res->descricao.'<br>';
		}
		*/
		public function retornarDados($tipo = NULL){

			switch (strtolower($tipo)) :
				case 'assoc':
					return $this->dataset->fetchAll(PDO::FETCH_ASSOC);
					break;

				case 'object':
					return $this->dataset->fetch(PDO::FETCH_OBJ);
					break;

				default:
					return $this->dataset->fetchAll(PDO::FETCH_ASSOC);
					break;
			endswitch;

		}// retornarDados();


		/*
		Exemplo de chamada do método retornar()

		$tabela = $tabela->retornar();
		echo $tabela['nome'];
		*/

		public function retornar(){

			foreach($this->dataset->fetchAll(PDO::FETCH_ASSOC) as $registro){

				foreach($registro as $indice => $campo){

					$objeto[$indice] = $campo;
				}

				break;

			}

			return  $objeto;

		}// retornar();



		public function limparDados(){
			if(count($this->camposValores) || count($this->camposConsulta) || $this->dataset!= NULL || $this->extrasSelect!= NULL):
				$this->camposValores = array();
				$this->camposConsulta = array();
				$this->dataset = NULL;
				$this->extrasSelect = NULL;
			endif;
		}// limparDados()

		public function imprimirObjeto(){
			echo "<hr>";
			echo '<pre>';
			print_r($this);
			echo '</pre>';
		}//imprimirObjeto


	}// fim classe

?>