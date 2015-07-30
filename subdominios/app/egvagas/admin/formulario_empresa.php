<?php 
$modulo = "egvagas";
$subtitulo = "EG Vagas :: Cadastro de Empresas";
require $_SERVER["DOCUMENT_ROOT"]."/protecao/protecao_login.php";
require $_SERVER["DOCUMENT_ROOT"]."/padrao/constantes.php"; 
include $_SERVER["DOCUMENT_ROOT"]."/padrao/conexao_egvagas.php";
include $_SERVER["DOCUMENT_ROOT"]."/padrao/header.php";
include $_SERVER["DOCUMENT_ROOT"]."/padrao/menu.php";



?>
    <div class="container" style="margin-top:60px;">
  <img class="titulo_img" src="/egvagas/img/egvagas.png">
  <h1 class="titulo_tela bg-info">Formulário de Empresa</h1>
      <form id="empresa" >
        <?php 

        if (isset($_POST["id_empresa"])) {
            echo "<input type='hidden' name='id_empresa' id='id_empresa' value='$_POST[id_empresa]'> ";

            $sql = "SELECT * FROM empresas WHERE id_empresa = $_POST[id_empresa]";
            $sql = $conexao->prepare($sql);
            $sql->execute();

            if ($sql->rowCount() > 0) {
              while ($dados = $sql->fetch(PDO::FETCH_ASSOC) ) {
                $emp_email = $dados['emp_email'];
                $razao_social = $dados['razao_social'];
                $fantasia = $dados['fantasia'];
                $cnpj = $dados['cnpj'];
                $emp_telefone_a = $dados['emp_telefone_a'];
                $emp_telefone_b = $dados['emp_telefone_b'];
                $emp_site = $dados['emp_site'];
                $emp_logradouro = $dados['emp_logradouro'];
                $emp_num = $dados['emp_num'];
                $emp_comp = $dados['emp_comp'];
                $emp_bairro = $dados['emp_bairro'];
                $emp_cidade = $dados['emp_cidade'];
                $emp_uf = $dados['emp_uf'];
                $emp_cep = $dados['emp_cep'];
                $observacao = $dados['observacao'];
                $qtde_funcionarios = $dados['qtde_funcionarios'];
                $num_filiais = $dados['num_filiais'];
                $responsavel = $dados['responsavel'];
                $setor_predominante = $dados['setor_predominante'];
                $latitude = $dados['latitude'];
                $longitude = $dados['longitude'];
                $ativa = $dados['ativa'];
              }
            }

        }

        


        ?>
           <fieldset><legend>Informações de Login</legend> 
          <div class="row">
            <div class="form-group col-xs-8"> 
              <div class="input-group">
                <span class="input-group-addon">E-mail</span>
                <input class="form-control" type="text" id="emp_email" name="emp_email"  maxlength="50" placeholder="e-mail" required value="<?php echo $emp_email; ?>">
              </div>
            </div>
            <?php
             if (isset($_POST["id_empresa"])) {
              echo"<div class='form-group col-xs-2'> 
                <div class='input-group'>
                <span class='input-group-addon'>STATUS</span>
                <select class='form-control' id='ativa' name='ativa' >";
                 
                  $estado['1'] = "ATIVADA";
                  $estado['0'] = "DESATIVADA";
                   foreach($estado as $key => $val) {
                        if ($ativa == $key) {
                          echo "<option value='$key' selected>$val</option>";
                        }
                        else
                        {
                          echo "<option value='$key'>$val</option>";
                        }
                    }
                  echo "
                </select>
              </div></div>";
            }
            ?>
          </div>
         <!--  <div class="row">
            <div class="form-group col-xs-6"> 
              <div class="input-group">
                <span class="input-group-addon">Senha</span>
                <input class="form-control" type="password" id="emp_senha" name="emp_senha"  maxlength="20" placeholder="senha" required>
              </div>
            </div>
          </div>
            <div class="row">
            <div class="form-group col-xs-6"> 
              <div class="input-group">
                <span class="input-group-addon">Repetir senha</span>
                <input class="form-control" type="password" id="esc_senhaconf" name="esc_senhaconf"  maxlength="20" placeholder="repetir senha" required>
              </div>
            </div>  </div>-->

         
          </fieldset>
          <fieldset ><legend>Dados Básicos</legend> 

            <div class="form-group col-xs-12 col-sm-10">
              <div class="input-group">
                <span class="input-group-addon">Razão</span>
                <input class="form-control" type="text" id="razao_social" name="razao_social" maxlength="100" placeholder="Razão Social" required value="<?php echo $razao_social; ?>">
              </div> 
            </div>

            <div class="form-group col-xs-8 col-sm-5">
              <div class="input-group">
                <span class="input-group-addon">Nome Fantasia</span>
                <input class="form-control" type="text" id="fantasia" name="fantasia" maxlength="50" placeholder="Fantasia" required value="<?php echo $fantasia; ?>">
              </div>
            </div>
            <div class="form-group col-xs-8 col-sm-5">
              <div class="input-group">
                <span class="input-group-addon">CNPJ</span>
                <input class="form-control" type="text" id="cnpj" name="cnpj" maxlength="18" placeholder="CNPJ" required value="<?php echo $cnpj; ?>">
              </div>
            </div>
            
          </fieldset>
          <fieldset><legend>Contato e Endereço</legend>
            <div class="form-group col-xs-5"> 
              <div class="input-group">
                <span class="input-group-addon">Telefone 1</span>
                <input class="form-control" type="text" id="emp_telefone_a" name="emp_telefone_a"  maxlength="14" placeholder="(xx)xxxxx-xxxx" required value="<?php echo $emp_telefone_a; ?>">
              </div>
            </div>
            <div class="form-group col-xs-5"> 
              <div class="input-group">
                <span class="input-group-addon">Telefone 2</span>
                <input class="form-control" type="text" id="emp_telefone_b" name="emp_telefone_b"  maxlength="14" placeholder="(xx)xxxxx-xxxx" value="<?php echo $emp_telefone_b; ?>">
              </div>
            </div>
            <div class="form-group col-xs-8">
              <div class="input-group">
                <span class="input-group-addon">Site Oficial</span>
                <input class="form-control" type="text" id="emp_site" name="emp_site" maxlength="100" value="<?php echo $emp_site; ?>">
              </div>
            </div>
            <div class="form-group col-xs-8 col-sm-8">
              <div class="input-group">
                <span class="input-group-addon">Logradouro</span>
                <input class="form-control" type="text" id="emp_logradouro" name="emp_logradouro" maxlength="100" value="<?php echo $emp_logradouro; ?>">
              </div>
            </div>           
            <div class="form-group col-xs-6 col-sm-3">
              <div class="input-group">
                <span class="input-group-addon">Nº</span>
                <input class="form-control" type="text" id="emp_num" name="emp_num" maxlength="6" value="<?php echo $emp_num; ?>">
              </div>
            </div> 
            <div class="form-group col-xs-6 col-sm-4">
              <div class="input-group">
                <span class="input-group-addon">Complemento</span>
                <input class="form-control" type="text" id="emp_comp" name="emp_comp" maxlength="80" value="<?php echo $emp_comp; ?>" >
              </div>
            </div> 
            <div class="form-group col-xs-8 col-sm-4"> 
              <div class="input-group">
                <span class="input-group-addon">Bairro</span>
                <input class="form-control" type="text" id="emp_bairro" name="emp_bairro" maxlength="40" value="<?php echo $emp_bairro; ?>" >
              </div>
            </div>
            <div class="form-group col-xs-5 "> 
              <div class="input-group">
                <span class="input-group-addon">Cidade</span>
                <input class="form-control" type="text" id="emp_cidade" name="emp_cidade" maxlength="100" placeholder="Cidade" value="<?php echo $emp_cidade; ?>">
              </div>
            </div>             
            <div class="form-group col-xs-3"> 
              <div class="input-group">
                <span class="input-group-addon">UF</span>
                <select class="form-control" id="emp_uf" name="emp_uf" >
                 <?php 
                  $estados['PA'] = "PA";
                  $estados['AC'] = "AC";
                  $estados['AM'] = "AM";
                  $estados['AP'] = "AP";
                  $estados['TO'] = "TO";
                  $estados['RO'] = "RO";
                  $estados['RR'] = "RR";
                    foreach($estados as $key => $val) {
                        if ($emp_uf == $key) {
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
            <div class="form-group col-xs-3"> 
              <div class="input-group">
                <span class="input-group-addon">CEP</span>
                <input class="form-control" type="text" id="emp_cep" name="emp_cep" maxlength="10" value="<?php echo $emp_cep; ?>">
              </div>
            </div>             
          </fieldset>
          <fieldset><legend>Adicionais</legend>
            <div class="form-group col-xs-12"> 
              <div class="input-group">
                <span class="input-group-addon">Observação</span>
                <textarea class="form-control" id="observacao" name="observacao"><?php echo $observacao; ?></textarea>
              </div>
            </div>
            <div class="form-group col-xs-3">
              <div class="input-group">
                <span class="input-group-addon">Funcionários</span>
                <input class="form-control" type="text" id="qtde_funcionarios" name="qtde_funcionarios" maxlength="5" value="<?php echo $qtde_funcionarios; ?>">
              </div>
            </div>
            <div class="form-group col-xs-3">
              <div class="input-group">
                <span class="input-group-addon">Número de Filiais</span>
                <input class="form-control" type="text" id="num_filiais" name="num_filiais" maxlength="5" value="<?php echo $num_filiais; ?>">
              </div>
            </div>
            <div class="form-group col-xs-5">
              <div class="input-group">
                <span class="input-group-addon">Responsável</span>
                <input class="form-control" type="text" id="responsavel" name="responsavel" maxlength="120" value="<?php echo $responsavel; ?>">
              </div>
            </div>
            <div class="form-group col-xs-12">
              <div class="input-group">
                <span class="input-group-addon">Setor Predominante</span>
                <input class="form-control" type="text" id="setor_predominante" name="setor_predominante" maxlength="120" value="<?php echo $setor_predominante; ?>">
              </div>
            </div>

            <div class="form-group col-xs-3">
              <div class="input-group">
                <span class="input-group-addon">Latitude</span>
                <input class="form-control" type="text" id="latitude" name="latitude" maxlength="20" value="<?php echo $latitude; ?>">
              </div>
            </div>
            <div class="form-group col-xs-3">
              <div class="input-group">
                <span class="input-group-addon">Longitude</span>
                <input class="form-control" type="text" id="longitude" name="longitude" maxlength="20" value="<?php echo $longitude; ?>">
              </div>
            </div>
          </fieldset>
          <?php 
          if (isset($_POST["id_empresa"])) {
             echo  "<span class='btn btn-warning btn-lg' onclick='atualizarEmpresa(\"empresa\")'>ATUALIZAR!</span>";
          }
          else{
            echo  "<span class='btn btn-success btn-lg' onclick='salvarEmpresa(\"empresa\")'>CADASTRAR!</span>";
          }
         
          ?>
          <a class="btn btn-default" href="<?php echo APP.'/egvagas/admin';?>">Voltar</a>
        </form>

        <div id="resposta" style="margin-top:10px"></div>
      </div>

<?php include $_SERVER["DOCUMENT_ROOT"]."/padrao/footer.php"; ?>