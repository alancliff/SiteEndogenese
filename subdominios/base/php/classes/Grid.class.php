<?php
	
	require_once('Objeto.class.php');
	require_once('Funcao.class.php');

/*
* Por Fabrício Ribeiro
* Classe Grid
*
* void Grid(string $tabela) -- construtor
* void addConsulta($campo, $valor) -- adiciona uma condição where a SQL
* void addLimite(int $limite) -- adiciona um limite de registros por páginas
* void addColuna(string $coluna, string $campoTabela, int $tamanho) -- define as colunas da tabela
* void addItemPesquisa($coluna, $campoTabela) -- define os itens que poderão ser consultados na tabela
* void addPaginaAtual(int $paginaAtual) -- define a página da tabela que será exibida
* void paginacao(int $qtd_registros) -- cria a paginação da tabela
* void addPermissoes(strin permissao) -- adiciona as ações na tabela. Valores aceitos: editar, excluir, inserir, ler. Caso nem uma permissão for informado são adotadas as permissões:editar, excluir e inserir
* void gerarGrid() -- constói a tabela
*/

	class Grid{

		############## PROPRIEDADES ###############
		protected $tabela			= NULL;
		protected $itensPesquisa	= array();
		protected $colunasGrid		= array();
		protected $itemConsulta		= array();
		protected $permissoes		= array();// permissões aceitas: editar, excluir, inserir, ler
		protected $limite	 		= 30;
		protected $paginaAtual		= 1;

		################ MÉTODOS ##################

		public function __construct($tabela){

			$this->tabela = $tabela;

		}// construct

		public function addPermissoes($permissao = NULL){

			if($permissao != NULL):

				$this->permissoes[] = $permissao;

			endif;
			
		}//addPermissoes


		public function addConsulta($campo = NULL, $valor = NULL){
			if($campo!=NULL):
				//$this->itemConsulta[$campo] = $valor;
				$this->itemConsulta['id_selected'] = $campo;
				$this->itemConsulta['texto_selected'] = $valor;
			endif;
		}// addConsulta


		public function addLimite($limite = NULL){
			if(is_numeric($limite)):
				$this->limite = $limite;
			endif;
		}// addLimite


		public function addColuna($coluna = NULL, $campoTabela = NULL, $tamanho = NULL){
			if($coluna!=NULL AND $campoTabela!=NULL):
				
				$this->colunasGrid['colunas'][] = $coluna;
				$this->colunasGrid['campo_tabela'][] = $campoTabela;

				if($tamanho!=NULL)
					$this->colunasGrid['tamanho'][] = $tamanho;
				else
					$this->colunasGrid['tamanho'][] = 'auto';

			endif;
		}//addColuna

		public function addItemPesquisa($coluna = NULL, $campoTabela = NULL){
			if($coluna!=NULL AND $campoTabela!=NULL):
				
				$this->itensPesquisa['colunas'][] = $coluna;
				$this->itensPesquisa['campo_tabela'][] = $campoTabela;

			endif;
		}//addItemPesquisa

		
		public function addPaginaAtual($pagina){
			
			if(is_numeric($pagina))
				$this->paginaAtual  = $pagina;

		}

		protected function paginacao($qtd_registros){

			$qtd_paginas = ceil($qtd_registros / $this->limite);

			if($qtd_paginas > 1):

				$pagina_admin = Funcao::capturarUrlAmigavel();

				$paginacao = "<div id='paginacao_grid'>";

				$sub_pag = "page";

				$onclick = '';

				$pagina_inicial = ($this->paginaAtual > 10 ) ? $this->paginaAtual - 9 : 1;

				if(isset($pagina_admin[1])):

					if ($pagina_admin[1] == 'search'):

						$sub_pag = 'search';

					endif;
				endif;				

				$paginacao .= ($this->paginaAtual > 10) ? '<span><a href="'.RAIZ.'admin/'.$pagina_admin[0].'/'.$sub_pag.'/'.($this->paginaAtual - 10).'" '.$onclick.'> &laquo; </a></spam>' : '';			

				$j = 1;
				for ($i = $pagina_inicial; $i <= $qtd_paginas; $i++) {

					if($sub_pag == 'search')
						$onclick = ' onclick="document.getElementById(&#39;pagina_pesquisa&#39;).value=&#39;'.$i.'&#39; ;document.forms[&#39;pesquisa&#39;].submit();"';

					$link = ($onclick == '') ? RAIZ.'admin/'.$pagina_admin[0].'/'.$sub_pag.'/'.$i : '#';

					if($j > 10 ):
						$paginacao .= '<spam class="pagina_grid"><a href="'.RAIZ.'admin/'.$pagina_admin[0].'/'.$sub_pag.'/'.$i.'" '.$onclick.'> &raquo; </a></spam>';
						break;
					endif;

					$destaque = ($this->paginaAtual == $i) ? 'id="page_atual"' : '';

					$paginacao .= '<spam class="pagina_grid" '.$destaque.'><a href="'.$link.'" '.$onclick.'>'.$i.'</a></spam>';

					$j++;
				}

				

				$paginacao .= '</div>';
			endif;

			if(isset($paginacao))
				return $paginacao;
			else 
				return '';

		}//paginacao


		public function gerarGrid(){

			$grid = '<div id="grid">';

			if(sizeof($this->colunasGrid)>0):

				$pagina_admin = Funcao::capturarUrlAmigavel();

				$tabela = new Objeto($this->tabela);

				if(sizeof($this->itemConsulta) > 0):// verifica se á item a serem consultados

					$tabela->addConsulta($this->itemConsulta['id_selected'], $this->itemConsulta['texto_selected']);

				endif;

				$tabela->selecionarTudo();
				$qtd_registros =  $tabela->getLinhasAfetadas();

				if($this->paginaAtual > 1): // filtra os registros se houver paginação
				
					$tabela->addExtras(' ORDER BY id DESC LIMIT '.((($this->paginaAtual - 1) * $this->limite)).' , '.$this->limite );	

				else:// caso não haja paginação usa o limite definido

					$tabela->addExtras(' ORDER BY id DESC LIMIT '.$this->limite);

				endif;

				$tabela->selecionarTudo();
				
				########### CRIA O FORM DE PESQUISA #############
				if(sizeof($this->itensPesquisa) > 0):

					$pesquisa = array();

					for($i=0 ; $i < count($this->itensPesquisa['colunas']) ; $i++)						
						$pesquisa[$this->itensPesquisa['campo_tabela'][$i]] = $this->itensPesquisa['colunas'][$i];


					$grid .= "<div id='pesquisa_grid'>";
					$grid .= "<form enctype='multipart/form-data' name ='pesquisa' action='".RAIZ.'admin/'.$pagina_admin[0]."/search' method='post' autocomplete='off'>";
					
					$grid .= "<select name='item_pesquisa'>".Funcao::gerarArraySelectOptions($pesquisa, (isset($this->itemConsulta['id_selected']))? $this->itemConsulta['id_selected'] : NULL)."</select>";

					$grid .= "<input type='text' name='pesquisa' value='".((isset($this->itemConsulta['texto_selected']))? $this->itemConsulta['texto_selected'] : '' )."'/>";
					$grid .= "<input type='hidden' name='pagina_pesquisa' id='pagina_pesquisa' value='1'/>";
					$grid .= "<input  class='btn btn-danger' type='submit' value='Pesquisar'/>";
					$grid .= "</div>";
				endif;
				
				if(count($this->permissoes) > 0){
					if(in_array('inserir', $this->permissoes))
						$grid .= "<a href='".RAIZ."admin/$pagina_admin[0]/novo' class='novo_registro_grid'>Inserir Novo</a>";
				}else{
					$grid .= "<a href='".RAIZ."admin/$pagina_admin[0]/novo' class='novo_registro_grid'>Inserir Novo</a>";
				}

				################ CRIA A TABELA ##################				
				$grid .= '<table><tr class="cabecalho_grid">';

				foreach ($this->colunasGrid as $key => $value) {
					if($key == 'colunas'):
						foreach ($value as $key2 => $coluna) {
							$grid .= '<th class="coluna_grid" width='.$this->colunasGrid['tamanho'][$key2].'>'.$coluna.'</th>';
						}
					elseif($key == 'campo_tabela'):
						foreach ($value as $campo) {
							$tabela->addCampo($campo);
						}
					endif;
				}
					
				$grid .= '<th>Ação</th></tr>';

				foreach ($tabela->retornarDados() as $key => $value){ 
					$grid .= '<tr class="linha_grid">';

						foreach ($this->colunasGrid['campo_tabela'] as $campo) {
							$grid .= '<td class="coluna_grid">'.$value[$campo].'</td>';
						}

					if(count($this->permissoes) == 0){
						$grid .= "<td><a href='".RAIZ."admin/".$pagina_admin[0]."/editar/".$value['id']."'>Editar</a><a href='".RAIZ."admin/".$pagina_admin[0]."/excluir/".$value['id']."' class='delete'>Excluir</a></td></tr>";
					}else{
						$grid .= "<td>";
						foreach ($this->permissoes as $key => $p) {
							if(strtolower($p) == 'editar')
								$grid .= "<a href='".RAIZ."admin/".$pagina_admin[0]."/editar/".$value['id']."'>Editar</a>";
							elseif(strtolower($p) == 'excluir')
								$grid .= "<a href='".RAIZ."admin/".$pagina_admin[0]."/excluir/".$value['id']."' class='delete'>Excluir</a>";
							elseif(strtolower($p) == 'ler')
								$grid .= "<a href='".RAIZ."admin/".$pagina_admin[0]."/ler/".$value['id']."' >Ler</a>";

						}
												
						$grid .= "</td></tr>";
					}
				} 
				$grid .= '</table>';
				
			endif;

			$grid .= $this->paginacao($qtd_registros);

			$grid .= '</div>';

			echo $grid;

		}



	}

?>