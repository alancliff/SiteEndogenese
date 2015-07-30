<?php

require $_SERVER["DOCUMENT_ROOT"]."/egvagas/action/protecao_login.php";
require $_SERVER["DOCUMENT_ROOT"]."/egvagas/includes/constantes.php"; 
require $_SERVER["DOCUMENT_ROOT"]."/egvagas/includes/header.php"; 

include "../includes/conexao.php";


$sql = $conexao->prepare("SELECT emp_email, cnpj
                    FROM empresas 
                    WHERE emp_email = :emp_email
                    OR cnpj = :cnpj"); 
try
{
  $sql->bindValue(":emp_email", $_POST['emp_email']);
  $sql->bindValue(":cnpj", $_POST['cnpj']);
  $sql->execute();
}
catch(PDOException $e)
{
   echo $e->getMessage();
   print_r($sql->errorInfo());
}

if ($sql->rowCount() > 0) {
   while($valor = $sql->fetch(PDO::FETCH_OBJ))
   { 
      $my_emp_email = $valor->emp_email;
      $my_cnpj = $valor->cnpj;
   }
   if ($my_emp_email == $_POST['emp_email']) 
   {
      echo "E-mail já cadastrado no sistema.<br>";
      echo "<a class='btn btn-default btn-xs' href='/egvagas/admin/formulario_empresa.php'>Voltar</a>";
      die();
   }
   if ($my_cnpj == $_POST['cnpj'])
   {
      echo "CNPJ já cadastrado no sistema.<br>";
      echo "<a class='btn btn-default btn-xs' href='/egvagas/admin/formulario_empresa.php'>Voltar</a>";

      die();
   }


}
                           
       


$colunas = "";
$valores = "";
foreach ($_POST as $key => $value) {
		  	if ($value !== '' && substr($key, 0,4) != 'esc_')
		  	{
		  		$colunas .= "$key,"; 
          $valores .= ":$key,";
		  	}
		}
      $colunas = substr($colunas, 0, -1);
      $valores = substr($valores, 0, -1);
$sql = ("INSERT INTO empresas (".$colunas.") VALUES (".$valores.")");
$sql = $conexao->prepare($sql);


foreach ($_POST as $key => $value) 
   {
         if ($value !== '' && substr($key, 0,4) != 'esc_')
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

if($sql->execute())
{
   echo "Inclusão da EMPRESA realizada com SUCESSO!<br>";
   echo "<a class='btn btn-default btn-xs' href='/egvagas/admin/index.php'>Voltar</a>";
   die();

}
else
{

   $arr = $sql->errorInfo();
   print_r($arr);
}




?>
