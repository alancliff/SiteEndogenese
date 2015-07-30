<?php 
    require $_SERVER["DOCUMENT_ROOT"]."/padrao/constantes.php";
    require $_SERVER["DOCUMENT_ROOT"]."/padrao/header.php";

?>
    <!-- ESTILOS PERSONALIZADOS -->
  </head>
  <body style="padding-top: 70px;">
<?php 
require $_SERVER["DOCUMENT_ROOT"]."/padrao/menu.php";
 ?>
    <!-- CONTEÚDO -->
  <div class="container">
    <div class="row row-offcanvas row-offcanvas-right">
      <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
        <div class="row" style="padding-bottom:20px">
          <div class="col-sm-2 hidden-xs">
            <img class="endo_img " src="<?php echo SITE.DIR.'/img/geral/servicos/vaso.png';?>" style="min-width:100px;">
          </div>
          <div class="col-xs-12 col-sm-10 endo_info">
            <h1 style="font-size:24px">Queremos promover o crescimento de sua empresa!  
            <br>
            <small>Por isso, apresentamos a seguir algumas formas de estabelecermos uma boa parceria.</small></h1>
          </div>
          
        </div>

        <div class="row endo_info">
            <div class="col-sm-6">
              <h2>Projeto para Captação de Recursos</h2>
              <p class="text-justify">Uma de nossas especialidades é ajudar as empresas a conseguir recursos destinados ao desenvolvimento de suas atividades econômicas. Atuamos em parceria com o Banco da Amazônia, que é o gestor do <abbr title="Fundo Constitucional de Financiamento do Norte">FNO</abbr>, fundo constitucional que possui condições de prazos, carência e taxas de juros ideais para investir no seu negócio. </p>
              <p><a class="btn btn-primary" href="<?php echo SITE.DIR.'/paginas/servicos/projeto_capitacao_recursos.php';?>" role="button">Quero conhecer &raquo;</a></p>
            </div>
            <div class="col-sm-6">
              <h2>Análise de Pesquisas de Mercado</h2>
              <p class="text-justify">Conhecer o mercado em que sua empresa atua, ou pretende atuar, é essencial para definir suas estratégias de negócio. Para obter valor das informações sobre o cenário econômico-financeiro, é preciso uma análise criteriosa, que considere cenários atuais e futuros, a fim de melhor aproveitar as oportunidades e mitigar os riscos. </p>
              <p><a class="btn btn-primary" href="<?php echo SITE.DIR.'/paginas/servicos/analise_pesquisa_mercado.php';?>" role="button">Quero conhecer &raquo;</a></p>
            </div>
            <?php
              /*<div class="col-sm-6 col-lg-4">
              <h2>Criação de Estratégias de Marketing</h2>
              <p class="text-justify">Investir em marketing é investir no futuro do seu negócio. Porém, é comum empresários encararem o marketing como um gasto "dispensável", talvez por ser difícil mensurar o "retorno" do investimento. É preciso, portanto, um planejamento adequado, que considere o público-alvo, formas de comunicação, dentre outros fatores. </p>
              <p><a class="btn btn-success" href="/servicos/criacao_estrategia_marketing.php" role="button">Quero conhecer &raquo;</a></p>
              </div> 
              */
            ?>
            <div class="col-sm-6">
              <h2>Criação e Manutenção de Websites</h2>
              <p class="text-justify">As portas do mundo estão abertas para sua empresa. Mas é você quem decide se quer entrar! Em alguns seguimentos, ter um website é imprescindível para a continuidade dos negócios, e em outros, essa necessidade não tardará. Usamos as tecnologias mais consolidadas para criar a identidade de sua empresa na Internet.</p>
              <p><a class="btn btn-success" href="<?php echo SITE.DIR.'/paginas/servicos/criacao_manutencao_website.php';?>" role="button">Quero conhecer &raquo;</a></p>
            </div> 
            <?php
              /*<div class="col-sm-6 col-lg-4">
              <h2>Avaliação para Aquisição de Softwares</h2>
              <p class="text-justify"> Muitas empresas já utilizam programas de computador para controlar suas vendas,  seus estoques, etc, pois são tantas informações que o controle manual é impraticável. Mas nem sempre elas usam o software adequado. Realizamos o estudo que alinha as necessidades da sua empresa às melhores soluções de mercado.</p>
              <p><a class="btn btn-success" href="/servicos/avaliacao_aquisicao_software.php" role="button">Quero conhecer &raquo;</a></p>
              </div>
              */
            ?>
            <div class="col-sm-6">
              <h2>Plano de Infraestrutura Tecnológica</h2>
              <p class="text-justify">A infraestutura tecnológica na empresa, além de cumprir com seu objetivo básico, que é favorecer o adequado processamento de dados, também deve estar organizada, para interferir o mínimo possível no ambiente. Este serviço compreende o correto dimensionamento dos equipamentos e a topologia das máquinas e conexões.</p>
              <p><a class="btn btn-success" href="<?php echo SITE.DIR.'/paginas/servicos/plano_infraestrutura_tecnologica.php';?>" role="button">Quero conhecer &raquo;</a></p>
            </div>
            <div class="col-sm-6">
              <h2>Projeto de Engenharia Civil</h2>
              <p class="text-justify">O projeto de construção é o início do planejamento, é onde o sonho do cliente que quer construir será moldado. É preciso saber elaborar um projeto com técnica e responsabilidade para que se evite problemas no decorrer da execução da obra, como atrasos e estouros no orçamento. Afinal, se está construindo um sonho, não um pesadelo!</p>
              <p><a class="btn btn-primary" href="<?php echo SITE.DIR.'/paginas/servicos/projeto_engenharia_civil.php';?>" role="button">Quero conhecer &raquo;</a></p>
            </div>

        </div><!--/row-->
      </div><!--/span-->
      <div class="col-md-3 col-lg-3  hidden-xs hidden-sm sidebar-offcanvas" id="sidebar">
         <img class="endo_img" src="<?php echo SITE.DIR.'/img/geral/servicos/banner_servicos.png';?>">
      </div><!--/span-->
    </div><!--/row-->
  </div><!--/container-->
<?php require $_SERVER["DOCUMENT_ROOT"]."/padrao/footer.php"; ?>