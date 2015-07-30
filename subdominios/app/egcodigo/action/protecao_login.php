<?php 

 $tempo=1200;
session_start();
// setcookie(session_name(),session_id(),time()+$lifetime);

if (!isset($_SESSION['id_empresaweb'])) {
	header("location: /egcodigo/action/sair.php");
	die();
}

if ($_SESSION['tempoexp'] < ( time()-$tempo)) {
	header("location: /egcodigo/action/sair.php");
	die();

}


$_SESSION['tempoexp'] = time();

?>