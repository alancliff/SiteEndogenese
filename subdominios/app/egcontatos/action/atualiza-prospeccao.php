<?php
include $_SERVER["DOCUMENT_ROOT"]."/padrao/conexao_egcontatos.php";

$set = "";

foreach ($_POST as $key => $value) {
        if ($key !=='id_prospeccao' )
        {
           $set .= "$key=:$key,";
        }
    }
      $set = substr($set, 0, -1);


$sql = ("UPDATE prospeccao SET $set WHERE id_prospeccao = $_POST[id_prospeccao]");
// echo $sql;

$sql = $conexao->prepare($sql);

foreach ($_POST as $key => $value) 

   {
         if ($key !=='id_prospeccao')
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
      <h4>Inclusão bem sucedida!</h4>
      <p>A pretensão do cliente foi incluída com sucesso.</p>
      <p>
        <button type='button' class='btn btn-success'  data-dismiss='alert' aria-label='Close'>OK</button>
      </p>
    </div>";
}
else {
	echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
      <h4>Ops! Alguma coisa deu errado...</h4>
      <p>Não foi possivel fazer a inclusão da prospeccao. Entre em contato com o Administrador. <br>".print_r($sql->errorInfo())."</p>
      <p>
        <button type='button' class='btn btn-danger'  data-dismiss='alert' aria-label='Close'>OK</button>
      </p>
    </div>";	
}
?>