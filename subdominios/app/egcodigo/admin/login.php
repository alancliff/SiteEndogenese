<?php require $_SERVER["DOCUMENT_ROOT"]."/egcodigo/modelos/header.php";
?>
    
      <div class="container-geral">
      <div class="row">
        <div class=" col-lg-4 col-xs-6  col-lg-offset-4 col-xs-offset-3">
        <form id="form-signin" role="form" action="../action/autenticar.php" method="post">
          <h2 class="text-center">Logo marca</h2>
          <input class="form-control" placeholder="e-mail" required="" autofocus="" type="email" id="email_empresa" name="email_empresa"><br>
          <input class="form-control" placeholder="Senha" required="" type="password" id="senha_empresa" name="senha_empresa">
          <button class="btn btn-lg btn-primary btn-block" type="submit" name="entrar" style="margin-top: 20px  ">Entrar</button>
        </form>
        </div>
      </div>



    
<?php require $_SERVER["DOCUMENT_ROOT"]."/egcodigo/modelos/footer.php"; ?>