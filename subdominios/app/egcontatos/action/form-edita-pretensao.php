<form id="formulario">
<?php 
include $_SERVER["DOCUMENT_ROOT"]."/padrao/conexao_egcontatos.php";

$sql = "SELECT * 
		FROM prospeccao
		WHERE id_contato = $_POST[id_contato]";

$sql = $conexao->prepare($sql);
$sql->execute();

if ($sql->rowCount() > 0)
	{	
			while ($pretensao = $sql->fetch(PDO::FETCH_ASSOC) )
			{
				echo "<input type='hidden' name='id_prospeccao' id='id_prospeccao' value='$pretensao[id_prospeccao]' >" ;





?>
	<div class="row">
		<div class="col-xs-8">
			<div class="input-group">
			  <label class="input-group-addon" for="consultor_responsavel" id="label_consultor"><span>Consultor</span></label>
			  <select id="consultor_responsavel" name="consultor_responsavel" class="form-control" required aria-describedby="label_consultor">
			  	<?php 
		            $cons['Alan Cliff'] = "Alan Cliff";
					$cons['Cristiano Ghizoni'] = "Cristiano Ghizoni";
					$cons['Glauco Fernandes'] = "Glauco Fernandes";
					$cons['Wanderson Sousa'] = "Wanderson Sousa";
		            foreach($cons as $key => $val) {
						    if ($pretensao[consultor_responsavel] == $key) {
						    	echo "<option value='$key' selected>$val</option>";
						    }
						    else
						    {
						    	echo "<option value='$key'>$val</option>";
						    }

					}

			 ?>
			  </select>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-6">
			<div class="input-group">
			  <label class="input-group-addon" for="valor_estimado" id="label_valor_estimado"><span>Val. Estimado</span></label>
			  <input type="text" id="valor_estimado" name="valor_estimado" class="form-control maskmoney" value="<?php echo $pretensao[valor_estimado]; ?>"placeholder="0.00" required aria-describedby="label_valor_estimado">
			</div>
		</div>
		<div class="col-xs-4">
			<div class="input-group">
			  <label class="input-group-addon" for="prioridade" id="label_prioridade"><span>Prioridade</span></label>
			  <select id="prioridade" name="prioridade" class="form-control" required aria-describedby="label_prioridade">
			  	<?php 
		            $prior['A'] = "A";
					$prior['B'] = "B";
					$prior['C'] = "C";
		            foreach($prior as $key => $val) {
						    if ($pretensao[prioridade] == $key) {
						    	echo "<option value='$key' selected>$val</option>";
						    }
						    else
						    {
						    	echo "<option value='$key'>$val</option>";
						    }

					}

			 ?>
			  </select>
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-xs-12">
			<div class="input-group">
			  <label class="input-group-addon" for="seguimento" id="label_seguimento"><span>Seguimento</span></label>
			  <input type="text" id="seguimento" name="seguimento" value="<?php echo $pretensao[seguimento]; ?>" class="form-control" placeholder="Seguimento" aria-describedby="label_seguimento" required onkeyup="maiuscula(this)">
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-xs-12">
			<div class="input-group">
			  <label class="input-group-addon" for="pretensao" id="label_pretensao"><span>Pretensão</span></label>
			  <textarea id="pretensao" name="pretensao" class="form-control" placeholder="Pretensão" aria-describedby="label_pretensao" onkeyup="maiuscula(this)" required><?php echo $pretensao[pretensao]; ?></textarea> 
			</div>
		</div>
	</div>
	<br>
	<span class="btn btn-success btn-lg" onclick="atualizaProspeccao('formulario')">SALVAR</span>
	<span class="btn btn-danger btn-xs pull-right" onclick="excluirProspeccao(<?php echo $pretensao[id_prospeccao]; ?>)">excluir pretensão</span>
</form>

<?php } }  ?>