<?php
//inclui arquivo de conexão
include "../includes/conexao.php";
//recebe o email para consulta;
$email = $_POST['email'];

//prepara a query;
$sql = $conexao->prepare("SELECT nome_cliente, email, celular
		FROM clienteweb
		WHERE email=:email");
try
{
 $sql->bindParam(":email", $email , PDO::PARAM_STR);
 $sql->execute();
}
  catch(PDOException $e){
  echo $e->getMessage();
  $arr = $sql->errorInfo();
  print_r($arr);
}

//se retornou, captura os dados retornados
if($sql->rowCount() > 0){
	while($valor = $sql->fetch(PDO::FETCH_OBJ))
	{ 
		echo $valor->nome_cliente."|".$valor->celular;
	}
}
?>