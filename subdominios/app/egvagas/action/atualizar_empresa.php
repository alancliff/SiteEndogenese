<?php
include $_SERVER["DOCUMENT_ROOT"]."/padrao/conexao_egvagas.php";

$set = "";

foreach ($_POST as $key => $value) {
        if ($key !=='id_empresa' )
        {
           $set .= "$key=:$key,";
        }
    }
      $set = substr($set, 0, -1);


$sql = ("UPDATE empresas SET $set WHERE id_empresa = $_POST[id_empresa]");
// echo $sql;

$sql = $conexao->prepare($sql);

foreach ($_POST as $key => $value) 

   {
         if ($key !=='id_empresa')
            {
                     try
                     {
                        $sql->bindValue(":$key", $value);
                     }
                     catch(PDOException $e)
                     {
                     echo $e->getMessage();
                     $arr = $sql->errorInfo();
                     print_r($arr);
                     }
            }
   }

//Verifico se o registro foi inserido com sucesso
if ($sql->execute()) {
	echo "<div class='alert alert-success alert-dismissible fade in' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
      <h4>Atualização bem sucedida!</h4>
      <p>A empresa foi atualizada com sucesso.</p>
      <p>
        <button type='button' class='btn btn-success'  data-dismiss='alert' aria-label='Close'>OK</button>
      </p>
    </div>";
}
else {
	echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
      <h4>Ops! Alguma coisa deu errado...</h4>
      <p>Não foi possivel fazer a atualização da empresa. Entre em contato com o Administrador. <br>".print_r($sql->errorInfo())."</p>
      <p>
        <button type='button' class='btn btn-danger'  data-dismiss='alert' aria-label='Close'>OK</button>
      </p>
    </div>";	
}
?>