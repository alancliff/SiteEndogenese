<?php
//inclui arquivo de conexão
include "../includes/conexao.php";
//recebe o email para consulta;
$pes_email = $_POST['email'];

//prepara a query;
$sql = $conexao->prepare("SELECT pes_email
		FROM pessoas
		WHERE pes_email=:pes_email");
try
{
 $sql->bindParam(":pes_email", $pes_email , PDO::PARAM_STR);
 $sql->execute();
}
  catch(PDOException $e){
  echo $e->getMessage();
  $arr = $sql->errorInfo();
  print_r($arr);
}

//se retornou, captura os dados retornados
if($sql->rowCount() > 0){
	echo "<a style='cursor:pointer;' onclick='mensagemEmail()' >Ver detalhes</a>";
}
?>