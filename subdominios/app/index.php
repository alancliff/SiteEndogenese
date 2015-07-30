<?php 
$subtitulo = "Início";
require $_SERVER["DOCUMENT_ROOT"]."/protecao/protecao_login.php";
include $_SERVER["DOCUMENT_ROOT"]."/padrao/constantes.php";
include $_SERVER["DOCUMENT_ROOT"]."/padrao/header.php";
include $_SERVER["DOCUMENT_ROOT"]."/padrao/menu.php";
?>

 <!-- CONTEÚDO -->

    <style type="text/css">
    .bloco-app{
      padding: 20px;
      border: 1px solid green;
      border-radius: 5px;
      text-align: center;
      font-variant: small-caps;
      background-color: white;
           transition-duration: 0.5s;
          -moz-transition-duration: 0.5s;
          -webkit-transition-duration: 0.5s;
          -o-transition-duration: 0.5s;
    }
    
    /* unvisited link */
    a:link {
        color: #009148;
        text-decoration: none;
    }

    /* visited link */
    a:visited {
        color: #009148;
        text-decoration: none;
    }

    /* mouse over link */
    a:hover {
        color: #009148;
        text-decoration: none;
    }
    a:hover>.bloco-app{
        background-color: #009148;
        color: white;
    }
    /* selected link */
    a:active {
        color: #009148;
        text-decoration: none;
    }
    


    </style>
  <div class="container topo_pagina" >
  <h2 class="text-center bg-info">Painel de Aplicativos</h2>
  <div class="row">
    <div class="col-xs-3">
      <a href="http://www.endogenese.com.br/cpanel" target="_blank"><h3 class="bloco-app">cPanel</h3></a>
    </div>
    <div class="col-xs-3">
      <a href="http://blog.endogenese.com.br/wp-admin" target="_blank"><h3 class="bloco-app">Blog</h3></a>
    </div>
    <div class="col-xs-3">
      <a href="http://www.bancoamazonia.com.br/index.php/portal-do-projetista/acesso" target="_blank"><h3 class="bloco-app">Portal do Projetista</h3></a>
    </div>
    <div class="col-xs-3">
       <a href="https://delicious.com/endogenese_br" target="_blank"><h3 class="bloco-app">Links Úteis</h3></a>
    </div>
  </div>
  
  <div class="row">
  	<div class="col-xs-3">
     <a href="<?php echo APP.'/egcontatos';?>"> <h3 class="bloco-app">EG Contatos</h3></a>
    </div>
    <div class="col-xs-3">
      <a href="<?php echo APP.'/egvagas';?>"> <h3 class="bloco-app">EG Vagas</h3></a>
    </div>
     <div class="col-xs-3">
      <a href="http://cloud.endogenese.com.br"><h3 class="bloco-app">EG Cloud</h3></a>
    </div>
    <div class="col-xs-3">
      <a href="http://webmail.endogenese.com.br" ><h3 class="bloco-app">EG Email</h3></a>
    </div>
  </div>



  </div><!--- fim container--> 
  
<?php include $_SERVER["DOCUMENT_ROOT"]."/padrao/footer.php"; ?>