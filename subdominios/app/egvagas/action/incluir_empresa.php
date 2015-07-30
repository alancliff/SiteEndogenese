<?php

include $_SERVER["DOCUMENT_ROOT"]."/padrao/conexao_egvagas.php";


$sql = $conexao->prepare("SELECT emp_email, cnpj
                    FROM empresas 
                    WHERE emp_email = :emp_email
                    OR cnpj = :cnpj"); 
try
{
  $sql->bindValue(":emp_email", $_POST['emp_email']);
  $sql->bindValue(":cnpj", $_POST['cnpj']);
  $sql->execute();
}
catch(PDOException $e)
{
   echo $e->getMessage();
   print_r($sql->errorInfo());
}

if ($sql->rowCount() > 0) {
   while($valor = $sql->fetch(PDO::FETCH_OBJ))
   { 
      $my_emp_email = $valor->emp_email;
      $my_cnpj = $valor->cnpj;
   }
   if ($my_emp_email == $_POST['emp_email']) 
   {
        echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
      <h4>E-mail já cadastrado no sistema.</h4>
      <p>O e-mail informado já consta na base de dados do sistema.</p>
      <p>
        <button type='button' class='btn btn-danger'  data-dismiss='alert' aria-label='Close'>OK</button>
      </p>
    </div>";  

      die();
   }
   if ($my_cnpj == $_POST['cnpj'])
   {

        echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
      <h4>CNPJ já cadastrado no sistema</h4>
      <p>O CNPJ informado já consta na base de dados do sistema.</p>
      <p>
        <button type='button' class='btn btn-danger'  data-dismiss='alert' aria-label='Close'>OK</button>
      </p>
    </div>";  

      die();
   }


}
                           
       


$colunas = "";
$valores = "";
foreach ($_POST as $key => $value) {
		  	if ($value !== '' && substr($key, 0,4) != 'esc_')
		  	{
		  		$colunas .= "$key,"; 
          $valores .= ":$key,";
		  	}
		}
      $colunas = substr($colunas, 0, -1);
      $valores = substr($valores, 0, -1);
$sql = ("INSERT INTO empresas (".$colunas.") VALUES (".$valores.")");
$sql = $conexao->prepare($sql);


foreach ($_POST as $key => $value) 
   {
         if ($value !== '' && substr($key, 0,4) != 'esc_')
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

//Verifico se o registro foi inserido com sucesso
if ($sql->execute()) {
  echo "<div class='alert alert-success alert-dismissible fade in' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
      <h4>Inclusão bem sucedida!</h4>
      <p>Inclusão da EMPRESA realizada com sucesso!. Fique à vontade para fazer uma nova inclusão.</p>
      <p>
        <button type='button' class='btn btn-success'  data-dismiss='alert' aria-label='Close'>OK</button>
      </p>
    </div>";
}
else {
  echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
      <h4>Ops! Alguma coisa deu errado...</h4>
      <p>Não foi possivel inserir o contato. Entre em contato com o Administrador. <br>".print_r($sql->errorInfo())."</p>
      <p>
        <button type='button' class='btn btn-danger'  data-dismiss='alert' aria-label='Close'>OK</button>
      </p>
    </div>";  
}


?>
