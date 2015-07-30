<?php
include "../includes/conexao.php";

//Captura dados do $_POST
$nome_cliente = $_POST['nome_cliente'];
$email = $_POST['email'];
$celular =  $_POST['celular'];
$id_empresaweb = $_POST['id_empresaweb'];




// prepara a query para verificar se o e-mail informado já está cadastrado;
$sql_email = $conexao->prepare("SELECT id_clienteweb
		FROM clienteweb
		WHERE email=:email");
//execulta a query do email;
try{
    $sql_email->bindParam(":email", $email , PDO::PARAM_STR);
    $sql_email->execute();
    }
   catch(PDOException $e){
      echo $e->getMessage();
   }



//se retornou mais de uma linha, então o e-mail já está cadastrado, por isso, é atualizado;
if ($sql_email->rowCount() > 0) {
	//prepara a query de atualização, se for o caso;
	$sql_cliente = $conexao->prepare("UPDATE clienteweb
   					SET nome_cliente=:nome_cliente, celular=:celular
 					WHERE  email= :email");

}
else{
	//prepara query de inclusão do cliente, se não encontrou o e-mail;
	$sql_cliente = $conexao->prepare("INSERT INTO clienteweb 
				VALUES(default,:nome_cliente,:email,:celular, default)");
}
//executa a query de inclusão do clienteweb
try{
 $sql_cliente->bindParam(":email", $email , PDO::PARAM_STR);
 $sql_cliente->bindParam(":nome_cliente", $nome_cliente , PDO::PARAM_STR);
 $sql_cliente->bindParam(":celular", $celular , PDO::PARAM_STR);

 $sql_cliente->execute();

}
    catch(PDOException $e){
      echo $e->getMessage();
   }

$sql_email = $conexao->prepare("SELECT id_clienteweb
		FROM clienteweb
		WHERE email=:email");
//execulta a query do email;
try
{
    $sql_email->bindParam(":email", $email , PDO::PARAM_STR);
    $sql_email->execute();
}
catch(PDOException $e)
{
    echo $e->getMessage();
}

//verifica se a query incluiu o item, e captura o id_clienteweb que retorna.
	while($id = $sql_email->fetch(PDO::FETCH_OBJ))
	{ 
        $id_clienteweb = $id->id_clienteweb;
    }        



function geraCodigo ($qtde, $padrao = '0123456789ABCDEF') {
	$dig1 = 0;
	$dig2 = 0;
	$codigo = '';
	$tamanho = strlen($padrao)-1; 
    for ($i = 0; $i < $qtde;++$i){
    	$item = $padrao[mt_rand(0, $tamanho)];
    	$dig1 += hexdec($item)*(($qtde-$i)+1); 
    	$dig2 += hexdec($item)*($i+2);
    	$codigo .= $item;
    }
    $dig1 = dechex($dig1%16);
    $dig2 = dechex($dig2%16);

    return $codigo.strtoupper($dig1).strtoupper($dig2);
	
}

do {

$codigo_promocao = geraCodigo(6);
$igual= $conexao->prepare("SELECT codigo_promocao 
				FROM relacao
				WHERE codigo_promocao = '$codigo_promocao'");
$igual->execute();

} while ($igual->rowCount() >  0);


 //prepara query de inclusão para a relação do clienteweb com a empresaweb.
 $sql_relacao = $conexao->prepare("INSERT INTO relacao
 VALUES (default, $id_empresaweb, $id_clienteweb,'$codigo_promocao', default, default, null)");

//executa a query de inclusão da relação;

try{
$sql_relacao->execute();
}
catch(PDOException $e)
{
    echo $e->getMessage();
}


//verifica que a query incluiu o registro, e envia um e-mail ao cliente com o código promocional gerado.
if ($sql_relacao->rowCount() > 0 )
{		
		//consulta aos dados da empresa para enviar por e-mail.
		$sql_email_empresa = $conexao->prepare("SELECT nome_empresa, email_empresa FROM empresaweb WHERE id_empresaweb = $id_empresaweb");
		$sql_email_empresa->execute();
		
		if ($sql_email_empresa->rowCount() > 0)
		{
	
			while ($valor = $sql_email_empresa->fetch(PDO::FETCH_OBJ)) 
			{
				
				$email_empresa = $valor->email_empresa;
				$nome_empresa = $valor->nome_empresa;
				
			}
		}
		
		//preparação do email.,
		$assunto = "Código Promocional - ".$nome_empresa;
		
		$msg="<span style='margin:20px 0 20px 0;'> O Seu Código Promocional é:<br/><strong>".$$codigo_promocao." </strong> </span>";

		$headers = "MIME-Version: 1.1 \r\n";
		$headers.= "Content-Type: text/html; charset=UTF-8 \r\n";
		$headers.="From: ".$email_empresa."\r\n";
		$headers .="Return-Path: ".$email_empresa."\r\n";

		//Envio do e-mail.
		
			//mail($email, $assunto, $msg, $headers, $email_empresa);
			//echo $email.$assunto.$msg.$headers.$email_empresa;
			echo "<span class='bg-success' style='color: green; padding: 10px 4px 10px 4px; border-radius: 5px; display:block; margin-top: 5px;'>Abra seu e-mail e veja seu Código Promocional!</span>";
		
	
	
}
else
{
	echo "<span class='bg-danger' style='color: red; padding: 10px 4px 10px 4px; border-radius: 5px; display:block; margin-top: 5px;'> Não foi possível gerar o código. Entre em contato com a empresa diretamente.</span>";
}




?>
