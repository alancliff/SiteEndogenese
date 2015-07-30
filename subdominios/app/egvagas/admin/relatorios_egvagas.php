<?php 
$modulo = "egvagas";
$subtitulo = "EG Vagas :: Relatórios";
require $_SERVER["DOCUMENT_ROOT"]."/protecao/protecao_login.php";
include $_SERVER["DOCUMENT_ROOT"]."/padrao/conexao_egvagas.php";
require $_SERVER["DOCUMENT_ROOT"]."/padrao/constantes.php"; 
include $_SERVER["DOCUMENT_ROOT"]."/padrao/header.php";
include $_SERVER["DOCUMENT_ROOT"]."/padrao/menu.php";


    $sqlBusca = ("SELECT sum(a.qtde_visualiza) total FROM vagas a");
    $query = $conexao->prepare($sqlBusca);
    $query->execute();

    while ($item = $query->fetch(PDO::FETCH_ASSOC) )
          {
            $total = $item[total];
          }



?>

<!-- CONTEÚDO -->

<div class="container" style="margin-top:60px;">

  <img class="titulo_img" src="/egvagas/img/egvagas.png">
  <h1 class="titulo_tela bg-info">Relatórios  - EG Vagas</h1>
  <div style="margin-bottom:20px;">
    <a class="btn btn-default nao_impresso" href="<?php echo APP.'/egvagas/admin';?>">VOLTAR</a>

    
  </div>
  <div class="row">
    <span class='btn btn-default btn-lg disabled'>TOTAL DE VISITAS: <?php echo $total; ?></span>
    <div class="col-sm-4 col-sm-offset-4">
      
      <div class="input-group">
        <span class="input-group-addon">Empresa</span>
        <select class="form-control" id="lista_empresas" name="lista_empresas">
        </select> 
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-xs-3">
      <ul class="list-group">
              <li class="list-group-item" onclick="ativa(this), getRelatorio('1')">Visitas por Empresa</li>
              <li class="list-group-item" onclick="ativa(this), getRelatorio('2')">Visitas da Empresa...</li>
              <li class="list-group-item" onclick="ativa(this), getRelatorio('3')">Visitas a Vaga por Empresa</li>
              <li class="list-group-item" onclick="ativa(this), getRelatorio('4')">Visitas a Vaga da Empresa...</li>

      </ul>
    </div>
    <div id="res_relatorio" class="col-xs-9">
  </div>
</div>        
         
<script type="text/javascript">
  selecionaEmpresa("lista_empresas");
</script>
<?php 
include $_SERVER["DOCUMENT_ROOT"]."/padrao/footer.php";
 ?>