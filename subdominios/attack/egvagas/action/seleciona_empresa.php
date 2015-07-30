<?php
include "../includes/conexao.php";

$query = ("SELECT id_empresa, fantasia
				FROM empresas ORDER BY fantasia");

// echo "<option value='as'>$query</option>";
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
	while ($empresa_item = $query->fetch(PDO::FETCH_ASSOC) )
			{
				echo "<option value='$empresa_item[id_empresa]'>$empresa_item[fantasia]</option>";
			}
}
// else{
// 	echo "<option value='as'>Ops</option>";
// }


?>