<?php
include $_SERVER["DOCUMENT_ROOT"]."/padrao/conexao_egcontatos.php";
?>


<?php

$inicial= $_POST['id_contato'];

$busca = ("SELECT * FROM contato WHERE id_contato='$inicial'");
$busca = $conexao->prepare($busca);
$busca->execute();

$verifica  = ("SELECT * FROM prospeccao WHERE id_contato='$inicial'");
$verifica  = $conexao->prepare($verifica );
$verifica ->execute();

while ($dados = $busca->fetch(PDO::FETCH_ASSOC)) {

echo "<div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
      <h3 class='modal-title text-center' id='ModalContatoLabel'><span class='glyphicon glyphicon-user' aria-hidden='true'></span> - $dados[nome_contato]</h3>
      <h4 class='text-center'>$dados[empresa_trabalha]</h4>
      </div>
      <div class='modal-body'>
        <div class='row'>
        	<div class='col-sm-4'>
        		<span class='label_contato'><span class='glyphicon glyphicon-phone' aria-hidden=true'></span> Telefone 01</span><br>$dados[telefone1]
        	</div>
        	<div class='col-sm-4'>
        		<span class='label_contato'><span class='glyphicon glyphicon-phone' aria-hidden=true'></span> Telefone 02</span><br>$dados[telefone2]
        	</div>
        	<div class='col-sm-4'>
        		<span class='label_contato'><span class='glyphicon glyphicon-phone-alt' aria-hidden=true'></span> Telefone 03</span><br>$dados[telefone3]
        	</div>
        </div>
        <br>
        <div class='row'>
        	<div class='col-sm-6'>
        		<span class='label_contato'><span class='glyphicon glyphicon-envelope' aria-hidden=true'></span> e-mail</span><br>$dados[email]
        	</div>
        	<div class='col-sm-6'>
        		<span class='label_contato'><span class='glyphicon glyphicon-globe' aria-hidden=true'></span> site</span><br>$dados[site]
        	</div>
        </div>
        <br>
        <div class='row'>
          <div class='col-sm-4'>
            <span class='label_contato'><span class='glyphicon glyphicon-flag' aria-hidden=true'></span> Cidade</span><br>$dados[cidade]
          </div>
          <div class='col-sm-4'>
            <span class='label_contato'><span class='glyphicon glyphicon-flag' aria-hidden=true'></span> UF</span><br>$dados[uf]
          </div>
        </div>
        <br>
        <div class='row'>
        	<div class='col-sm-12' style='margin-top:20px;'>
        		<span class='label_contato'><span class='glyphicon glyphicon-comment' aria-hidden=true'></span> Observações</span><br>$dados[observacao]
        	</div>
        </div> 
        <div id='prospeccao'>";
      if ($verifica->rowCount() > 0) {
        while ($pretensao = $verifica->fetch(PDO::FETCH_ASSOC)) {
        echo "<br><hr>
        <h3 class='text-center'>PRETENSÃO DO CLIENTE</h3>
        <div class='row'>
          <div class='col-sm-4'>
            <span class='label_contato'>Consultor Resp.</span><br>$pretensao[consultor_responsavel]
          </div>
          <div class='col-sm-4'>
            <span class='label_contato'>Valor Estimado</span><br>R$ ".number_format($pretensao[valor_estimado],2,",",".")."
          </div>
          <div class='col-sm-4'>
            <span class='label_contato'>Prioridade</span><br>$pretensao[prioridade]
          </div>

        </div>
        <br>
        <div class='row'>
          <div class='col-sm-12'>
            <span class='label_contato'>Seguimento</span><br>$pretensao[seguimento]
          </div>
          <div class='col-sm-12'>
            <span class='label_contato'>Pretensão</span><br>$pretensao[pretensao]
          </div>
        </div>
        <br>";
        }
      }
      echo "</div></div>
      <div class='modal-footer'>
      <form action='/egcontatos/admin/form-alterar-contato.php' method='post' >
      <input type='hidden' name='id_contato' id='id_contato' value='$dados[id_contato]' >
      <span class='btn btn-danger btn-xs pull-left' onclick='excluirContato($dados[id_contato])' style=''>EXCLUIR</span>";
      if ($verifica->rowCount() == 0) {
        echo "<span class='btn btn-primary btn-xs pull-left' onclick='formPretensao($dados[id_contato])' style=''>INCLUIR PRETENSÃO</span>";
      }
      else {
        echo "<span class='btn btn-warning btn-xs pull-left' onclick='formEditaPretensao($dados[id_contato])' style=''>EDITAR PRETENSÃO</span>";
      }
      echo"
      <button type='submit' class='btn btn-warning'>EDITAR</button>
      <span class='btn btn-info btn-lg' data-dismiss='modal' aria-label='Close'>FECHAR</span></form>
      </div>";
}
?>