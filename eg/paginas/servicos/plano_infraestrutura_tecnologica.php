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
        <h2 class="featurette-heading endo_topo_texto">Deseja modernizar a tecnologia de seu negócio?<br> </h2>
        <h3><span class="text-muted">Podemos auxiliar sua empresa a respeito de quais equipamentos adquirir, e como integrá-los!</span></h3>
        <br/>
      </div>
       <div class="endo_img_servico" data-stellar-ratio="0.2"><img class="endo_img endo_topo_texto endo_img_desc_serv"  src="<?php echo SITE.DIR.'/img/geral/servicos/img_serv_04.png';?>" alt="Generic placeholder image"></div>
      <div class="endo_conteudo_servico">
          <p class="lead text-justify">A concepção de um Plano de Infraestrutura Tecnológica envolve preliminarmente o levantamento das necessidades, atuais e futuras, de cada empresa. A partir dessas informações é feito um estudo que busca os melhores produtos no mercado, que venham atender a demanda da empresa, e que possuem relação custo/benefício aceitável. A partir de então, é apresentado um relatório onde consta a descrição dos produtos a adquirir, e dos serviços necessárias à completa instalação.          </p>
          <p class="lead text-justify">É importante ressaltar que as necessidades de uma empresa são variáveis, e mesmo empresas que atuam em um mesmo seguimento, possuem necessidades distintas. As mais comuns são: Banco de dados (base de clientes, produtos, vendas etc.), Integração de rede de computadores (roteamento de dados, compartilhamento de arquivos e impressoras), Automação (balanças eletrônicas, máquina para cartões, leitores ópticos), dentre outros. O desempenho dos sistemas e a produtividade dos funcionários está diretamente relacionada à correta mensuração, instalação e configuração dos equipamentos.</p>
          <p class="lead text-justify">Talvez já exista uma infraestrutura tecnológica, que poderá ser readequada ou descartada, seja por não mais atender a demanda, seja por incopatibilidade com as novas tecnologias. Em todo caso, o objetivo deste serviço não é simplesmente comprar produtos novos, mas sim buscar a eficiência dos processos empresarias por meio do uso adequado das tecnologias da informação e comunicação disponíveis.</p>
          <p class="lead text-justify">&nbsp;</p>
          <p class="lead text-justify">Entre em <a href="<?php echo SITE.DIR.'/paginas/atendimento.php';?>">CONTATO</a> para esclarecer suas dúvidas e agendar um encontro sem compromisso!</p>
      </div>
    </div>
  </div>
  <div class="container"><a class="btn btn-success" href="<?php echo SITE.DIR.'/paginas/servicos';?>"> Voltar para Serviços</a></div>
<?php require $_SERVER["DOCUMENT_ROOT"]."/padrao/footer.php"; ?>