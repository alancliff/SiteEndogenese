<?php
include "../includes/conexao.php";
$_POST['id_empresa'];
$query = ("SELECT id_vaga, cargo
			FROM vagas
			WHERE id_empresa = $_POST[id_empresa] ORDER BY cargo");
$query = $conexao->prepare($query);

//Prepara a lista de vagas a serem enviadas;
try
{
 $query->execute();
}
catch(PDOException $e){
  echo $e->getMessage();
  $arr = $sql->errorInfo();
  print_r($arr);
}

if ($query->rowCount() > 0) 
{
	while ($cargo_item = $query->fetch(PDO::FETCH_ASSOC) )
			{
				echo "<option value='$cargo_item[id_vaga]'>$cargo_item[cargo]</option>";
			}
}


?>