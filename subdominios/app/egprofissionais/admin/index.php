<?php 
/* ========================================================================
 * EG Profissionais - index.php  V. 1.0
 * Endogênese Consultoria e Serviços LTDA
 * ========================================================================
 * Finalidade: Página Administrativa principal.
 * Autor: Alan Cliff
 * Última Atualização - 20/05/2015
 * ======================================================================== */
require $_SERVER["DOCUMENT_ROOT"]."/egprofissionais/action/protecao_login.php";
require $_SERVER["DOCUMENT_ROOT"]."/egprofissionais/includes/constantes.php"; 
require $_SERVER["DOCUMENT_ROOT"]."/egprofissionais/includes/header.php"; 

//ajustar o fuso horário do PHP
date_default_timezone_set('America/Santarem');
?>

<div style="margin:80px;"></div>

<a class="btn btn-danger" href="<?php echo APP.'/egprofissionais/action/sair.php';?>">Sair</a>
<div style="margin:80px;"></div>
<div class="container">
    <div class="row">
    	<div class="col-xs-4">
    		<p class="text-center">Pesquise pelo nome do Profissional</p><br>
    		<input class="entradas" name="nome_i" type="text" id="nome_i" size="20" maxlength="100" onkeyup="ConsultaNome(this.value)"/>
    	</div>
        <div class="col-xs-4">
        <p class="text-center">Selecione uma profissão</p><br>
            <select id="profissoes_admin" size="3" class="form-control fonte-xs" >
            </select>
        </div>
    	<div class="col-xs-4">
    		<button class="btn btn-primary" onclick="ConsultaPendentes()">LISTAR PENDENTES</button>
    	</div>
    </div>

<script type="text/javascript">
    listaProfissoes("profissoes_admin");
</script>
<hr>

    <div id="res_consulta">&nbsp;</div>
</div>

<!-- MODAL CADASTRO-->
<div class="modal fade" id="ModalEditCadastro" tabindex="-1" role="dialog" aria-labelledby="ModalEditCadastroLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" id="conteudo_ModalEditCadastro">
    	<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div style="text-align: center;"><img src='http://app.endogenese.com.br/egprofissionais/img/load.gif'></div>
      </div>
      <div class="modal-footer">
      </div>
      
    </div>
  </div>
</div>
<!-- MODAL CADASTRO -->

 
<?php require $_SERVER["DOCUMENT_ROOT"]."/egprofissionais/includes/footer.php"; ?>