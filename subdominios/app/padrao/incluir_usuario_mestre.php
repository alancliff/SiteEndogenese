<?php
include "conexao_login.php";


$sql = ("INSERT INTO mestre VALUES (default, 'endogenese', '". md5(sha1('Endo2015mestre'))."','Endogênese Soluções', 'endogenese@endogenese.com.br', default)");
$sql = $conexao->prepare($sql);

// $sql->execute();


?>