<?php

require $_SERVER["DOCUMENT_ROOT"]."/egvagas/includes/constantes.php"; 
//inclui arquivo de conexão
include "../includes/conexao.php";
//recebe o email para consulta;
$pes_email = $_POST['ex_email'];

//prepara a query;
$sql = $conexao->prepare("SELECT id_pessoa, pes_email, pes_nome, dt_inclusao
		FROM pessoas
		WHERE pes_email=:pes_email");
try
{
 $sql->bindParam(":pes_email", $pes_email , PDO::PARAM_STR);
 $sql->execute();
}
  catch(PDOException $e){
  echo $e->getMessage();
  $arr = $sql->errorInfo();
  print_r($arr);
}

//se retornou, captura os dados retornados
if($sql->rowCount() == 0)
{
	echo "0";
}
if($sql->rowCount() == 1){
	
         while($dados = $sql->fetch(PDO::FETCH_OBJ))
         {
            $para = $dados->pes_email;
            $nome = $dados->pes_nome;
            $id_cadastrado = $dados->id_pessoa;
            $emailMD5 = md5($dados->pes_email);
            $dataMD5 = md5($dados->dt_inclusao);
         }

		 $email_site= "egvagas@endogenese.com.br";
         $assunto = "Exclusão de Cadastro - EGVAGAS";
         $link = SITE."/vagas/paginas/confirma_exclusao.php?id=".$id_cadastrado."&cod=".$emailMD5."&dti=".$dataMD5;
        
         $imagem_banner = "src='".APP."/egvagas/img/confirmacao_img.jpg'";
         $imagem_logo = "src='".APP."/egvagas/img/logo-endogenese.png'";
         $style_container="style ='padding: 5px; margin: 0 auto; width: 100%; max-width: 800px; font-family:Arial; color: black; background-color:white;'";
         $style_p = "style ='margin: 15px 10px 0 0;text-align:justify;'";
         $style_botao = "style ='margin: 25px 0 100px; padding: 10px; text-align:justify;border: 1px solid gray; border-radius: 8px; background-color: red;color: white;'";
         $style_a = "style = 'font-weight: 700;color: rgb(50, 164, 50); text-decoration:none;'";
         $style_a2 = "style = 'font-weight: 700;color: white; text-decoration:none;'";
         $style_footer = "style = 'margin: 0;text-align:center; font-size: 10px;'";
         $mensagem = "<meta charset='UTF-8'><div ".$style_container.">
         <img ".$imagem_banner." style='display:block; margin:0 auto 10px auto; width:100%;'>
         <p ".$style_p.">
         Olá ".$nome."!<br><br>
         Você solicitou a exclusão do cadastro de seu e-mail <strong>".$pes_email."</strong> no site <a ".$style_a." href='".SITE."/vagas' target='blank'>www.endogenese.com.br/vagas</a>.
         <br>Para confirmar a exclusão do seu cadastro, basta clicar no botão abaixo:</p><br>
         <span ".$style_botao."><a ".$style_a2." href=".$link." target='blank'>EXCLUIR CADASTRO</a></span>
         <div ".$style_footer."><a ".$style_a." href='http://www.endogenese.com.br' target='blank'><img ".$imagem_logo."style='display:block; margin: 10px auto 0 auto;'></a><hr>
         <p>Caso não tenha sido você a solicitar a exclusão do seu cadastro, apenas ignore esta mensagem.</p></div></div>";


         $headers= "MIME-Version: 1.1 \r\n";
         $headers.= "Content-Type: text/html; charset=UTF-8 \r\n";
         $headers.="From: ".$email_site."\r\n";
         $headers .="Return-Path: ".$email_site."\r\n";

            mail($para, $assunto, $mensagem, $headers, $email_site);
         // echo "<strong>".$assunto." </strong><br>".$mensagem;


	echo "1";
}

?>