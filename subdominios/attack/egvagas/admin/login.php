<?php 
$subtitulo = "Login";
require $_SERVER["DOCUMENT_ROOT"]."/egvagas/includes/constantes.php"; 
require $_SERVER["DOCUMENT_ROOT"]."/egvagas/includes/header.php";
?>
    
      <div style="margin-top:50px;">
      <div class="row">
        <div class=" col-lg-4 col-xs-6  col-lg-offset-4 col-xs-offset-3">
        <form id="form-signin" role="form" action="../action/autenticar.php" method="post">
          <img src="/egvagas/img/logo_eg_vagas.png" style="display:block;margin:auto;width:300px;"><br>
          <input class="form-control" placeholder="Login" required="" autofocus="" type="text" id="login" name="login"><br>
          <input class="form-control" placeholder="Senha" required="" type="password" id="senha" name="senha">
          <button class="btn btn-lg btn-primary btn-block" type="submit" name="entrar" style="margin-top: 20px  ">Entrar</button>
        </form>
        </div>
      </div>



    
<?php require $_SERVER["DOCUMENT_ROOT"]."/egvagas/includes/footer.php"; ?>