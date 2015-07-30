<?php 
/* ========================================================================
 * EG Profissionais - protecao_login.php  V. 1.0
 * Endogênese Consultoria e Serviços LTDA
 * ========================================================================
 * Finalidade: Verifica se o usuário está logado.
 * Autor: Alan Cliff
 * Última Atualização - 20/05/2015
 * ======================================================================== */
 $tempo=1200;
session_start();
// setcookie(session_name(),session_id(),time()+$lifetime);

if (!isset($_SESSION['login_mestre'])) {
	header("location: /egprofissionais/action/sair.php");
	die();
}

if ($_SESSION['tempo_expiracao'] < ( time()-$tempo)) {
	header("location: /egprofissionais/action/sair.php");
	die();

}


$_SESSION['tempo_expiracao'] = time();

?>