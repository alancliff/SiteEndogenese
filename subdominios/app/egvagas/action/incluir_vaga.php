<?php

include $_SERVER["DOCUMENT_ROOT"]."/padrao/conexao_egvagas.php";

$colunas = "";
$valores = "";
foreach ($_POST as $key => $value) {
		  	if ($value !== '' )
		  	{
		  		$colunas .= "$key,"; 
          $valores .= ":$key,";
		  	}
		}
      $colunas = substr($colunas, 0, -1);
      $valores = substr($valores, 0, -1);
$sql = ("INSERT INTO vagas (".$colunas.") VALUES (".$valores.")");
$sql = $conexao->prepare($sql);


foreach ($_POST as $key => $value) 
   {
         if ($value !== '')
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
      <p>Inclusão da VAGA realizada com sucesso. Fique à vontade para fazer uma nova inclusão.</p>
      <p>
        <button type='button' class='btn btn-success'  data-dismiss='alert' aria-label='Close'>OK</button>
      </p>
    </div>";
}
else {
   echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
      <h4>Ops! Alguma coisa deu errado...</h4>
      <p>Não foi possivel inserir a vaga. Entre em contato com o Administrador. <br>".print_r($sql->errorInfo())."</p>
      <p>
        <button type='button' class='btn btn-danger'  data-dismiss='alert' aria-label='Close'>OK</button>
      </p>
    </div>";   
}



?>
