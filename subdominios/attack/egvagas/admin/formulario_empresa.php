<?php 
$subtitulo = "Cadastro de Empresas";
require $_SERVER["DOCUMENT_ROOT"]."/egvagas/action/protecao_login.php";
require $_SERVER["DOCUMENT_ROOT"]."/egvagas/includes/constantes.php"; 
require $_SERVER["DOCUMENT_ROOT"]."/egvagas/includes/header.php"; ?>
    <div class="container" style="margin-top:80px;">

      <form action="<?php echo APP.'/egvagas/action/incluir_empresa.php';?>" method="post" >
           <fieldset><legend >Informações de Login</legend> 
          <div class="row">
            <div class="form-group col-xs-8"> 
              <div class="input-group altergroup">
                <span class="input-group-addon">E-mail</span>
                <input class="form-control" type="text" id="emp_email" name="emp_email"  maxlength="50" placeholder="e-mail" required>
              </div>
            </div>
          </div>
         <!--  <div class="row">
            <div class="form-group col-xs-6"> 
              <div class="input-group altergroup">
                <span class="input-group-addon">Senha</span>
                <input class="form-control" type="password" id="emp_senha" name="emp_senha"  maxlength="20" placeholder="senha" required>
              </div>
            </div>
          </div>
            <div class="row">
            <div class="form-group col-xs-6"> 
              <div class="input-group altergroup">
                <span class="input-group-addon">Repetir senha</span>
                <input class="form-control" type="password" id="esc_senhaconf" name="esc_senhaconf"  maxlength="20" placeholder="repetir senha" required>
              </div>
            </div> -->

          </div>
          </fieldset>
          <fieldset ><legend>Dados Básicos</legend> 

            <div class="form-group col-xs-12 col-sm-10">
              <div class="input-group altergroup">
                <span class="input-group-addon">Razão</span>
                <input class="form-control" type="text" id="razao_social" name="razao_social" maxlength="100" placeholder="Razão Social" required >
              </div> 
            </div>

            <div class="form-group col-xs-8 col-sm-5">
              <div class="input-group altergroup">
                <span class="input-group-addon">Nome Fantasia</span>
                <input class="form-control" type="text" id="fantasia" name="fantasia" maxlength="50" placeholder="Fantasia" required>
              </div>
            </div>
            <div class="form-group col-xs-8 col-sm-5">
              <div class="input-group altergroup">
                <span class="input-group-addon">CNPJ</span>
                <input class="form-control" type="text" id="cnpj" name="cnpj" maxlength="18" placeholder="CNPJ" required>
              </div>
            </div>
            
          </fieldset>
          <fieldset><legend>Contato e Endereço</legend>
            <div class="form-group col-xs-5"> 
              <div class="input-group altergroup">
                <span class="input-group-addon">Telefone 1</span>
                <input class="form-control" type="text" id="emp_telefone_a" name="emp_telefone_a"  maxlength="14" placeholder="(xx)xxxxx-xxxx" required>
              </div>
            </div>
            <div class="form-group col-xs-5"> 
              <div class="input-group altergroup">
                <span class="input-group-addon">Telefone 2</span>
                <input class="form-control" type="text" id="emp_telefone_b" name="emp_telefone_b"  maxlength="14" placeholder="(xx)xxxxx-xxxx">
              </div>
            </div>
            <div class="form-group col-xs-8">
              <div class="input-group altergroup">
                <span class="input-group-addon">Site Oficial</span>
                <input class="form-control" type="date" id="emp_site" name="emp_site" maxlength="100" >
              </div>
            </div>
            <div class="form-group col-xs-8 col-sm-8">
              <div class="input-group altergroup">
                <span class="input-group-addon">Logradouro</span>
                <input class="form-control" type="text" id="emp_logradouro" name="emp_logradouro" maxlength="100" >
              </div>
            </div>           
            <div class="form-group col-xs-6 col-sm-3">
              <div class="input-group altergroup">
                <span class="input-group-addon">Nº</span>
                <input class="form-control" type="text" id="emp_num" name="emp_num" maxlength="6">
              </div>
            </div> 
            <div class="form-group col-xs-6 col-sm-4">
              <div class="input-group altergroup">
                <span class="input-group-addon">Complemento</span>
                <input class="form-control" type="text" id="emp_comp" name="emp_comp" maxlength="80" >
              </div>
            </div> 
            <div class="form-group col-xs-8 col-sm-4"> 
              <div class="input-group altergroup">
                <span class="input-group-addon">Bairro</span>
                <input class="form-control" type="text" id="emp_bairro" name="emp_bairro" maxlength="40" >
              </div>
            </div>
            <div class="form-group col-xs-5 "> 
              <div class="input-group altergroup">
                <span class="input-group-addon">Cidade</span>
                <input class="form-control" type="text" id="emp_cidade" name="emp_cidade" maxlength="100" placeholder="Cidade">
              </div>
            </div>             
            <div class="form-group col-xs-3"> 
              <div class="input-group altergroup">
                <span class="input-group-addon">UF</span>
                <select class="form-control" id="emp_uf" name="emp_uf" >
                  <option value="PA" selected >PA</option>
                  <option value="AC">AC</option>
                  <option value="AM">AM</option>
                  <option value="AP">AP</option>
                  <option value="TO">TO</option>
                  <option value="RO">RO</option>
                  <option value="RR">RR</option>
                </select>
              </div>
            </div> 
            <div class="form-group col-xs-3"> 
              <div class="input-group altergroup">
                <span class="input-group-addon">CEP</span>
                <input class="form-control" type="text" id="emp_cep" name="emp_cep" maxlength="10">
              </div>
            </div>             
          </fieldset>
          <fieldset><legend>Adicionais</legend>
            <div class="form-group col-xs-12"> 
              <div class="input-group altergroup">
                <span class="input-group-addon">Observação</span>
                <textarea class="form-control" id="observacao" name="observacao"></textarea>
              </div>
            </div>
            <div class="form-group col-xs-3">
              <div class="input-group altergroup">
                <span class="input-group-addon">Funcionários</span>
                <input class="form-control" type="text" id="qtde_funcionarios" name="qtde_funcionarios" maxlength="5">
              </div>
            </div>
            <div class="form-group col-xs-3">
              <div class="input-group altergroup">
                <span class="input-group-addon">Número de Filiais</span>
                <input class="form-control" type="text" id="num_filiais" name="num_filiais" maxlength="5">
              </div>
            </div>
            <div class="form-group col-xs-5">
              <div class="input-group altergroup">
                <span class="input-group-addon">Responsável</span>
                <input class="form-control" type="text" id="responsavel" name="responsavel" maxlength="120">
              </div>
            </div>
            <div class="form-group col-xs-12">
              <div class="input-group altergroup">
                <span class="input-group-addon">Setor Predominante</span>
                <input class="form-control" type="text" id="setor_predominante" name="setor_predominante" maxlength="120">
              </div>
            </div>

            <div class="form-group col-xs-3">
              <div class="input-group altergroup">
                <span class="input-group-addon">Latitude</span>
                <input class="form-control" type="text" id="latitude" name="latitude" maxlength="20">
              </div>
            </div>
            <div class="form-group col-xs-3">
              <div class="input-group altergroup">
                <span class="input-group-addon">Longitude</span>
                <input class="form-control" type="text" id="longitude" name="longitude" maxlength="20">
              </div>
            </div>
          </fieldset>
          
          <input class="btn btn-success btn-lg" type="submit" value="CADASTRAR!">
          <a class="btn btn-default" href="<?php echo APP.'/egvagas/admin';?>">Voltar</a>
        </form>
      </div>

<?php require $_SERVER["DOCUMENT_ROOT"]."/egvagas/includes/footer.php"; ?>