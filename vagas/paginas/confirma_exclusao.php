<?php
    require $_SERVER["DOCUMENT_ROOT"]."/padrao/constantes.php";
    require $_SERVER["DOCUMENT_ROOT"]."/padrao/header_egvagas.php"; 
    echo    "</head><body>";
    require $_SERVER["DOCUMENT_ROOT"]."/padrao/menu.php";

?>

<script type="text/javascript">

function exibir(){

	id = '<?php echo $_GET[id]; ?>';
	cod = '<?php echo $_GET[cod]; ?>';
	dti = '<?php echo $_GET[dti]; ?>';
	if (id !== "" && cod !== "" && dti !== "") {
		excluirCadastro(id, cod, dti);
	}
	else{
		window.location.href='<?php echo  SITE;?>/vagas';
	}
}
exibir();

</script>

<div style="margin-top: 70px;"></div>
<div id="resultado_exclui" class="box-apresentacao"></div>


<?php 
require $_SERVER["DOCUMENT_ROOT"]."/padrao/footer.php";  ?>
