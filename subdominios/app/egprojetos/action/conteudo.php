<?php
include $_SERVER["DOCUMENT_ROOT"]."/egprojetos/classes/Paginas.class.php";

$conteudo = new Paginas();

$conteudo->mostrarPagina($_POST['pagina']);


?>