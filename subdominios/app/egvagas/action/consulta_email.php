<?php
//inclui arquivo de conexão
include $_SERVER["DOCUMENT_ROOT"]."/padrao/conexao_egvagas.php";

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

//se retornou algum valor
if($sql->rowCount() > 0){
	echo "Em caso de dúvidas entre em <a target='blank' href='http://www.endogenese.com.br/eg/paginas/atendimento.php'>contato</a>";
}
?>