<?php
include $_SERVER["DOCUMENT_ROOT"]."/padrao/conexao_egvagas.php";
require $_SERVER["DOCUMENT_ROOT"]."/padrao/constantes.php"; 


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

$sql = ("INSERT INTO pessoas (".$colunas.") VALUES (".$valores.")");
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

      $sql_confirma = $conexao->prepare("SELECT pes_nome, pes_email, dt_inclusao
                        FROM pessoas
                        WHERE id_pessoa = $id_cadastrado");
      if ($sql_confirma->execute()) 
      {
         while($dados = $sql_confirma->fetch(PDO::FETCH_OBJ))
         {
            $para = $dados->pes_email;
            $nome = $dados->pes_nome;
         }
         $link = SITE."/vagas/paginas/exclui_candidato.php";
         $email_site= "egvagas@endogenese.com.br";
         $assunto = "Confirmação de Cadastro - EG VAGAS";
        
         $imagem_banner = "src='".APP."/egvagas/img/confirmacao_img.jpg'";
         $imagem_logo = "src='".APP."/egvagas/img/logo-endogenese.png'";
         $style_container="style ='padding: 5px; margin: 0 auto; width: 100%; max-width: 800px; font-family:Arial; color: black; background-color:white;'";
         $style_p = "style ='margin: 15px 10px 0 0;text-align:justify;'";
         $style_botao = "style ='margin: 25px 0 100px; padding: 10px; text-align:justify;border: 1px solid #32A432; border-radius: 8px; background-color: #32A432;color: white;'";
         $style_a = "style = 'font-weight: 700;color: rgb(50, 164, 50); text-decoration:none;'";
         $style_a2 = "style = 'font-weight: 700;color: white; text-decoration:none;'";
         $style_footer = "style = 'margin: 0;text-align:center; font-size: 10px;'";
         $mensagem = "<meta charset='UTF-8'><div ".$style_container.">
         <img ".$imagem_banner." style='display:block; margin:0 auto 10px auto; width:100%;'>
         <p ".$style_p.">
         Olá ".$nome."!<br><br>
         Você se cadastrou no site <a ".$style_a." href='".SITE."/vagas' target='blank'>EG Vagas</a>.
         <p>A partir de agora você receberá informativos acerca de Oportunidades de Emprego tão logo elas sejam divulgadas no site.</p>
         <p>Esperamos que essas informações sejam úteis para você, ou para ajudar um amigo a conseguir um emprego.</p>
         <p>Veja com atenção os critérios e exigências de cada vaga aberta, para que você não corra o risco de frustar suas expectativas. Ao selecionar uma vaga, clique no botão \"QUERO ESTE EMPREGO\", e saiba como se candidatar à vaga.</p>
         
         <br>
         <p>Boa Sorte!</p>
         <br>
         <div ".$style_footer."><a ".$style_a." href='http://www.endogenese.com.br' target='blank'><img ".$imagem_logo."style='display:block; margin: 10px auto 0 auto;'></a><hr>
         <p>Ao manter seu cadastro, você está concordando inteiramente com a nossa <a ".$style_a." href='".SITE.DIR."/paginas/politica_privacidade.php' target='blank'>Política de Privacidade</a>.
         <br>Caso não tenha sido você a solicitar o cadastramento, <a ".$style_a." href='$link'>clique aqui.</a></p></div></div>";


         $headers= "MIME-Version: 1.1 \r\n";
         $headers.= "Content-Type: text/html; charset=UTF-8 \r\n";
         $headers.="From: ".$email_site."\r\n";
         $headers .="Return-Path: ".$email_site."\r\n";

            mail($para, $assunto, $mensagem, $headers, $email_site);
         // echo "<strong>".$assunto." </strong><br>".$mensagem;



      }
      else
      {
         echo "<span class='bg-danger' style='margin-left: -30px'><span class='glyphicon glyphicon-remove' 
               aria-hidden='true'></span> Não foi possível enviar o e-mail de confirmação. Consulte o suporte.</span>";

      }

      echo "<span class='bg-success' style='margin-left: -30px'><span class='glyphicon glyphicon-ok'
            aria-hidden='true'></span> SUCESSO! Abra seu e-mail e ative seu cadastro!</span>";

   }
   else
   {
      echo "<span class='bg-danger' style='margin-left: -30px'><span class='glyphicon glyphicon-remove' 
            aria-hidden='true'></span> Não foi possível incluir seu cadastro. Consulte o suporte.</span>";

   }
   



?>
