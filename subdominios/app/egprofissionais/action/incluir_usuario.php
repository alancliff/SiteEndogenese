<?php
/* ========================================================================
 * EG Profissionais - atualizar_profissional.php  V. 1.0
 * Endogênese Consultoria e Serviços LTDA
 * ========================================================================
 * Finalidade: Realiza a atualização do profissional no banco de dados.
 * Autor: Alan Cliff
 * Última Atualização - 20/05/2015
 * ======================================================================== */

require $_SERVER["DOCUMENT_ROOT"]."/egvagas/includes/constantes.php"; 


include "../includes/conexao.php";
$senha = md5(sha1('Endo2015'));

// $sql = ("INSERT INTO mestre VALUES ( default, 'admin', '$senha')");
$sql = ("UPDATE mestre SET senha_mestre = '$senha' WHERE id_mestre = 2");

echo $sql;
$sql = $conexao->prepare($sql);

if ($sql->execute()) {
   echo "OK";
}
else{
   $arr = $sql->errorInfo();
   print_r($arr);
}

?>