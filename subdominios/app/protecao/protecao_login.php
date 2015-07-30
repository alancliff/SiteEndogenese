<?php 

 $tempo=1200;
session_start();
// setcookie(session_name(),session_id(),time()+$lifetime);

if (!isset($_SESSION['login_mestre'])) {
	header("location: /protecao/sair.php");
	die();
}

if ($_SESSION['tempo_expiracao'] < ( time()-$tempo)) {
	header("location: /protecao/sair.php");
	die();

}


$_SESSION['tempo_expiracao'] = time();

?>