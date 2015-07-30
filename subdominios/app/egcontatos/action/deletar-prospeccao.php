<?php
include $_SERVER["DOCUMENT_ROOT"]."/padrao/conexao_egcontatos.php";
//consulta para exclusão de dados
$sql = "DELETE FROM prospeccao WHERE id_prospeccao = ".$_POST["id_prospeccao"];
//Execução da consulta
$sql = $conexao->prepare($sql);
//Verificação se o registro foi excluído com sucesso, dando o retorno.
if ($sql->execute()) {
    echo "<div class='alert alert-success alert-dismissible fade in' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
      <h4>Exclusão bem sucedida!</h4>
      <p>O registro de pretensão do contato foi excluído com sucesso!</p>
      <p>
        <button type='button' class='btn btn-success'  data-dismiss='alert' aria-label='Close'>OK</button>
      </p>
    </div>";
}
else {
    echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
      <h4>Ops! Alguma coisa deu errado...</h4>
      <p>Não foi possivel excluir o registro de pretensão contato. Entre em contato com o Administrador. <br>".print_r($sql->errorInfo())."</p>
      <p>
        <button type='button' class='btn btn-danger'  data-dismiss='alert' aria-label='Close'>OK</button>
      </p>
    </div>";	
}
?>
