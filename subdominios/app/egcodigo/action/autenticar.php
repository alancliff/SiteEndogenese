<?php 
 
include "../includes/conexao.php";

    $email_empresa = $_POST['email_empresa'];
    $entrar = $_POST['entrar'];
    $senha_empresa = md5(sha1($_POST['senha_empresa']));
    //Comente a linha acima e descomente a linha abaixo para inserir a empresa diretamente no
    //banco e atualizar com senha criptografada pelo painel administrativo. 
    //Depois deixe como está.
    //Faça o mesmo no arquivo /action/atualiza_perfil.php
    // $senha_empresa = $_POST["senha_empresa"];
    if (isset($entrar)) {
                     
            $sql = $conexao->prepare("SELECT id_empresaweb, nome_empresa, cnpj, email_empresa, telefone, senha_empresa
                    FROM empresaweb 
                    WHERE email_empresa = :email_empresa");  

            try
            {
                $sql->bindParam(":email_empresa", $email_empresa , PDO::PARAM_STR);
                $sql->execute();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
            if ($sql->rowCount() == 1) {
                while ($valor = $sql->fetch(PDO::FETCH_ASSOC) )
                    {
                       if ($senha_empresa  == $valor['senha_empresa'])
                       {
                         // $lifetime=10;
                        session_start();
                        // setcookie(session_name(),session_id(),time()+$lifetime);
                        session_regenerate_id(true); 
                        $_SESSION['id_empresaweb'] = $valor['id_empresaweb'];
                        $_SESSION['nome_empresa']   = $valor['nome_empresa'];
                        $_SESSION['cnpj']     = $valor['cnpj'];
                        $_SESSION['email_empresa']     = $valor['email_empresa'];
                        $_SESSION['telefone']     = $valor['telefone'];
                        $_SESSION['tempoexp'] = time();
                       }
                       else
                       {
                        echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='/egcodigo/admin/login.php';</script>";
                         die();
                       }

                    }
                    header("location: /egcodigo/admin/index.php");
            }
      

    }  
      die();
?>
