<?php
/* ========================================================================
 * EG Profissionais - incluir_profissional.php  V. 1.0
 * Endogênese Consultoria e Serviços LTDA
 * ========================================================================
 * Finalidade: Realiza a inclusão do profissional no banco de dados.
 * Autor: Alan Cliff
 * Última Atualização - 15/05/2015
 * ======================================================================== */

require $_SERVER["DOCUMENT_ROOT"]."/egvagas/includes/constantes.php"; 


include "../includes/conexao.php";


$colunas = "";
$valores = "";
foreach ($_POST as $key => $value) {
		  	if ($value !== '' )
		  	{
		  	   $colunas .= "$key,"; 
            $valores .= ":$key,";
		  	}
		}
      $colunas = substr($colunas, 0, -1);
      $valores = substr($valores, 0, -1);

$sql = ("INSERT INTO profissionais (".$colunas.") VALUES (".$valores.")");
//echo $sql;
$sql = $conexao->prepare($sql);


foreach ($_POST as $key => $value) 
   {
         if ($value !== '')
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
      $id_cadastrado = $conexao->lastInsertId();

      $sql_confirma = $conexao->prepare("SELECT nome_conhecido, email_profissional, profissao
                        FROM profissionais
                        WHERE id_profissional = $id_cadastrado");
      if ($sql_confirma->execute()) 
      {
         while($dados = $sql_confirma->fetch(PDO::FETCH_OBJ))
         {
            $para = $dados->email_profissional;
            $nome = $dados->nome_conhecido;
            $profissao = $dados->profissao;
         }
         $email_site= "endogenese@endogenese.com.br";
         $assunto = "Solicitação de Cadastro - EG Profissionais";
        
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
         <p>Você solicitou o cadastramento de seus dados como profissional autônomo na categoria <strong>".$profissao."</strong>, no site: <a ".$style_a." href='".SITE."/profissionais' target='blank'>www.endogenese.com.br/profissionais</a>.
         <br>Seu cadastro será analisado, e sujeita-se à aprovação integral, aprovação parcial e mesmo ao indeferimento. Reservamo-nos o direito de realizar ajustes nos dados (como correção gramatical e ortográfica), para melhor adequação aos requisitos do site, sendo que toda alteração será comunicada a você exclusivamente via e-mail cadastrado.</p>
         <p>Caso você não concorde com as alterações, poderá solicitar a qualquer tempo a exclusão de seu cadastro. Consulte nossos <a ".$style_a." href='".SITE.DIR."/paginas/politica_privacidade.php' target='blank'>Termos de Uso de Serviços</a>, bem como nossa <a ".$style_a." href='".SITE.DIR."/paginas/politica_privacidade.php' target='blank'>Política de Privacidade</a> para obter mais informações.</p>
         
         <div ".$style_footer."><a ".$style_a." href='http://www.endogenese.com.br' target='blank'><img ".$imagem_logo."style='display:block; margin: 10px auto 0 auto;'></a><hr>
         <p>Caso não tenha sido você a solicitar o cadastramento, responda a esse e-mail pedindo a exclusão.</p></div></div>";


         $headers= "MIME-Version: 1.1 \r\n";
         $headers.= "Content-Type: text/html; charset=UTF-8 \r\n";
         $headers.="From: ".$email_site."\r\n";
         $headers .="Return-Path: ".$email_site."\r\n";

           mail($para, $assunto, $mensagem, $headers, $email_site);
         // echo "<strong>".$para." </strong><br>".$mensagem;

         $email_adm= "endogenese@gmail.com";
         $assunto_adm = "Cadastro Pendente - EG Profissionais";
         $mensagem_adm = "Uma pessoa se cadastrou no EG Profissionais e está pendente de avaliação:<br>
          NOME: $nome; <br>
          EMAIL: $para;<br>
          <br>Acesse o ambiente administrativo para avaliar: <a href='http://app.endogenese.com.br/egprofissionais'>EG Profissionais</a>";
          mail($email_adm, $assunto_adm, $mensagem_adm, $headers, $email_site);

      }
      else
      {
         echo "<span class='bg-danger' style='margin-left: -30px'><span class='glyphicon glyphicon-remove' 
               aria-hidden='true'></span> Não foi possível enviar o e-mail de confirmação. Consulte o suporte.</span>";

      }

      echo "<div style='color: green'><h1 class='bg-success text-center'><span class='glyphicon glyphicon-ok'
            aria-hidden='true'></span> OBRIGADO POR SE CADASTRAR!</h1>
             <h2 class='text-center'>Você receberá um e-mail comunicando o resultado da avaliação!</h2></div>
             <p class='text-justify'>Seu cadastro será analisado, e sujeita-se à aprovação integral, aprovação parcial e mesmo ao indeferimento. Reservamo-nos o direito de realizar ajustes nos dados (como correção gramatical e ortográfica), para melhor adequação aos requisitos do site, sendo que toda alteração será comunicada a você exclusivamente via e-mail cadastrado.</p>
         <p class='text-justify'>Caso você não concorde com as alterações, poderá solicitar a qualquer tempo a exclusão de seu cadastro. Consulte nossos <a ".$style_a." href='".SITE.DIR."/paginas/politica_privacidade.php' target='blank'>Termos de Uso de Serviços</a>, bem como nossa <a ".$style_a." href='".SITE.DIR."/paginas/politica_privacidade.php' target='blank'>Política de Privacidade</a> para obter mais informações.</p>";

   }
   else
   {
      echo "<span class='bg-danger' style='margin-left: -30px'><span class='glyphicon glyphicon-remove' 
            aria-hidden='true'></span> Não foi possível incluir seu cadastro. Consulte o suporte.</span>";

   }
   



?>
