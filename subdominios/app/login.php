<?php 
$subtitulo = "Login";

include $_SERVER["DOCUMENT_ROOT"]."/padrao/constantes.php";
include $_SERVER["DOCUMENT_ROOT"]."/padrao/header.php";
include $_SERVER["DOCUMENT_ROOT"]."/padrao/menu.php";
?>
    <div class="container topo_pagina" style="margin-top: 100px;">
     
      <div class="row">
        <div class=" col-lg-4 col-xs-6  col-lg-offset-4 col-xs-offset-3">
        <form id="form-signin" role="form" action="/protecao/autenticar.php" method="post">
          <img src="/admin/img/logo_endogenese.png" style="display:block;margin:auto;width:300px;"><br>
          <input class="form-control" placeholder="Login" required="" autofocus="" type="text" id="login" name="login"><br>
          <input class="form-control" placeholder="Senha" required="" type="password" id="senha" name="senha">
          <button class="btn btn-lg btn-primary btn-block" type="submit" name="entrar" style="margin-top: 20px  ">Entrar</button>
        </form>
        </div>
      </div>
    </div>


    
<?php include $_SERVER["DOCUMENT_ROOT"]."/padrao/footer.php"; ?>