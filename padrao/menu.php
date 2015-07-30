<!-- BARRA DE MENU  -->
<style type="text/css">

/* FONTE DO NOME ENDOGÊNESE*/
    @font-face {
    font-family: Endo;
    src: url("<?php echo BASE.'/fonts/Freehand.ttf'; ?>");
    }
.endo_font{
font-family:Endo;

}
 .endo_menu{
 font-weight:bold;
 font-variant: small-caps;
 
 }
 
.endo_menu:hover{
 transition-duration: 0.5s;
 -moz-transition-duration: 0.5s;
 -webkit-transition-duration: 0.5s;
 -o-transition-duration: 0.5s;
margin-top: -5px;
margin-bottom: 5px;
background-color:#333333;
border-radius: 8px;
}
.dropdown-menu > li > a{
  color: #999;
  font-weight: bold;
}
.ajuste{
  margin: auto;
width: 900px;
}
@media (min-width: 768px) and (max-width: 991px) {
.endo_menu{
font-size: 0.7em!important;
}
}
@media (max-width: 768px) {

.ajuste{
 margin: auto;
 width: 98%;

}
}
  
</style>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-35363522-1', 'auto');
  ga('send', 'pageview');

</script>
    <div class="navbar-wrapper">
      <div class="" >
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <div class="ajuste" >
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <!-- <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span> -->
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>              </button>
                <a class="navbar-brand endo_font" href="<?php echo SITE; ?>" style="font-size:22px; text-shadow:0 1px 0 #fff;">
                  <img src="<?php echo SITE.DIR.'/img/logos/favicon-57.png'; ?>"  style="display:inline-block; height:40px; margin-top:-8px; margin-right: 10px " class="pull-left"><span class="hidden-xs">Endogênese Soluções</span></a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="endo_menu"><a href="<?php echo SITE.'/vagas'; ?>">EG Vagas</a></li>
                <li role="presentation" class="dropdown endo_menu">
                  <a class="dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-expanded="false">Serviços<span class="caret"></span></a>
                  <ul class="dropdown-menu navbar-inverse" role="menu">
                    <li><a href="<?php echo SITE.DIR.'/paginas/servicos/'; ?>">Todos os Serviços</a></li>
                    <li role="presentation" class="divider"></li>
                    <li><a href="<?php echo SITE.DIR.'/paginas/servicos/projeto_capitacao_recursos.php'; ?>">Projeto para Captação de Recursos</a></li>
                    <li><a href="<?php echo SITE.DIR.'/paginas/servicos/analise_pesquisa_mercado.php'; ?>">Análise de Pesquisas de Mercado</a></li>
                    <li><a href="<?php echo SITE.DIR.'/paginas/servicos/criacao_manutencao_website.php'; ?>">Criação e Manutenção de Websites</a></li>
                    <li><a href="<?php echo SITE.DIR.'/paginas/servicos/plano_infraestrutura_tecnologica.php'; ?>">Plano de Infraestrutura Tecnológica</a></li>
                    <li><a href="<?php echo SITE.DIR.'/paginas/servicos/projeto_engenharia_civil.php'; ?>">Projetos de Engenharia Civil</a></li>
                  </ul>
                </li>
                <li class="endo_menu"><a href="http://blog.endogenese.com.br">Blog</a></li>
                <li class="endo_menu"><a href="<?php echo SITE.DIR.'/paginas/atendimento.php'; ?>">Atendimento</a></li>
                <li class="endo_menu"><a href="<?php echo SITE.DIR.'/paginas/sobre.php'; ?>">Sobre</a></li>
                <li class="endo_menu"><a href="<?php echo APP; ?>">Área Restrita</a></li>

              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
<!-- FIM DO MENU  -->