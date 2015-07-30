<?php

require $_SERVER["DOCUMENT_ROOT"]."/egvagas/action/protecao_login.php";
require $_SERVER["DOCUMENT_ROOT"]."/egvagas/includes/constantes.php"; 
require $_SERVER["DOCUMENT_ROOT"]."/egvagas/includes/header.php"; 

include "../includes/conexao.php";


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
if( $sql->execute())
{
   echo "Inclusão da VAGA realizada com SUCESSO!<br>";
   echo "<a class='btn btn-default btn-xs' href='/egvagas/admin/index.php'>Voltar</a>";
}
else
{
   $arr = $sql->errorInfo();
   print_r($arr);
}




?>
