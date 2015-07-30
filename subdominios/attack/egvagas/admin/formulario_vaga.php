<?php 
$subtitulo = "Cadastro de Vagas";
require $_SERVER["DOCUMENT_ROOT"]."/egvagas/action/protecao_login.php";
require $_SERVER["DOCUMENT_ROOT"]."/egvagas/includes/constantes.php"; 
require $_SERVER["DOCUMENT_ROOT"]."/egvagas/includes/header.php"; ?>

<!-- CONTEÚDO -->
    
<script src="<?php echo BASE.'/js/maskMoney.min.js';?>" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function(){
$("#salario").maskMoney();
});

function ConsultaFantasia(str) {
    
    if (str == "" || str.length < 3) {
        return;
    } else {
        document.getElementById("res_consulta").innerHTML = "<img src='<?php echo APP.'/egvagas/img/load.gif';?>'>";
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("res_consulta").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("POST","<?php echo APP.'/egvagas/action/consulta_rapida.php';?>",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("fantasia="+str);
    }
}

function ConsultaCnpj(str) {
  
    if (str == "" || str.length < 4) {
        return;
    } else {
      document.getElementById("res_consulta").innerHTML = "<img src='<?php echo APP.'/egvagas/img/load.gif';?>'>";
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("res_consulta").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("POST","<?php echo APP.'/egvagas/action/consulta_rapida.php';?>",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("cnpj="+str);
    }
}
function Incluir(id){
  document.getElementById("id_empresa").value=id;
  document.getElementById("id_emp").value=id;
}


</script>

<div style="margin:80px;"></div>
  <span>Pesquise a Empresa que será vinculada à vaga. </span><br>
        <label for="nome_i" class="legenda-form">Nome: </label>  <input class="entradas" name="nome_i" type="text" id="nome_i" size="20" maxlength="100" onkeyup="ConsultaFantasia(this.value)"/>
          <span>&nbsp;</span>
          <label for="cpf_i" class="legenda-form">CNPJ: </label>  <input class="entradas" name="cnpj_i" type="text" id="cnpj_i" size="18" maxlength="100" onkeyup="ConsultaCnpj(this.value)"/>




         <div id="res_consulta">&nbsp;</div>
    <form style="margin-top:10px;" method="post" action="<?php echo APP.'/egvagas/action/incluir_vaga.php';?>">
          <fieldset ><legend > Informações Básicas</legend> 

         
  
          <label>Código da empresa</label>
          <input type="hidden" id="id_empresa" name="id_empresa" > <input type="text" id="id_emp" name="id_emp" disabled required>
          <div class="row"> 
            <div class="form-group col-xs-5">
              <div class="input-group altergroup">
                <span class="input-group-addon">Cargo</span>
                <input class="form-control" type="text" id="cargo" name="cargo" maxlength="50" placeholder="Função" required>
              </div> 
            </div>
            <div class="form-group col-xs-3">
              <div class="input-group altergroup">
                <span class="input-group-addon">Quantidade Vagas</span>
                <input class="form-control" type="text" id="qtde_ofertada" name="qtde_ofertada" maxlength="4" placeholder="" required>
              </div> 
            </div>
            <div class="form-group col-xs-3">
              <div class="input-group altergroup">
                <span class="input-group-addon">Vagas PNE</span>
                <input class="form-control" type="text" id="qtde_pne" name="qtde_pne" maxlength="4" placeholder="" required>
              </div> 
            </div>
          </div>

          <div class="row">
            <div class="form-group col-xs-4">
              <div class="input-group altergroup">
                <span class="input-group-addon">Formação Exigida</span>
                <input class="form-control" type="text" id="formacao_exg" name="formacao_exg" maxlength="100" placeholder="Formação" required>
              </div>
            </div>
            <div class="form-group col-xs-4">
              <div class="input-group altergroup">
                <span class="input-group-addon">Escolaridade</span>
                 <select class="form-control" id="escolaridade_exg" name="escolaridade_exg" required>
                  <option value="Qualquer" selected >Qualquer</option>
                  <option value="Fundamental">Fundamental</option>
                  <option value="Médio">Médio</option>
                  <option value="Técnico">Técnico</option>
                  <option value="Superior">Superior</option>
                  <option value="Especialista">Especialista</option>
                  <option value="Mestrado">Mestrado</option>
                  <option value="Doutorado">Doutorado</option>
                </select> 
              </div>
            </div>
            <div class="form-group col-xs-2">
              <div class="input-group altergroup">
                <span class="input-group-addon">Carga Horária Semanal</span>
                <input class="form-control" type="text" id="carga_semanal" name="carga_semanal" maxlength="20" placeholder="xx Horas" required> 
              </div>
            </div>    
          </div>
          <div class="row">
            <div class="form-group col-xs-8">
              <div class="input-group altergroup">
                <span class="input-group-addon">Paríodo do trabalho</span>
                <div class="row">
                  <div class="col-xs-4">
                <input type="checkbox" id="trab_matutino" name="trab_matutino" value="1" checked> Matutino
              </div>
              <div class="col-xs-4">
                <input type="checkbox" id="trab_vespertino" name="trab_vespertino" value="1" checked> Vespertino
                </div>
              <div class="col-xs-4">
                <input type="checkbox" id="trab_noturno" name="trab_noturno" value="1"> Noturno
              </div>
              </div>
              </div>
            </div>
           
            <div class="form-group col-xs-2">
              <div class="input-group altergroup">
                <span class="input-group-addon">Experiência Mínima</span>
                <input class="form-control" type="text" id="tempo_exp_exg" name="tempo_exp_exg" maxlength="20" placeholder="xx Meses" required> 
              </div>
            </div>

          </div>

          
            <div class="form-group col-xs-12">
              <div class="input-group altergroup">
                <span class="input-group-addon">Habilidades Básicas</span>
                <textarea class="form-control" id="habilidades_basicas" name="habilidades_basicas" required></textarea>
              </div>
            </div> 
            <div class="form-group col-xs-12">
              <div class="input-group altergroup">
                <span class="input-group-addon">Descrição das Atividades</span>
                <textarea class="form-control" id="descricao_atividades" name="descricao_atividades" required></textarea>
              </div>
            </div> 
  


          </fieldset>
          <fieldset><legend>Informações Complementares</legend>
                      
          <div class="row">  
            <div class="form-group col-xs-3">
              <div class="input-group altergroup">
                <span class="input-group-addon">Local de Trabalho</span>
                <input class="form-control" type="text" id="local_trabalho" name="local_trabalho" maxlength="25" >
              </div>
            </div> 
            <div class="form-group col-xs-3"> 
              <div class="input-group altergroup">
                <span class="input-group-addon">Gênero de Preferência</span>
                 <select class="form-control" id="genero_preferencia" name="genero_preferencia" >
                  <option value="Ambos" selected >Ambos</option>
                  <option value="Feminino">Feminino</option>
                  <option value="Masculino">Masculino</option>
                </select> 
              </div>
            </div>
            <div class="form-group col-xs-2"> 
              <div class="input-group altergroup">
                <span class="input-group-addon">Comissão</span>
                <select class="form-control" id="comissao" name="comissao" >
                  <option value="Sim">Sim</option>
                  <option value="Não" selected>Não</option>
                </select> 
              </div>
            </div> 
            <div class="form-group col-xs-2"> 
              <div class="input-group altergroup">
                <span class="input-group-addon">Viagem</span>
                <select class="form-control" id="viagem_frequente" name="viagem_frequente" >
                  <option value="Sim">Sim</option>
                  <option value="Não" selected>Não</option>
                </select> 
              </div>
            </div> 
            <div class="form-group col-xs-3"> 
              <div class="input-group altergroup">
                <span class="input-group-addon">Salário Inicial</span>
                <input class="form-control" type="text" id="salario" name="salario" maxlength="10" data-thousands="" data-decimal=".">
              </div>
            </div> 
          </div>

          <div class="row">
            <div class="form-group col-xs-4"> 
              <div class="input-group altergroup">
                <span class="input-group-addon">Periodicidade do Pagamento</span>
                <select class="form-control" id="periodicidade_pagamento" name="periodicidade_pagamento" >
                  <option value="Mensal" selected >Mensal</option>
                  <option value="Quinzenal">Quinzenal</option>
                  <option value="Semanal">Semanal</option>
                  <option value="Diário">Diário</option>
                </select> 
              </div>
            </div>
            <div class="form-group col-xs-4"> 
              <div class="input-group altergroup">
                <span class="input-group-addon">Duração do Emprego</span>
                <input class="form-control" type="text" id="duracao_emprego" name="duracao_emprego"  maxlength="20">
              </div>
            </div>
          </div>

            <div class="form-group col-xs-12"> 
              <div class="input-group altergroup">
                <span class="input-group-addon">Habilidades Desejáveis</span>
                <textarea class="form-control" id="habilidades_desejaveis" name="habilidades_desejaveis" ></textarea>
              </div>
            </div>
          
            <div class="form-group col-xs-12">
              <div class="input-group altergroup">
                <span class="input-group-addon">Descrição PNE</span>
                <input class="form-control" type="text" id="descricao_pne" name="descricao_pne" maxlength="100" placeholder="">
              </div>
            </div>

        

          </fieldset>
           

          <input class="btn btn-success btn-lg" type="submit" value="CADASTRAR!">
          <a class="btn btn-default" href="<?php echo APP.'/egvagas/admin';?>">VOLTAR</a>
          
        </form>
<?php require $_SERVER["DOCUMENT_ROOT"]."/egvagas/includes/footer.php"; ?> ?>