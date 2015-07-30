<?php 
    require $_SERVER["DOCUMENT_ROOT"]."/padrao/constantes.php";
    require $_SERVER["DOCUMENT_ROOT"]."/padrao/header.php";

?>
    <!-- ESTILOS PERSONALIZADOS -->
    <script src="<?php echo SITE.DIR.'/js/stellar.min.js';?>"></script>
    <script>
       $(function() {
          $.stellar();
        });
    </script>
  </head>
  <body style="padding-top: 70px;">
<?php require $_SERVER["DOCUMENT_ROOT"]."/padrao/menu.php"; ?>
  <!-- CONTEÚDO -->
  <div class="container">
    <div>
      <div class="endo_conteudo_servico">
        <h2 class="featurette-heading endo_topo_texto">Quer aumentar a eficiência de suas propagandas?<br></h2>
        <h3><span class="text-muted">Com um bom planejamento, sua empresa pode ampliar o retorno desse investimento!</span></h3>
        <br/>
      </div>
       <div class="endo_img_servico" data-stellar-ratio="0.2"><img class="endo_img endo_topo_texto endo_img_desc_serv"  src="<?php echo SITE.DIR.'/img/geral/servicos/img_serv_01.png';?>" alt="Generic placeholder image"></div>
      <div class="endo_conteudo_servico">
          <p class="lead text-justify">Atualmente existem várias formas das empresas se comunicarem com seus clientes e com a sociedade. O conjunto de mecanismos usados para estabelecer essa comunicação é chamado de estratégia de marketing. Cada empresa pode (e deve) desenvolver sua própria estratégia, que deve levar em conta diversas variáveis, como público alvo, mensagem a repassar, região geográfica de atuação, recursos disponíveis, dentre outros.</p>
          <p class="lead text-justify">É notável o impacto que uma boa estratégia de marketing causa nos negócios de uma empresa, porém, mensurar o retorno dos investimentos em marketing é um desafio para muitas empresas. Muitas vezes, esse investimento é sequer acompanhado, e o empresário acaba considerando um custo, até mesmo um desperdício, pois imagina que o marketing não fez diferença.</p>
          <p class="lead text-justify">Por isso, uma boa estratégia de marketing deve ser pensada não somente em como fazer as divulgações, promoções, patrocínios, etc, mas também em como acompanhar devidamente o retorno dessas ações.</p>
          <p class="lead text-justify">Possuimos uma equipe de pessoas capacitadas para desenvolver a estratégia de marketing ideal para sua empresa!</p>
          <p class="lead text-justify">&nbsp;</p>
          <p class="lead text-justify">Para tanto, entre em <a href="<?php echo SITE.DIR.'/paginas/atendimento.php';?>">CONTATO</a> a fim de conversarmos abertamente sobre o assunto!</p>
      </div>
    </div>
  </div> 
  <div class="container"><a class="btn btn-success" href="<?php echo SITE.DIR.'/paginas/servicos';?>"> Voltar para Serviços</a></div>
<?php require $_SERVER["DOCUMENT_ROOT"]."/padrao/footer.php"; ?>