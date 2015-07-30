<?php
include "../includes/conexao.php";
require $_SERVER["DOCUMENT_ROOT"]."/egvagas/includes/constantes.php"; 


$lista_email_dia = ("SELECT pes_email, pes_nome
			FROM pessoas
			WHERE ativa = true
			ORDER BY pes_email;
			");
$consulta_vagas = ("SELECT id_vaga, cargo, qtde_ofertada, dt_inclusao
				FROM vagas 
				WHERE dt_inclusao > date_sub(now(), interval 7 day)
				ORDER BY dt_inclusao DESC;
				");

$lista_email_dia = $conexao->prepare($lista_email_dia);
$consulta_vagas = $conexao->prepare($consulta_vagas);


//Prepara a lista de vagas a serem enviadas;
try
{
 $consulta_vagas->execute();
}
catch(PDOException $e){
  echo $e->getMessage();
  $arr = $sql->errorInfo();
  print_r($arr);
}


$tabela = " width: 100%;
    border-collapse: collapse;
    color: #494947; ";


$tabela_thead = " font-size: 1em;
    border: 1px solid #13A044;
    padding: 3px 7px 2px 7px; ";

$tabela_th = " border: 1px solid #13A044;
    padding: 8px 7px 8px 7px;
    font-size: 1.1em;
    text-align: center;
    background-color: #13A044;
    color: #ffffff;
    border-right: 1px solid #fff; ";



$par = " background-color: #b4ddb4; ";
$impar = " background-color: #fff; ";

$tabela_td = " font-size: 1em;
    border: 1px solid #13A044;
    padding: 6px 7px 6px 7px; 
    font-weight: bold; 
    text-align: center ";

$tabela_td_a = " font-size: 1em;
    border: 1px solid #13A044;
    padding: 6px 7px 6px 7px; 
    font-weight: bold; 
    text-align: left";


$ult = " border-right: 1px solid #13A044; ";


$mylink = " text-decoration: none;
	border: 1px solid #13A044;
	margin: 3px;
	padding:4px;
	border-radius: 4px;
	color: #fff!important;
	background-color: #13A044;
	font-size: 0.8em; ";


if($consulta_vagas->rowCount() > 0)
{ 	
	$con = 1;
	$class= $impar;
	$rol_vagas = "<table style='".$tabela."'><thead style='".$tabela_thead."'><th style='".$tabela_th." text-align: left'>Cargo</th><th style='".$tabela_th."'>Nº de Vagas</th><th style='".$tabela_th."'>Divulgado em</th><th style='".$tabela_th.$ult."'>VISITAR</th></thead>";
	while($valor = $consulta_vagas->fetch(PDO::FETCH_OBJ))
	{ 
		
		$rol_vagas .= "<tr style='".$class."'><td style='".$tabela_td_a."'>".$valor->cargo."</td><td style='".$tabela_td."'>".$valor->qtde_ofertada."</td><td style='".$tabela_td."'>".date("d/m/Y", strtotime($valor->dt_inclusao))."</td><td style='".$tabela_td."'><a style='".$mylink."' href='".SITE."/vagas/index.php?id=".$valor->id_vaga."' target='blank'>Ver Detalhes</a></td></tr>";
		if ($con == 1) {
			$class = $par;
			$con = 0;
		}
		else
		{
			$class = $impar;
			$con = 1;
		}

	}
	$rol_vagas .= "</table>";


//Prepara a lista de e-mail a ser enviado;
try
{
 $lista_email_dia->execute();
}
catch(PDOException $e){
  echo $e->getMessage();
  $arr = $sql->errorInfo();
  print_r($arr);
}



if($lista_email_dia->rowCount() > 0)
{ 
	while($valor = $lista_email_dia->fetch(PDO::FETCH_OBJ))
	{

		$email_site= "egvagas@endogenese.com.br";
		$para = $valor->pes_email;
		$nome = $valor->pes_nome;
		$assunto = 'Oportunidade de emprego! - EG VAGAS';
		$imagem_banner = "src='".APP."/egvagas/img/banner-email.jpg'";
		$imagem_logo = "src='".APP."/egvagas/img/logo-endogenese.png'";
		$descadastra = "href='".SITE."/vagas/paginas/exclui_candidato.php'";
		$container = "padding: 5px; margin: 0 auto; width: 100%; max-width: 800px; font-family:Arial; color: black; background-color:white;";

 		$email_msg = "<meta charset='UTF-8'><div style='".$container."' ><img ".$imagem_banner." style='display:block; margin:0 auto 10px auto; width:100%;'><p style='margin: 15px auto'>Prezado(a) <strong>".$nome."</strong>,</p><p style='margin:15px auto'>Conforme solicitado, estamos encaminhando as oportunidades de emprego que estão disponíveis.<br>Este é o resumo das vagas cadastradas nos últimos <strong>7 dias</strong>.</p><p style='margin: 15px auto'>Não perca tempo e acesse!</p><div style='margin-bottom:70px;'>".$rol_vagas."</div><a href='".SITE."' target='blank'><img ".$imagem_logo."style='display:block; margin: 10px auto 0 auto;'></a><hr><p style='text-align: center; font-size: 10px;'>Esta é uma mensagem automática, não é necessário respondê-la.<br>Caso você não deseje mais receber e-mails informativos sobre oportunidade de emprego, clique <a ".$descadastra." target='blank'>aqui</a>.</p></div>";


		$headers= "MIME-Version: 1.1 \r\n";
		$headers.= "Content-Type: text/html; charset=UTF-8 \r\n";
		$headers.="From: ".$email_site."\r\n";
		$headers .="Return-Path: ".$email_site."\r\n";
		mail($para, $assunto, $email_msg, $headers, $email_site);
		// echo "<strong>".$assunto." </strong><br>".$email_msg;

	}

}
}
// else
// {

// 	echo "Nenhum e-mail a enviar";
// }
			



?>