<?php 
require $_SERVER["DOCUMENT_ROOT"]."/padrao/constantes.php";
require $_SERVER["DOCUMENT_ROOT"]."/padrao/header.php"; ?>
    <!-- ESTILOS PERSONALIZADOS -->
  </head>
  <body>
<?php require $_SERVER["DOCUMENT_ROOT"]."/padrao/menu.php"; ?>

<link href="<?php echo SITE.DIR.'/css/animacao.css'; ?>" rel="stylesheet">
<script src="<?php echo SITE.DIR.'/js/modernizr.custom.js';?>"></script>

<div class="endo_top" style="margin-bottom:50px"> <img src="<?php echo SITE.DIR.'/img/geral/home/home_eg.png'; ?>" width="100%" alt="Endogênese Soluções"> </div> <!-- imagem estática para dispositivos pequenos. -->
    <div class="container marketing">
      <!-- Três colunas de texto -->
<div id="pt-main" class="pt-perspective" >
      <div class="pt-page">

        <div class="row">

          <div class="col-lg-4 col-md-4 text-center"><!-- coluna 3 -->
            <a href="<?php echo SITE.'/vagas';?>" ><img id="imagem3" class="img-circle endo_circulo_index" src="<?php echo SITE.DIR.'/img/geral/home/icone_egvagas.png';?>" alt="EG Vagas"></a>
            <h3 >EG Vagas</h3>
            <p class="text-justify">Disponibilizamos um ambiente onde você pode acessar oportunidades de emprego que surgem em Itaituba e na região! Você ainda pode se cadastrar e receber por e-mail relatórios sobre as vagas que surgem a cada dia! Confira!!! </p>
          </div>

          <div class="col-lg-4 col-md-4 text-center"><!-- coluna 1 -->
            <a href="<?php echo SITE.DIR.'/paginas/consultoria_empresarial.php'; ?>"><img id="imagem1" class="img-circle endo_circulo_index" src="<?php echo SITE.DIR.'/img/geral/home/icone_emp.png'; ?>" alt="Consultoria Empresarial"></a>
            <h3 >Consultoria Empresarial</h3>
            <p class="text-justify">Estamos todos buscando "um lugar ao sol" nesse mercado tão competitivo. E nem sempre você tem tempo para planejar(ou projetar) ações para melhoria do seu negócio. Talvez possamos ajudar você! e talvez você precise saber como...</p>
          </div>

          <div class="col-lg-4 col-md-4 text-center"><!-- coluna 2 -->
            <a href="<?php echo SITE.DIR.'/paginas/consultoria_em_ti.php';?>"><img id="imagem2" class="img-circle endo_circulo_index" src="<?php echo SITE.DIR.'/img/geral/home/icone_ti.png';?>" alt="Consultoria em TI"></a>
            <h3 >Consultoria em TI</h3>
            <p  class="text-justify">A Tecnologia da Informação é imprescindível para o bom desempenho das empresas. Parece clichê, mas nem todo mundo se deu conta disso. Dispomos de serviços em TI que ajudarão sua empresa a se manter eficiente e competitiva no mercado.</p>
          </div>


        </div><!-- /.row -->
      </div>
      <div class="pt-page">
        <div class="row">
          
          <div class="col-lg-4 col-md-4 text-center"><!-- coluna 1 -->
            <a href="<?php echo SITE.DIR.'/paginas/projetos_engenharia.php'; ?>"><img id="imagem1" class="img-circle endo_circulo_index" src="<?php echo SITE.DIR.'/img/geral/home/icone_engenharia.png'; ?>" alt="Projetos de Engenharia"></a>
            <h3 >Projetos de Engenharia</h3>
            <p class="text-justify">O sonho da casa própria é equivalente ao sonho do ponto comercial próprio. Em ambos os casos, nós podemos auxiliar na realização da construção de seus sonhos. Dependendo do caso, ajudamos ainda na captação dos recursos para a construção!</p>
          </div>

          <div class="col-lg-4 col-md-4 text-center"><!-- coluna 3 -->
            <a href="http://blog.endogenese.com.br" ><img id="imagem3" class="img-circle endo_circulo_index" src="<?php echo SITE.DIR.'/img/geral/home/icone_blog.png';?>" alt="Blog"></a>
            <h3 >Novidades</h3>
            <p class="text-justify">Fique por dentro das principais novidades relacionadas ao seguimento empresarial do mercado regional, além de temas correlatos à nossa empresa. Você pode nos acompanhar ainda pelas redes sociais! Visite nosso blog e deixe seu comentário! </p>
          </div>

          <div class="col-lg-4 col-md-4 text-center"><!-- coluna 2 -->
            <a href="<?php echo SITE.DIR.'/paginas/atendimento.php';?>"><img id="imagem2" class="img-circle endo_circulo_index" src="<?php echo SITE.DIR.'/img/geral/home/icone_atendimento.png';?>" alt="Atendimento"></a>
            <h3 >Atendimento</h3>
            <p  class="text-justify">Entre em contato conosco via telefone, e-mail ou agende uma visita! Estamos disponíveis para prestar esclarecimentos sobre nossos serviços, e demonstrar como a <font face="Endo"> Endogênese Soluções</font> pode auxiliar sua empresa a se destacar no seu ramo de atuação! </p>
          </div>

          
        </div><!-- /.row -->
      </div>
</div>
<div style="margin-top:60px;" ><br></div>
<div id="iterateEffects" class="btn btn-success btn-xs botao_pass"><span class="glyphicon glyphicon-transfer" aria-hidden="true"></span></div>

<script src="<?php echo SITE.DIR.'/js/pagetransitions.js';?>"></script>

<script type="text/javascript">
    $(document).ready(function(){
      setInterval(function(){ 
        $("#iterateEffects").click();
      }, 12000);
    });

</script>
     </div><!-- fim do container -->
<?php require $_SERVER["DOCUMENT_ROOT"]."/padrao/footer.php"; ?>