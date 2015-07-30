<!-- CONTEÚDO -->
    <?php 
    require $_SERVER["DOCUMENT_ROOT"]."/padrao/constantes.php";
    require $_SERVER["DOCUMENT_ROOT"]."/padrao/header_egvagas.php"; 
    $id_vaga = isset($_GET['id'])?$_GET['id']:"";

?>
   </head>
    <body>
<?php
  require $_SERVER["DOCUMENT_ROOT"]."/padrao/menu.php";
?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.4&appId=889450037781794";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>




    <div id="myCarousel" class="carousel slide carousel-fade"  data-pause="none" data-ride="carousel" data-interval="10000" style="margin-top:50px"  >
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
      </ol>
      <div class="carousel-inner ">
        <div class="item active">
          <a id="ver" href="#vagas"><img src="<?php echo SITE.DIR.'/img/egvagas/vagas_banner1.png';?>" width="100%" ></a></div>
        <div class="item">
          <a href="<?php echo SITE.DIR.'/paginas/atendimento.php';?>" target="_blank"><img src="<?php echo SITE.DIR.'/img/egvagas/vagas_banner2.png';?>" width="100%" ></a> </div>
      </div>
        
    </div><!-- /.carousel -->
<div class="container" id="vagas">
<div class="row" style="margin-top: 40px">
  <div class="col-xs-12">
    <div class="box-apresentacao" id="box1">
        <p class="titulo1 fonte-lg text-center mov">TUDO GRATUITO!</p>
        <p class="titulo1 fonte-md text-center">Banco de Vagas de Empregos em Itaituba e Região Oeste do Pará. </p>
        <p class="titulo1 fonte-xs text-center">A oportunidade está ao seu alcance ;)</p>
    </div>
  </div>
  <div class="col-xs-12 col-sm-6">
    <div id="form-cliente" class="box-apresentacao" > 
      <p class="titulo1 fonte-lg text-center">CADASTRO</p>

        <div class="row">
          <div class="col-md-6">
            <div class="input-group">
              <span class="input-group-addon" id="leg-email"> <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></span>
              <input type="email" class="form-control" placeholder="seu@email.com" aria-describedby="leg-email" name="email" id="email" >
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="input-group">
              <span class="input-group-addon" id="leg-cel"> <span class="glyphicon glyphicon-phone" aria-hidden="true"></span></span>
              <input type="text" class="form-control" placeholder="Celular"aria-describedby="leg-cel" name="telefone" id="telefone" >
            </div>
          </div>
        </div>
        <div class="input-group"  style="margin-bottom:28px;" >
          <span class="input-group-addon" id="leg-nome"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span> </span>
          <input type="text" class="form-control" placeholder="Nome Completo" aria-describedby="leg-nome" name="nome" id="nome" >
        </div>

        <button type="button" class="btn btn-default btn-lg" disabled= "disabled" style="width:100%" id="cadastro" onclick="salvarCandidato()" >
          Informe seus dados!
        </button>
    </div>
    <div  class="box-apresentacao resposta">
      <div id="resposta"> <p class="titulo1 tam1 text-center">Cadastre-se e receba informativos sobre empregos!</p></div>
   </div>
  </div>
  <div class="col-xs-12 col-sm-6">
     <div  class="box-apresentacao resposta">
      <p class="titulo1 fonte-md text-center">Curta nossa Página!</p>
      <div style="text-align: center;display: block;text-decoration: none;" class="fb-page" data-href="https://www.facebook.com/endogenese" data-width="300" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/endogenese"><a href="https://www.facebook.com/endogenese">Endogênese Soluções</a></blockquote></div></div>
    </div>

    <div class="box-apresentacao" id="box2" style> 
      <!-- <p class="titulo1 fonte-md text-center">TOTAIS</p> -->
      <div class="row">
        <div class="col-xs-4 info-titulo">Total de Vagas: </div>
        <div class="col-xs-4 info-titulo">Total de Assinantes: </div>
        <div class="col-xs-4 info-titulo">Total de Empresas: </div>
      </div>
      <div class="row">
        <div class="col-xs-4 info-dado" id="info1"><img src="<?php echo APP.'/egvagas/img/load.gif';?>"></div>
        <div class="col-xs-4 info-dado" id="info2"><img src="<?php echo APP.'/egvagas/img/load.gif';?>"></div>
        <div class="col-xs-4 info-dado" id="info3"><img src="<?php echo APP.'/egvagas/img/load.gif';?>"></div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="alerta" tabindex="-1" role="dialog" aria-labelledby="alertaLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="alertaLabel">PARABÉNS! VOCÊ JÁ ESTÁ CADASTRADO!</h3>
      </div>
      <div class="modal-body">
        <h4>A partir de agora você receberá informativos do EG Vagas!</h4>
        <p>Enviamos um e-mail a você comunicando o seu cadastramento. 
        <br>No rodapé de cada e-mail que você receberá, terá um link para excluir seu cadastro a qualquer tempo.<br>
        <br>Sinta-se à vontade para compartilhar as vagas de emprego com seus amigos!</p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">OK, ENTENDI!</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->



<div class="box-apresentacao">
  <p class="titulo1 fonte-lg text-center" style="color:#286090;">QUADRO DE VAGAS</p>

  <div class="row">
    <div class="col-xs-3">
    
      <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon">Critério de Busca</span>
                 <select class="form-control" id="criterio" name="criterio">
                  <option value="cargo" selected>Cargo</option>
                  <option value="salario">Faixa Salarial</option>
                  <option value="escolaridade">Escolaridade</option>
                  <option value="pne">Vagas PNE</option>
                  <option value="periodo">Período de Trabalho</option>
                </select> 
              </div>
      </div>
    </div>
    <div class="col-xs-3" id="opcao">
      <div class="input-group">
        <span class="input-group-addon">Cargo</span>
          <input type="text" class="form-control" placeholder="Cargo" id="valor" name="valor" maxlength="50" size="35">
      </div>
    </div>
    <div class="col-xs-6" >
      <div class="row">
        <div class="col-xs-6">
          <button type="button" class="btn btn-warning btn-lg" id="busca" onclick="buscarVaga(document.getElementById('criterio').value, document.getElementById('valor').value)" >BUSCAR</button>
        </div>
        <div class="col-xs-6">
          <button type="button" class="btn btn-primary btn-lg" id="lista" onclick="listaGeral() ">VER TODAS</button>
        </div>
      </div>
       
    </div>
  </div>

<br>
<div id="conteudo" >
<img src="<?php echo APP.'/egvagas/img/load.gif';?>" style="display:block;margin auto;">
</div>
</div>

<script type="text/javascript">
relInfo("vagas", "info1");
relInfo("pessoas", "info2");
relInfo("empresas", "info3");
function exibir(){

id = '<?php echo $id_vaga; ?>';
if (id !== "") {
 mostrarDetalhes(id); 
}
else{
  listaGeral();
}
}
exibir();

</script>


<script src='http://maps.google.com/maps/api/js?sensor=false'></script>

</div>
<?php 
require $_SERVER["DOCUMENT_ROOT"]."/padrao/footer.php";  ?>