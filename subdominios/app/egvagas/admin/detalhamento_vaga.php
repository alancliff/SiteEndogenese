<?php 
$modulo = "egvagas";
$subtitulo = "EG Vagas :: Detalhamento da Vagas";
require $_SERVER["DOCUMENT_ROOT"]."/protecao/protecao_login.php";
require $_SERVER["DOCUMENT_ROOT"]."/padrao/constantes.php"; 
include $_SERVER["DOCUMENT_ROOT"]."/padrao/header.php";
include $_SERVER["DOCUMENT_ROOT"]."/padrao/menu.php";

?>

<!-- CONTEÚDO -->

<div class="container" style="margin-top:60px;">
    <img class="titulo_img" src="/egvagas/img/egvagas.png">
  <h1 class="titulo_tela bg-info">Detalhamento da Vaga</h1>

  <div style="margin-bottom:20px;">
    <a class="btn btn-default nao_impresso" href="<?php echo APP.'/egvagas/admin';?>">VOLTAR</a>
  </div>
  <div class="row nao_impresso">
           <div class="form-group col-xs-4">
              <div class="input-group">
                <span class="input-group-addon">Empresa</span>
                 <select class="form-control" id="empresas" name="empresas">

                </select> 
              </div>
            </div>
              <div class="form-group col-xs-4">
              <div class="input-group">
                <span class="input-group-addon">Cargos</span>
                 <select class="form-control" id="cargos" name="cargos">

                </select> 
              </div>
            </div>
  </div>
  <div id="detalhamento_vaga">
    
  </div>
</div>        
            
<script type="text/javascript">
  selecionaEmpresa("empresas");
</script>
<?php 
echo "<div class='nao_impresso'>";
include $_SERVER["DOCUMENT_ROOT"]."/padrao/footer.php";
echo "</div>";
 ?>