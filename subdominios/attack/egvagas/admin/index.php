<?php 
$subtitulo = "Início";
require $_SERVER["DOCUMENT_ROOT"]."/egvagas/action/protecao_login.php";
require $_SERVER["DOCUMENT_ROOT"]."/egvagas/includes/constantes.php"; 
require $_SERVER["DOCUMENT_ROOT"]."/egvagas/includes/header.php"; 
?>
<div style="margin:80px;" class="container">
<?php 

?>

<div class="list-group" style="width: 200px;">
  <a class="list-group-item" href="<?php echo APP.'/egvagas/admin/formulario_empresa.php';?>">Cadastrar Empresa</a>
  <a class="list-group-item" href="<?php echo APP.'/egvagas/admin/formulario_vaga.php';?>">Cadastrar Vaga</a>
  <a class="list-group-item" href="<?php echo APP.'/egvagas/admin/detalhamento_vaga.php';?>">Detalhamento da Vaga</a>
</div>

<a class="btn btn-danger btn-lg" href="<?php echo APP.'/egvagas/action/sair.php';?>">Sair</a>


</div>
 
<?php require $_SERVER["DOCUMENT_ROOT"]."/egvagas/includes/footer.php"; ?>