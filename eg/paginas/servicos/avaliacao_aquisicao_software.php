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
        <h2 class="featurette-heading endo_topo_texto">O software que você usa é ideal para seu negócio?<br> </h2>
        <h3><span class="text-muted">Só porque o sistema faz o básico, não significa que é o melhor para sua empresa!</span></h3>
        <br/>
      </div>
      <div class="endo_img_servico" data-stellar-ratio="0.2"><img class="endo_img endo_topo_texto endo_img_desc_serv"  src="<?php echo SITE.DIR.'/img/geral/servicos/img_serv_01.png';?>" alt="Generic placeholder image"></div>
      <div class="endo_conteudo_servico">
          <p class="lead text-justify">Os programas de computador revolucionaram as atividades das empresa. Usar um software já deixou de ser um diferencial competitivo, e passou a ser um fator de sobrevivência. A quantidade de dados gerados diariamente inviabilizam a gestão não-automatizada dos negócios.</p>
          <p class="lead text-justify">Apesar dessa ser uma realidade, ainda é muito comum as empresas usarem um software pelas razões erradas. As razões mais comuns são "porque os concorrentes usam", "porque é o mais vendido na cidade", "porque só posso pagar por este", "porque não conheço outro", "porque já estou acostumado". </p>
          <p class="lead text-justify">Desde já, revelamos o segredo: o melhor software para a empresa é aquele que atende as necessidades de gestão do negócio!</p>
          <p class="lead text-justify">Essas necessidades são diversas, e variam  entre empresas do mesmo seguimento, do mesmo porte, na mesma cidade, ainda que uma esteja ao lado da outra. Usar um software inadequado faz com que o empresário deixe de realizar as atividades de gestão que gostaria. Ou ainda, esteja pagando por funcionalidades que jamais use, por não serem compatíveis com o negócio.</p>
          <p class="lead text-justify">O resultado é inevitável: perda de eficiência operacional e gerencial!</p>
          <p class="lead text-justify">&nbsp;</p>
          <p class="lead text-justify">Podemos auxiliar sua empresa a encontrar o software mais adequado. Buscamos e avaliamos alternativas de mercado (algumas open source e gratuitas) confrontando-as com as necessidades apresentadas. Entre em <a href="<?php echo SITE.DIR.'/paginas/atendimento.php';?>">CONTATO</a>, agende um encontro, e obtenha mais detalhes!</p>
      </div>
    </div>
  </div>
  <div class="container"><a class="btn btn-success" href="<?php echo SITE.DIR.'/paginas/servicos';?>"> Voltar para Serviços</a></div>
<?php require $_SERVER["DOCUMENT_ROOT"]."/padrao/menu.php"; ?>