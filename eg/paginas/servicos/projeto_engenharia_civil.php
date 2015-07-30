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
        <h2 class="featurette-heading endo_topo_texto">Está pensando em construir?<br> </h2>
        <h3><span class="text-muted">Lembre-se que o projeto é a materialização do seu sonho!</span></h3>
        <br/>
      </div>
      <div class="endo_img_servico" data-stellar-ratio="0.2"><img class="endo_img endo_topo_texto endo_img_desc_serv"  src="<?php echo SITE.DIR.'/img/geral/servicos/img_serv_02.png';?>" alt="Generic placeholder image"></div>
      <div class="endo_conteudo_servico">
          <p class="lead text-justify">Ter um bom projeto é a garantia de não passar por frustações e dores de cabeça durante a construção do seu sonho. Afinal, é pra ser um sonho, não um pesadelo!</p>
          <p class="lead text-justify">Muitas pessoas ainda hoje persistem em não fazer projeto antes de começar uma obra, ou mesmo pedir auxílio de pessoas não qualificadas para lhes prestar consultoria (leia-se: conselhos).</p>
          <p class="lead text-justify">Nós colocamos à sua disposição, profissionais competentes e qualificados que estarão disponíveis pra elaborar o seu projeto com técnica, responsabilidade e a segurança que você merece!</p>
          <p class="lead text-justify">&nbsp;</p>
          <p class="lead text-justify">Veja ao lado algumas imagens de projetos já executados! Esteja à vontade para obter nosso <a href="<?php echo SITE.DIR.'/paginas/atendimento.php';?>">CONTATO</a> e esclarecer suas dúvidas!</p></p>
       

      </div>
    </div>
  </div>
	<div class="container"><a class="btn btn-primary" href="<?php echo SITE.DIR.'/paginas/servicos';?>"> Voltar para Serviços</a></div>
<?php require $_SERVER["DOCUMENT_ROOT"]."/padrao/footer.php"; ?>