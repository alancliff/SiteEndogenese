<?php
class Paginas
{
	public function mostrarPagina($pagina){

				require $_SERVER["DOCUMENT_ROOT"]."/egprojetos/paginas/".$pagina.".php";

	}
}