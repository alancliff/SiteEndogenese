<?php
/* ========================================================================
 * EG Profissionais - sair.php  V. 1.0
 * Endogênese Consultoria e Serviços LTDA
 * ========================================================================
 * Finalidade: Limpa os dados de sessão.
 * Autor: Alan Cliff
 * Última Atualização - 20/05/2015
 * ======================================================================== */

// Initialize the session.
// If you are using session_name("something"), don't forget it now!
session_start();

// Unset all of the session variables.
$_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-42000, '/egprofissionais/admin/');
}

// Finally, destroy the session.
session_destroy();
header("location: /egprofissionais/admin/login.php");




?>