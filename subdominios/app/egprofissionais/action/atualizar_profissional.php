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


$set = "";

foreach ($_POST as $key => $value) {
		  	if ($key !=='id_profissional' )
		  	{
		  	   $set .= "$key=:$key,";
		  	}
		}
      $set = substr($set, 0, -1);


$sql = ("UPDATE profissionais SET $set WHERE id_profissional = $_POST[id_profissional]");
//echo $sql;
$sql = $conexao->prepare($sql);

foreach ($_POST as $key => $value) 
   {
         if ($key !=='id_profissional')
            {
                     try
                     {
                        $sql->bindValue(":$key", $value);
                     }
                     catch(PDOException $e)
                     {
                     echo $e->getMessage();
                     $arr = $sql->errorInfo();
                     print_r($arr);
                     }
            }
   }

   if ($sql->execute()) {
         $nome = $_POST['nome_conhecido'];
         $para = $_POST['email_profissional'];
         $email_site= "endogenese@endogenese.com.br";
         $assunto = "Informativo - EG Profissionais";
        
         $imagem_banner = "src='".APP."/egprofissionais/img/confirmacao_img.jpg'";
         $imagem_logo = "src='".APP."/egprofissionais/img/logo-endogenese.png'";
         $style_container="style ='padding: 5px; margin: 0 auto; width: 100%; max-width: 800px; font-family:Arial; color: black; background-color:white;'";
         $style_p = "style ='margin: 15px 10px 0 0;text-align:justify;'";
         $style_botao = "style ='margin: 25px 0 100px; padding: 10px; text-align:justify;border: 1px solid #32A432; border-radius: 8px; background-color: #32A432;color: white;'";
         $style_a = "style = 'font-weight: 700;color: rgb(50, 164, 50); text-decoration:none;'";
         $style_a2 = "style = 'font-weight: 700;color: white; text-decoration:none;'";
         $style_footer = "style = 'margin: 0;text-align:center; font-size: 10px;'";
         $mensagem = "<meta charset='UTF-8'><div ".$style_container.">
         <img ".$imagem_banner." style='display:block; margin:0 auto 10px auto; width:100%;'>
         <p ".$style_p.">
         Olá ".$nome."!</p><br>
         <p>Informamos que o seu cadastro no site <a ".$style_a." href='".SITE."/profissionais' target='blank'>www.endogenese.com.br/profissionais</a> foi ativado ou sofreu alguma alteração.
         <br><br>Conforme nossos <a ".$style_a." href='".SITE.DIR."/paginas/politica_privacidade.php' target='blank'>Termos de Uso de Serviços</a>, bem como nossa <a ".$style_a." href='".SITE.DIR."/paginas/politica_privacidade.php' target='blank'>Política de Privacidade</a>, alguns dados podem ser ajustados para se adequar ao site. Caso você não concorde com as alterações, poderá solicitar a qualquer tempo a exclusão de seu cadastro.</p>
         
         <div ".$style_footer."><a ".$style_a." href='http://www.endogenese.com.br' target='blank'><img ".$imagem_logo."style='display:block; margin: 10px auto 0 auto;'></a><hr>
         <p>Caso não tenha sido você a solicitar o cadastramento, responda a esse e-mail pedindo a exclusão.</p></div></div>";


         $headers= "MIME-Version: 1.1 \r\n";
         $headers.= "Content-Type: text/html; charset=UTF-8 \r\n";
         $headers.="From: ".$email_site."\r\n";
         $headers .="Return-Path: ".$email_site."\r\n";

           mail($para, $assunto, $mensagem, $headers, $email_site);
         // echo "<strong>".$para." </strong><br>".$mensagem;

         


      echo "<div style='color: green'><h1 class='bg-success text-center'><span class='glyphicon glyphicon-ok'
            aria-hidden='true'></span> CADASTRO ATUALIZADO COM SUCESSO!</h1>
             <h2 class='text-center'>Foi enviado um e-mail ao usuário comunicando a atualização.</h2></div>";

   }
   else
   {
      echo "<span class='bg-danger' style='margin-left: -30px'><span class='glyphicon glyphicon-remove' 
            aria-hidden='true'></span> Não foi possível atualizar cadastro. Consulte o suporte.</span>";
      $arr = $sql->errorInfo();
      print_r($arr);
   }
   



?>
