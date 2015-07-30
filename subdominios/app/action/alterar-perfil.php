<?php
include $_SERVER["DOCUMENT_ROOT"]."/padrao/conexao_login.php";

$id_mestre = $_POST["id_mestre"];
// $login_mestre = $_POST["login_mestre"];
$nome_mestre = $_POST["nome_mestre"];
$email_mestre = $_POST["email_mestre"];
$senha_mestre = md5(sha1($_POST["senha_mestre"]));
$n_senha_mestre = $_POST["n_senha_mestre"];
$conf_senha = $_POST["conf_senha"];



if ($n_senha_mestre !== $conf_senha) {
    echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
      <h4>A 'Nova Senha' não confere com a 'Confirmação da Senha'.</h4>
      <p>Informe a mesma senha nas duas caixas de texto.</p>
      <p>
        <button type='button' class='btn btn-danger'  data-dismiss='alert' aria-label='Close'>OK</button>
      </p>
    </div>";
    die();
}

$sql = $conexao->prepare("SELECT id_mestre
    FROM mestre
    WHERE id_mestre = $id_mestre
    AND senha_mestre = '$senha_mestre'");

$sql->execute();

if ($sql->rowCount() <> 1) {
      echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
      <h4>Não foi possível autenticar.</h4>
      <p>Verifique a 'Senha Atual'...</p>
      <p>
        <button type='button' class='btn btn-danger'  data-dismiss='alert' aria-label='Close'>OK</button>
      </p>
      </div>";
      die();
}

if ($n_senha_mestre == "") {
  $sql = $conexao->prepare("UPDATE mestre
    SET nome_mestre=:nome_mestre,
    email_mestre = :email_mestre
    WHERE id_mestre=$id_mestre");
  try
  {
    $sql->bindValue(":nome_mestre", $nome_mestre);
    $sql->bindValue(":email_mestre", $email_mestre);
  }
  catch(PDOException $e)
  {
    echo $e->getMessage();
    $arr = $sql->errorInfo();
    print_r($arr);
  }

}
else
{
  $n_senha_mestre=md5(sha1($n_senha_mestre));
  $sql = $conexao->prepare("UPDATE mestre
    SET nome_mestre=:nome_mestre,
    email_mestre = :email_mestre,
    senha_mestre = :n_senha_mestre
    WHERE id_mestre=$id_mestre");
  try
  {
    $sql->bindValue(":nome_mestre", $nome_mestre);
    $sql->bindValue(":email_mestre", $email_mestre);
    $sql->bindValue(":n_senha_mestre", $n_senha_mestre);
  }
  catch(PDOException $e)
  {
    echo $e->getMessage();
    $arr = $sql->errorInfo();
    print_r($arr);
  }
}


//Verifico se o registro foi inserido com sucesso
if ($sql->execute()) {
	echo "<div class='alert alert-success alert-dismissible fade in' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
      <h4>Atualização bem sucedida!</h4>
      <p>Os dados do seu perfil foram atualizados com sucesso.</p>
      <p>
        <button type='button' class='btn btn-success'  data-dismiss='alert' aria-label='Close'>OK</button>
      </p>
    </div>";
}
else {
	echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
      <h4>Ops! Alguma coisa deu errado...</h4>
      <p>Não foi possivel atualizar seu perfil. Entre em contato com o Administrador. <br>".print_r($sql->errorInfo())."</p>
      <p>
        <button type='button' class='btn btn-danger'  data-dismiss='alert' aria-label='Close'>OK</button>
      </p>
    </div>";	
}

?>