<?php
/* Variáveis PDO */
$engine		= 'mysql';
$base_dados = 'endog103_egcodigo';
$usuario_bd = 'endog103_app';
$senha_bd   = 'endo2014';
$host_db    = 'localhost';
$porta_db	= '3306';
$conexao = null;
 
/* Concatenação das variáveis para detalhes da classe PDO */
$detalhes = $engine.':host=' . $host_db . ';port='.$porta_db.';dbname='. $base_dados;
 
// Tenta conectar
try {
    // Cria a conexão PDO com a base de dados
    $conexao = new PDO($detalhes, $usuario_bd, $senha_bd);
} catch (PDOException $e) {
    // Se der algo errado, mostra o erro PDO
    print "Erro: " . $e->getMessage() . "<br/>";
    // Mata o script
    die();
}
?>