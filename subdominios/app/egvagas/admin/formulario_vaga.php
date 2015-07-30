<?php 
$modulo = "egvagas";
$subtitulo = "EG Vagas :: Cadastro de Vagas";
require $_SERVER["DOCUMENT_ROOT"]."/protecao/protecao_login.php";
require $_SERVER["DOCUMENT_ROOT"]."/padrao/constantes.php";
include $_SERVER["DOCUMENT_ROOT"]."/padrao/conexao_egvagas.php"; 
include $_SERVER["DOCUMENT_ROOT"]."/padrao/header.php";
include $_SERVER["DOCUMENT_ROOT"]."/padrao/menu.php";


?>

<!-- CONTEÚDO -->
    
<script src="<?php echo BASE.'/js/maskMoney.min.js';?>" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function(){
$("#salario").maskMoney();
});

</script>


<div style="margin-top:60px;" class="container">
    <img class="titulo_img" src="/egvagas/img/egvagas.png">
  <h1 class="titulo_tela bg-info">Formulário de Vaga</h1>
    <form id="vaga">
          <fieldset ><legend > Informações Básicas</legend> 
          <br>
          <label>Dados da Empresa</label>
          <?php
            //SE FOR PASSADO O ID DA EMPRESA
            if (isset($_POST["id_empresa"])) 
            {
              $sql_e = "SELECT id_empresa, fantasia, cnpj FROM empresas WHERE id_empresa = $_POST[id_empresa]";
              $sql_e = $conexao->prepare($sql_e);
              $sql_e->execute();

              if ($sql_e->rowCount() > 0) {
                while ($dados_e = $sql_e->fetch(PDO::FETCH_ASSOC) ) {
                  $id_empresa = $dados_e['id_empresa'];
                  $fantasia = $dados_e['fantasia'];
                  $cnpj = $dados_e['cnpj'];
                }
              }
           
          echo "<input type='hidden' name='id_empresa' id='id_empresa' value='$id_empresa'> ";
          echo "<br><span class='btn btn-default disabled'>Código: $id_empresa</span> 
          <span class='btn btn-default disabled'>Empresa: $fantasia</span> 
          <span class='btn btn-default disabled'>CNPJ: $cnpj</span>";
           }

           //SE FOR PASSADO O ID DA VAGA PARA ATUALIZAÇÃO
           if (isset($_POST["id_vaga"])) {
            

            $sql = "SELECT * FROM vagas WHERE id_vaga = $_POST[id_vaga]";
            $sql = $conexao->prepare($sql);
            $sql->execute();

            if ($sql->rowCount() > 0) {
              while ($dados = $sql->fetch(PDO::FETCH_ASSOC) ) {
                $id_vaga = $dados['id_vaga'];
                $cargo = $dados['cargo'];
                $qtde_ofertada = $dados['qtde_ofertada'];
                $qtde_pne = $dados['qtde_pne'];
                $formacao_exg = $dados['formacao_exg'];
                $escolaridade_exg = $dados['escolaridade_exg'];
                $carga_semanal = $dados['carga_semanal'];
                $trab_matutino = $dados['trab_matutino'];
                $trab_vespertino = $dados['trab_vespertino'];
                $trab_noturno = $dados['trab_noturno'];
                $tempo_exp_exg = $dados['tempo_exp_exg'];
                $habilidades_basicas = $dados['habilidades_basicas'];
                $habilidades_desejaveis = $dados['habilidades_desejaveis'];
                $duracao_emprego = $dados['duracao_emprego'];
                $descricao_atividades = $dados['descricao_atividades'];
                $descricao_pne = $dados['descricao_pne'];
                $local_trabalho = $dados['local_trabalho'];
                $genero_preferencia = $dados['genero_preferencia'];
                $comissao = $dados['comissao'];
                $salario = $dados['salario'];
                $periodicidade_pagamento = $dados['periodicidade_pagamento'];
                $viagem_frequente = $dados['viagem_frequente'];
                $ativa = $dados['ativa'];
              }
            }
            echo "<input type='hidden' name='id_vaga' id='id_vaga' value='$id_vaga'> ";
        }
          



          ?>
          
          <div class="row" style="margin-top:10px;"> 

             <?php 
             if (isset($_POST["id_vaga"])) {
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
            <div class="form-group col-xs-5">
              <div class="input-group">
                <span class="input-group-addon">Cargo</span>
                <input class="form-control" type="text" id="cargo" name="cargo" maxlength="50" placeholder="Função" required value="<?php echo $cargo; ?>">
              </div> 
            </div>
            <div class="form-group col-xs-3">
              <div class="input-group">
                <span class="input-group-addon">Quantidade Vagas</span>
                <input class="form-control" type="text" id="qtde_ofertada" name="qtde_ofertada" maxlength="4" placeholder="" required value="<?php echo $qtde_ofertada; ?>">
              </div> 
            </div>
            <div class="form-group col-xs-3">
              <div class="input-group">
                <span class="input-group-addon">Vagas PNE</span>
                <input class="form-control" type="text" id="qtde_pne" name="qtde_pne" maxlength="4" placeholder="" required value="<?php echo $qtde_pne; ?>">
              </div> 
            </div>
          </div>

          <div class="row">
            <div class="form-group col-xs-4">
              <div class="input-group">
                <span class="input-group-addon">Formação Exigida</span>
                <input class="form-control" type="text" id="formacao_exg" name="formacao_exg" maxlength="100" placeholder="Formação" required value="<?php echo $formacao_exg; ?>">
              </div>
            </div>
            <div class="form-group col-xs-4">
              <div class="input-group">
                <span class="input-group-addon">Escolaridade</span>
                 <select class="form-control" id="escolaridade_exg" name="escolaridade_exg" required>
                  <?php
                  $opcao['Qualquer'] = "Qualquer";
                  $opcao['Fundamental'] = "Fundamental";
                  $opcao['Médio'] = "Médio";
                  $opcao['Técnico'] = "Técnico";
                  $opcao['Superior'] = "Superior";
                  $opcao['Especialista'] = "Especialista";
                  $opcao['Mestrado'] = "Mestrado";
                  $opcao['Doutorado'] = "Doutorado";
                   foreach($opcao as $key => $val) {
                        if ($escolaridade_exg == $key) {
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
            <div class="form-group col-xs-2">
              <div class="input-group">
                <span class="input-group-addon">Carga Horária Semanal</span>
                <input class="form-control" type="text" id="carga_semanal" name="carga_semanal" maxlength="20" placeholder="xx Horas" required value="<?php echo $carga_semanal; ?>"> 
              </div>
            </div>    
          </div>
          <div class="row">
            <div class="form-group col-xs-8">
              <div class="input-group">
                <span class="input-group-addon">Período do trabalho</span>
                <div class="row">
                  <div class="col-xs-4">
                    <span class="input-group-addon">Matutino</span>
                    <select class="form-control" id="trab_matutino" name="trab_matutino" >
                      <?php
                      $t_m['1'] = "Sim";
                      $t_m['0'] = "Não";
                       foreach($t_m as $key => $val) {
                            if ($trab_matutino == $key) {
                              echo "<option value='$key' selected>$val</option>";
                            }
                            else
                            {
                              echo "<option value='$key'>$val</option>";                              }
                        }
                      ?>
                    </select>
                  </div>
                  <div class="col-xs-4">
                    <span class="input-group-addon">Vespertino</span>
                    <select class="form-control" id="trab_vespertino" name="trab_vespertino" >
                      <?php
                      $t_v['1'] = "Sim";
                      $t_v['0'] = "Não";
                       foreach($t_v as $key => $val) {
                            if ($trab_vespertino == $key) {
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
                  <div class="col-xs-4">
                    <span class="input-group-addon">Noturno</span>
                    <select class="form-control" id="trab_noturno" name="trab_noturno" >
                      <?php
                      $t_n['1'] = "Sim";
                      $t_n['0'] = "Não";
                       foreach($t_n as $key => $val) {
                            if ($trab_noturno == $key) {
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
            </div>
           
            <div class="form-group col-xs-2">
              <div class="input-group">
                <span class="input-group-addon">Experiência Mínima</span>
                <input class="form-control" type="text" id="tempo_exp_exg" name="tempo_exp_exg" maxlength="20" placeholder="xx Meses" required value="<?php echo $tempo_exp_exg; ?>"> 
              </div>
            </div>

          </div>

          
            <div class="form-group col-xs-12">
              <div class="input-group">
                <span class="input-group-addon">Habilidades Básicas</span>
                <textarea class="form-control" id="habilidades_basicas" name="habilidades_basicas" required><?php echo $habilidades_basicas; ?></textarea>
              </div>
            </div> 
            <div class="form-group col-xs-12">
              <div class="input-group">
                <span class="input-group-addon">Descrição das Atividades</span>
                <textarea class="form-control" id="descricao_atividades" name="descricao_atividades" required><?php echo $descricao_atividades; ?></textarea>
              </div>
            </div> 
  


          </fieldset>
          <fieldset><legend>Informações Complementares</legend>
                      
          <div class="row">  
            <div class="form-group col-xs-3">
              <div class="input-group">
                <span class="input-group-addon">Local de Trabalho</span>
                <input class="form-control" type="text" id="local_trabalho" name="local_trabalho" maxlength="25" value="<?php echo $local_trabalho; ?>">
              </div>
            </div> 
            <div class="form-group col-xs-3"> 
              <div class="input-group">
                <span class="input-group-addon">Gênero de Preferência</span>
                 <select class="form-control" id="genero_preferencia" name="genero_preferencia" >
                  <?php
                  $gen['Ambos'] = "Ambos";
                  $gen['Feminino'] = "Feminino";
                  $gen['Masculino'] = "Masculino";
                   foreach($gen as $key => $val) {
                        if ($genero_preferencia == $key) {
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
            <div class="form-group col-xs-2"> 
              <div class="input-group">
                <span class="input-group-addon">Comissão</span>
                <select class="form-control" id="comissao" name="comissao" >
                  <?php
                  $com['Sim'] = "Sim";
                  $com['Não'] = "Não";
                   foreach($com as $key => $val) {
                        if ($comissao == $key) {
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
            <div class="form-group col-xs-2"> 
              <div class="input-group">
                <span class="input-group-addon">Viagem</span>
                <select class="form-control" id="viagem_frequente" name="viagem_frequente" >
                  <?php
                  $via['Sim'] = "Sim";
                  $via['Não'] = "Não";
                   foreach($via as $key => $val) {
                        if ($viagem_frequente == $key) {
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
                <span class="input-group-addon">Salário Inicial</span>
                <input class="form-control" type="text" id="salario" name="salario" maxlength="10" data-thousands="" data-decimal="." value="<?php echo $salario; ?>">
              </div>
            </div> 
          </div>

          <div class="row">
            <div class="form-group col-xs-4"> 
              <div class="input-group">
                <span class="input-group-addon">Periodicidade do Pagamento</span>
                <select class="form-control" id="periodicidade_pagamento" name="periodicidade_pagamento" >

                <?php
                  $periodo['Mensal'] = "Mensal";
                  $periodo['Quinzenal'] = "Quinzenal";
                  $periodo['Semanal'] = "Semanal";
                  $periodo['Diário'] = "Diário";
                  foreach($periodo as $key => $val) {
                        if ($periodicidade_pagamento == $key) {
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
            <div class="form-group col-xs-4"> 
              <div class="input-group">
                <span class="input-group-addon">Duração do Emprego</span>
                <input class="form-control" type="text" id="duracao_emprego" name="duracao_emprego"  maxlength="20" value="<?php echo $duracao_emprego; ?>">
              </div>
            </div>
          </div>

            <div class="form-group col-xs-12"> 
              <div class="input-group">
                <span class="input-group-addon">Habilidades Desejáveis</span>
                <textarea class="form-control" id="habilidades_desejaveis" name="habilidades_desejaveis" ><?php echo $habilidades_desejaveis; ?></textarea>
              </div>
            </div>
          
            <div class="form-group col-xs-12">
              <div class="input-group">
                <span class="input-group-addon">Descrição PNE</span>
                <input class="form-control" type="text" id="descricao_pne" name="descricao_pne" maxlength="100" placeholder="" value="<?php echo $descricao_pne; ?>">
              </div>
            </div>

        

          </fieldset>
           

          

          <?php 
          if (isset($_POST["id_vaga"])) {
             echo  "<span class='btn btn-warning btn-lg' onclick='atualizarVaga(\"vaga\")'>ATUALIZAR!</span>";
          }
          else{
            echo  "<span class='btn btn-success btn-lg' onclick='salvarVaga(\"vaga\")'>CADASTRAR!</span>";
          }
         
          ?>
          <a class="btn btn-default" href="<?php echo APP.'/egvagas/admin';?>">VOLTAR</a>
          
        </form>
        <div id="resposta" style="margin-top:10px"></div>

</div>
<?php include $_SERVER["DOCUMENT_ROOT"]."/padrao/footer.php"; ?>