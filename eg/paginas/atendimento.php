<?php 
    require $_SERVER["DOCUMENT_ROOT"]."/padrao/constantes.php";
    require $_SERVER["DOCUMENT_ROOT"]."/padrao/header.php";

?>
    <!-- ESTILOS PERSONALIZADOS -->
  </head>
  <body>
<?php 
require $_SERVER["DOCUMENT_ROOT"]."/padrao/menu.php";
 ?>
    <!-- CONTEÚDO -->
<div class="container endo_top"> 
      <div style="width: 80%; margin:auto">
        <h3 class="text-center">Nós, da<font face="Endo"> Endogênese Soluções</font>, estamos disponíveis para atender você e sua empresa, bem como prestar mais informações sobre nossos serviços!</h5>
        <h4 class="text-center"><span class="text-muted">Fique à vontade para entrar em contato</span></h4>
      </div>  
    <div class="row">

    <div class="col-xs-12">

      <div class="row">
      <div class="col-xs-6">
      <div class="endo-box"  style="font-size:16px">
        <h3>EG Vagas:</h3> <h5><span class="text-muted">Para divulgação de vagas de emprego!</span></h5>
        <div class="row">
       <div class="col-xs-3"><p>Glauco:</p></div><div class="col-xs-9"><p>(93) 99142-8922</p></div>
       <div class="col-xs-3"><p>Wanderson:</p></div><div class="col-xs-9"><p>(93) 98130-4278</p></div>
       <div class="col-xs-3"><p>e-mail:</p></div><div class="col-xs-9"><p><strong></strong> egvagas@endogenese.com.br</p></div>
       </div>
      </div>
      </div>
      <div class="col-xs-6">
      <div class="endo-box"  style="font-size:16px">
        <h3>Consultoria Empresarial:</h3> <h5><span class="text-muted">Captação de Recursos e Estudos de Mercado!</span></h5>
        <div class="row">
       <div class="col-xs-3"><p>Cristiano:</p></div><div class="col-xs-9"><p>(93) 98124 3015</p></div>
       <div class="col-xs-3"><p>Alan:</p></div><div class="col-xs-9"><p>(93) 99122 0569</p></div>
       <div class="col-xs-3"><p>e-mail:</p></div><div class="col-xs-9"><p><strong></strong> projetos@endogenese.com.br</p></div>
       </div>
      </div>
      </div>
      <div class="col-xs-6">
      <div class="endo-box"  style="font-size:16px">
        <h3>Consultoria em TI:</h3> <h5><span class="text-muted">Planos de Infraestrutura em TI e Suporte/Manutenção de Computadores!</span></h5>
        <div class="row">
       <div class="col-xs-3"><p>Joab:</p></div><div class="col-xs-9"><p>(93) 99204 7173</p></div>
       <div class="col-xs-3"><p>Alan:</p></div><div class="col-xs-9"><p>(93) 98119 8050</p></div>
       <div class="col-xs-3"><p>e-mail:</p></div><div class="col-xs-9"><p><strong></strong> suporte@endogenese.com.br</p></div>
       </div>
      </div>
      </div>
      <div class="col-xs-6">     
      <div class="endo-box"  style="font-size:16px">
        <h3>Projetos de Engenharia:</h3> <h5><span class="text-muted">Projetos completos para construção da sua casa ou seu prédio comercial!</span></h5>
        <div class="row"> 
       <div class="col-xs-3"><p>Déborah:</p></div><div class="col-xs-9"><p>(93) 99121 1037</p></div>
       <div class="col-xs-3"><p>Louremberg:</p></div><div class="col-xs-9"><p>(93) 98129 4645</p></div>
       <div class="col-xs-3"><p>e-mail:</p></div><div class="col-xs-9"><p><strong></strong> engenharia@endogenese.com.br</p></div>
       </div>
      </div> 
    </div>
    </div>
    </div>
    <div class="col-sm-6 col-xs-12">
      <div class="endo-box" style="font-size:16px">
        <form name="formulario" action="<?php echo SITE.DIR.'/php/form-contato.php';?>" method="post" class="endo_img">
          <input type=hidden name="destino" value="EmailQueVaiReceberAsMensagens">
          <input type=hidden name="enviado" value="">
          <span class="glyphicon glyphicon-comment endo-icon"></span> <strong>Envie uma mensagem</strong>
          <p></p>
          <div class="input-group">
            <span class="input-group-addon">Nome</span>
            <input class="form-control" type="text" name="tNome" size="45" required>
          </div><br/>
          <div class="input-group">
            <span class="input-group-addon">E-mail</span>
            <input class="form-control" type="email" name="tEmail" size="45" required><br>
          </div><br/>
          <div class="input-group">
            <span class="input-group-addon">Telefone</span>
            <input class="form-control" type="tel" name="tTelefone" size="45" required><br>
          </div><br/>
          <div class="input-group">
            <span class="input-group-addon">Assunto</span>
            <input class="form-control" type="text" name="tAssunto" size="45" required><br>
          </div>
          <span class="input-group-addon">Mensagem</span>
          <textarea class="endo_img form-control" placeholder="Mensagem..." name="tMenssagem" rows="6" cols="43" wrap="virtual" required></textarea><br>
          <input class="endo_img btn btn-success btn-lg" type="submit" name="enviar" value="Enviar Mensagem">
        </form>
      </div>
    </div>
    <div class="col-sm-6 col-xs-12">
      <div class="endo-box"  style="font-size:16px">
        <p><span class="glyphicon glyphicon-home endo-icon"></span> <strong>Escritório: </strong><br>Rua Lázaro de Almeira Baima, 1014 - Jardim das Araras - Itaituba - PA, CEP 68.180-130</p>
        <span class="glyphicon glyphicon-map-marker endo-icon"></span> <strong>Onde estamos:</strong><br/><br/>
        <iframe class="endo-mapa" width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/ms?msa=0&amp;msid=203815559016864751127.0004ff7cd23a2fa0978ae&amp;hl=pt-BR&amp;ie=UTF8&amp;t=m&amp;z=17&amp;output=embed"></iframe><br />
      </div>
    </div>
  </div>
</div>
<?php 
require $_SERVER["DOCUMENT_ROOT"]."/padrao/footer.php";
 ?>