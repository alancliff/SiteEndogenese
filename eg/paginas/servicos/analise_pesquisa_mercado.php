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
        <h2 class="featurette-heading endo_topo_texto">Dúvidas sobre o cenário econômico regional?<br> </h2>
        <h3><span class="text-muted">Avaliamos pra você o mercado em que sua empresa atua ou pretende atuar!</span></h3>
        <br/>
      </div>
      <div class="endo_img_servico" data-stellar-ratio="0.2"><img class="endo_img endo_topo_texto endo_img_desc_serv"  src="<?php echo SITE.DIR.'/img/geral/servicos/img_serv_03.png';?>" alt="Generic placeholder image"></div>
      <div class="endo_conteudo_servico">
          <p class="lead text-justify">A atividade empresarial é um risco. O sucesso do negócio, dentre outros fatores, depende diretamente das condições do mercado onde a empresa está (ou será) inserida. O otimismo exarcerbado pode gerar falsas espectativas, enquanto o pessimismo infundado pode extinguir boas oportunidades.          </p>
          <p class="lead text-justify">É por isso que a informação é tão preciosa, pois é a base do conhecimento. E o conhecimento sobre o mercado deve ser pautado em percepções sensatas, que considerem as oportunidades e os riscos, proporcionando assim um vislumbre de um cenário realista, baseada em fatos reais e confiáveis.</p>
          <p class="lead text-justify">A análise pode ser feita a partir de dados divulgados pela mídia, orgãos governamentais, e levantamentos informais, assim como pautada em pesquisa de mercado formal apresentada pelo interessado ou encomendada.</p>
          <p class="lead text-justify">&nbsp;</p>
          <p class="lead text-justify">Caso esteja interessado, fique à vontade para entrar em <a href="<?php echo SITE.DIR.'/paginas/atendimento.php';?>">CONTATO</a>, e assim saber como podemos prestar esta assessoria!</p>
      </div>
    </div>
  </div>
  <div class="container"><a class="btn btn-primary" href="<?php echo SITE.DIR.'/paginas/servicos';?>"> Voltar para Serviços</a></div>
<?php require $_SERVER["DOCUMENT_ROOT"]."/padrao/footer.php"; ?>
