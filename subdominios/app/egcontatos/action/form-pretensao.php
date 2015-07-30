<form id="formulario">
<?php echo "<input type='hidden' name='id_contato' id='id_contato' value='$_POST[id_contato]' >" ?>
	<div class="row">
		<div class="col-xs-8">
			<div class="input-group">
			  <label class="input-group-addon" for="consultor_responsavel" id="label_consultor"><span>Consultor</span></label>
			  <select id="consultor_responsavel" name="consultor_responsavel" class="form-control" required aria-describedby="label_consultor">
				<option value="Alan Cliff">Alan Cliff</option>
				<option value="Cristiano Ghizoni">Cristiano Ghizoni</option>
				<option value="Glauco Fernandes">Glauco Fernandes</option>
				<option value="Wanderson Sousa">Wanderson Sousa</option>
			  </select>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-6">
			<div class="input-group">
			  <label class="input-group-addon" for="valor_estimado" id="label_valor_estimado"><span>Val. Estimado</span></label>
			  <input type="text" id="valor_estimado" name="valor_estimado" class="form-control maskmoney" placeholder="0.00" required aria-describedby="label_valor_estimado">
			</div>
		</div>
		<div class="col-xs-4">
			<div class="input-group">
			  <label class="input-group-addon" for="prioridade" id="label_prioridade"><span>Prioridade</span></label>
			  <select id="prioridade" name="prioridade" class="form-control" required aria-describedby="label_prioridade">
				<option value="A">A</option>
				<option value="B">B</option>
				<option value="C">C</option>
			  </select>
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-xs-12">
			<div class="input-group">
			  <label class="input-group-addon" for="seguimento" id="label_seguimento"><span>Seguimento</span></label>
			  <input type="text" id="seguimento" name="seguimento" class="form-control" placeholder="Seguimento" aria-describedby="label_seguimento" required onkeyup="maiuscula(this)">
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-xs-12">
			<div class="input-group">
			  <label class="input-group-addon" for="pretensao" id="label_pretensao"><span>Pretensão</span></label>
			  <textarea id="pretensao" name="pretensao" class="form-control" placeholder="Pretensão" aria-describedby="label_pretensao" onkeyup="maiuscula(this)" required></textarea> 
			</div>
		</div>
	</div>
	<br>
	<span class="btn btn-success btn-lg" onclick="salvarProspeccao('formulario')">SALVAR</span>
</form>