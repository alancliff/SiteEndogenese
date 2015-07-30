<?php 
/* ========================================================================
 * EG Profissionais - login.php  V. 1.0
 * Endogênese Consultoria e Serviços LTDA
 * ========================================================================
 * Finalidade: Tela de login.
 * Autor: Alan Cliff
 * Última Atualização - 20/05/2015
 * ======================================================================== */
require $_SERVER["DOCUMENT_ROOT"]."/egprofissionais/includes/constantes.php"; 
require $_SERVER["DOCUMENT_ROOT"]."/egprofissionais/includes/header.php";
?>
    
      <div class="container-geral">
      <div class="row">
        <div class=" col-lg-4 col-xs-6  col-lg-offset-4 col-xs-offset-3">
        <form id="form-signin" role="form" action="../action/autenticar.php" method="post">
          <h2 class="text-center">Logo marca</h2>
          <input class="form-control" placeholder="Login" required="" autofocus="" type="text" id="login" name="login"><br>
          <input class="form-control" placeholder="Senha" required="" type="password" id="senha" name="senha">
          <button class="btn btn-lg btn-primary btn-block" type="submit" name="entrar" style="margin-top: 20px  ">Entrar</button>
        </form>
        </div>
      </div>



    
<?php require $_SERVER["DOCUMENT_ROOT"]."/egprofissionais/includes/footer.php"; ?>