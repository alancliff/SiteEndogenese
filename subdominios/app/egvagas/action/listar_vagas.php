<?php
//inclui arquivo de conexão
include $_SERVER["DOCUMENT_ROOT"]."/padrao/conexao_egvagas.php";

$id_empresa = $_POST['id_empresa'];

//prepara a query;

$sql = "SELECT * FROM vagas WHERE id_empresa='$id_empresa'";
$sql = $conexao->prepare($sql);
$sql->execute();

$sql_f = "SELECT fantasia FROM empresas WHERE id_empresa='$id_empresa'";
$sql_f = $conexao->prepare($sql_f);
$sql_f->execute();


// //se retornou, captura os dados retornados
if($sql->rowCount() > 0){
		while ($empresa_item = $sql_f->fetch(PDO::FETCH_ASSOC) )
			{
				echo "<span class='btn btn-default disabled'>Vagas da Empresa: $empresa_item[fantasia]</span>";
			}
	
	echo "<div class='row titulo_rel'>
						<div class='col-xs-3'>Cargo</div>
						<div class='col-xs-2'>Quantidade</div>
						<div class='col-xs-2'>Visualizações</div>
						<div class='col-xs-4'>Ações</div>
			</div>";
	$class_item = "bg-warning";
	while ($vaga_item = $sql->fetch(PDO::FETCH_ASSOC) )
			{
				echo "<div class='row dados_rel $class_item'>
						<div class='col-xs-3'>$vaga_item[cargo]</div>
						<div class='col-xs-2'>$vaga_item[qtde_ofertada]</div>
						<div class='col-xs-2'>$vaga_item[qtde_visualiza]</div>
						<div class='col-xs-4'>
							<span type='submit' class='btn btn-warning' onclick='enviarForm(\"/egvagas/admin/formulario_vaga.php\",{id_vaga:$vaga_item[id_vaga], id_empresa:$vaga_item[id_empresa]})'>EDITAR</span>
							<span class='btn btn-danger btn-xs disabled' onclick='excluirVaga($vaga_item[id_vaga])'>excluir</span>
						</div>
					</div>";
				if ($class_item == "bg-info") {
					$class_item = "bg-warning";
				}
				else{
					$class_item = "bg-info";
				}
			}
	echo "</div>";
						
					
}
else
{
		echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
      <h4>Nenhuma vaga foi encontrada.</h4>
      <p>Inclua uma vaga para esta empresa! <span class='btn btn-primary' onclick='incluirVaga($id_empresa)'>Incluir Vaga</span></p>
      <p>
        <button type='button' class='btn btn-danger'  data-dismiss='alert' aria-label='Close'>OK</button>
      </p>
    </div>";	
}
?>