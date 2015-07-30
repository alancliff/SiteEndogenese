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
        <h2 class="featurette-heading endo_topo_texto">Sua empresa ainda não possui um website?<br> </h2>
        <h3><span class="text-muted">Já está na hora de construir o seu outdoor na Internet!</span></h3>
        <br/>
      </div>
      <div class="endo_img_servico" data-stellar-ratio="0.2"><img class="endo_img endo_topo_texto endo_img_desc_serv"  src="<?php echo SITE.DIR.'/img/geral/servicos/img_serv_02.png';?>" alt="Generic placeholder image"></div>
      <div class="endo_conteudo_servico">
          <p class="lead text-justify">A importância da Internet nos dias atuais é indiscutível. Milhões de pessoas navegam pela rede todos os dias, a toda hora. Essas pessoas estão buscando as mais variadas coisas relacionadas ao entretenimento, negócios, saúde, educação, política, etc. E talvez algumas pessoas estejam procurando exatamente o que sua empresa pode oferecer!</p>
          <p class="lead text-justify">Quando alguém "navega" pela Internet procurando um produto, por exemplo, é como se estivesse passando por uma avenida, e ao longo do caminho avistasse vários outdoors das empresas que oferecem tal produto sob as mais variadas condições. Se a sua empresa está na Internet, talvez o seu produto seja o escolhido. Se sua empresa não está lá, dificilmente essa pessoa irá comprar seu produto.</p>
          <p class="lead text-justify">Além do mais, você pode vincular caracteristicas ao seu site (blog, chat, e-commerce, plug-ins sociais, etc), tornando ele um importante canal de comunicação com seus clientes e valiosa ferramenta de negócios.</p>
          <p class="lead text-justify">Não perca mais tempo! dê este importante passo para o futuro da sua empresa!</p>
          <p class="lead text-justify">&nbsp;</p>
          <p class="lead text-justify">Nos colocamos à sua disposição para planejar e criar seu site. Fique à vontade para entrar em <a href="<?php echo SITE.DIR.'/paginas/atendimento.php';?>">CONTATO</a> e esclarecer suas dúvidas!</p>
      </div>
    </div>
  </div>
	<div class="container"><a class="btn btn-success" href="<?php echo SITE.DIR.'/paginas/servicos';?>"> Voltar para Serviços</a></div>
<?php require $_SERVER["DOCUMENT_ROOT"]."/padrao/footer.php"; ?>