<?php 
 /* ========================================================================
 * EG Profissionais - autenticar.php  V. 1.0
 * Endogênese Consultoria e Serviços LTDA
 * ========================================================================
 * Finalidade: Faz a autenticação de usuário para acessar a página administrativa.
 * Autor: Alan Cliff
 * Última Atualização - 20/05/2015
 * ======================================================================== */
include "../includes/conexao.php";

    $login_mestre = $_POST['login'];
    $entrar = $_POST['entrar'];
    // $senha_mestre = $_POST['senha'];
    $senha_mestre = md5(sha1($_POST['senha']));

    if (isset($entrar)) {
                     
            $sql = $conexao->prepare("SELECT login_mestre, senha_mestre
                    FROM mestre 
                    WHERE login_mestre = :login_mestre");  

            try
            {
                $sql->bindParam(":login_mestre", $login_mestre , PDO::PARAM_STR);
                $sql->execute();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
            if ($sql->rowCount() == 1) {
                while ($valor = $sql->fetch(PDO::FETCH_ASSOC) )
                    {
                       if ($senha_mestre  == $valor['senha_mestre'])
                       {
                         // $lifetime=10;
                        session_start();
                        // setcookie(session_name(),session_id(),time()+$lifetime);
                        session_regenerate_id(true); 
                        $_SESSION['login_mestre'] = $valor['login_mestre'];
                        $_SESSION['tempo_expiracao'] = time();
                       }
                       else
                       {
                        echo "<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='/egprofissionais/admin/login.php';</script>";
                         die();
                       }

                    }
                    header("location: /egprofissionais/admin/index.php");
            }
      echo "<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='/egprofissionais/admin/login.php';</script>";
     

    }  
      die();
?>
