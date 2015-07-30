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
.topo_pagina{
  margin-top:60px;
}
#sair{
  color: white!important;
  font-weight: bold!important;
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
                <a class="navbar-brand endo_font" href="<?php echo APP; ?>" style="font-size:22px; text-shadow:0 1px 0 #fff;">
                  <img src="<?php echo SITE.DIR.'/img/logos/favicon-57.png'; ?>"  style="display:inline-block; height:40px; margin-top:-8px; margin-right: 10px " class="pull-left"><span class="hidden-xs">App - Endogênese</span></a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="endo_menu"><a href="<?php echo APP.'/admin/perfil.php'; ?>">Perfil</a></li>
                <li role="presentation" class="dropdown endo_menu">
                  <a class="dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-expanded="false">Aplicações<span class="caret"></span></a>
                  <ul class="dropdown-menu navbar-inverse" role="menu">
                    <li><a href="">Todos</a></li>
                    <li role="presentation" class="divider"></li>
                    <li><a href="">Primeiro</a></li>
                    <li><a href="">Segundo</a></li>
                    <li><a href="">Terceiro</a></li>
                    <li><a href="">Quarto</a></li>
                   </ul>
                </li>
                <li class="endo_menu"><a href="">Outro</a></li>
                <li class=""><a id="sair" class="btn btn-danger" href="/protecao/sair.php">Sair</a></li>

              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
<!-- FIM DO MENU  -->