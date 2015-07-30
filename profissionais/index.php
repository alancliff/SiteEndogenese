<?php 
    require $_SERVER["DOCUMENT_ROOT"]."/padrao/constantes.php";
    require $_SERVER["DOCUMENT_ROOT"]."/padrao/header_egprofissionais.php"; 
?>
   </head>
    <body>
<!-- SCRIPT DO FACEBOOK -->   
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- FIM SCRIPT DO FACEBOOK -->  
 <?php
  require $_SERVER["DOCUMENT_ROOT"]."/padrao/menu.php";


?>

<!-- CONTEÚDO -->
<div class="container box-container" style="margin-top: 50px">
<div class="row">
  <div class="col-xs-8 col-md-9">
<!-- INÍCIO CAROUSEL -->    
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="false" style="min-width:100%; " >
 
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox" style="max-height: 300px;">
    <div class="item active">
      <img class="visible-xs visible-sm" src="<?php echo SITE.DIR.'/img/min1.png';?>" alt="...">
      <img class="visible-md" src="<?php echo SITE.DIR.'/img/min2.png';?>" alt="...">
      <img class="visible-lg" src="<?php echo SITE.DIR.'/img/min3.png';?>" alt="...">
      <div class="carousel-caption">
        LEGENDA 1
      </div>
    </div>
    <div class="item">
          <a href="<?php echo SITE.DIR.'/paginas/atendimento.php';?>" target="_blank"><img src="<?php echo SITE.DIR.'/img/b1.png';?>" width="100%" ></a>
    </div>
    <div class="item">
      <img src="<?php echo SITE.DIR.'/img/b1.png';?>" alt="...">
      <div class="carousel-caption">
        LEGENDA 2
      </div>
    </div>
  </div>
</div>
<!-- FIM CAROUSEL -->
  </div>
  <div class="col-xs-4 col-md-3">
<!-- INÍCIO COLLAPSE -->
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a id="c1" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">

          <span id="s1" data-target="#carousel-example-generic" data-slide-to="0">Encontre</span>

        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body text-justify">
        O EG Profissionais busca reunir contatos de vários profissionais autônomos. <br>
        <span class="hidden-xs hidden-sm">Encontre os profissionais que você procura para executar serviços diversos!</span>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a id="c2" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          <span id="s2"data-target="#carousel-example-generic" data-slide-to="1">Compartilhe</span>
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body text-justify">
        Seus amigos também irão encontrar informações valiosas aqui.<br>
        <span class="hidden-xs hidden-sm">Se você conhece algum profissional autônomo, peça a ele que se cadastre!</span><br>
        <div class="fb-share-button" data-href="http://www.endogenese.com.br/profissionais" data-layout="button_count"></div>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a id="c3" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          <span id="s3" data-target="#carousel-example-generic" data-slide-to="2">Cadastre-se</span>
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body text-justify">
        A todo momento as pessoas estão procurando na Internet alguém para executar serviços diversos.<br>
        <span class="hidden-xs hidden-sm">Não fique de fora: deixe que seus clientes o encontrem!<br></span>
        <a class="btn btn-warning" data-toggle='modal' data-target='#ModalCadastro'>CADASTRE-SE!</a>
      </div>
    </div>
  </div>
</div>
<!-- FIM COLLAPSE -->
    </div>
  </div>
</div>
<div class="container box-container" style="margin-top: 30px;">

<div class="row">
<!-- PAINEL ESQUERDO, COM SELECT DINÂMICO -->  
  <div class="col-xs-3">
    <div class="row">
      <div class="col-xs-12">
        <div id="campo_pesquisa" class="input-group input-group-lg">
          <span class="input-group-addon" id="titulo_pesquisa"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Categorias - Profissionais<br> Autônomos</span>
          <input id="buscaProf" type="text" class="form-control" placeholder="Procurando por..." aria-describedby="titulo_pesquisa" onkeyup="listaProfissoes('profissoes', this.value)">
        </div>
      </div>
      <div id="listaProf" class="col-xs-12">
        <div class="input-group">
        <select id="profissoes" size="8" class="form-control fonte-xs" >
        </select>
        </div>
      </div>
    </div>
  </div>
  <!-- FIM PAINEL ESQUERDO, COM SELECT DINÂMICO --> 
  <div id="profissionais" class="col-xs-9">
  </div>
</div>
</div>
<!-- MODAL PROFISSIONAIS-->
<div class="modal fade" id="ModalProfissional" tabindex="-1" role="dialog" aria-labelledby="ModalProfissionalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div style="text-align: center;"><img src='http://app.endogenese.com.br/egprofissionais/img/load.gif'></div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<!-- MODAL PROFISSIONAIS-->

<!-- MODAL CADASTRO-->
<div class="modal fade" id="ModalCadastro" tabindex="-1" role="dialog" aria-labelledby="ModalCadastroLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" id="conteudo_ModalCadastro">
      <form id="cad_profissionais" method="post">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class='modal-title text-center' id='ModalCadastroLabel'>Cadastro  - Profissional Autônomo</h4>
      </div>
      
      <div class="modal-body">
        <fieldset><legend>Dados Básicos</legend>
          <div class="row">
          <div class="col-sm-4">
            <div id="preview_foto" style="background-image: url('<?php echo SITE.DIR.'/img/avatar.png';?>');" class="foto" ></div>
          </div>
          <div class="col-sm-6">
           <label for="img_foto"> Escolha uma Foto:<br></label><input type="file" id="img_foto" name="img_foto">
          </div>
        </div>
        
        <div class="row" style="margin-top:20px">
          <div class="col-xs-12 col-sm-4">
            <label for="profissao">*Sua Profissão:</label><br><input type="text" id="profissao" name="profissao" size="15" maxlength="100" required>
          </div>
          <div class="col-xs-12 col-sm-4">
            <label for="nome_conhecido">*Nome Público:</label><br><input type="text" id="nome_conhecido" name="nome_conhecido" size="15" maxlength="250" required>
          </div>
          <div class="col-xs-12 col-sm-4">
            <label for="nome_completo">*Nome Completo:</label><br><input type="text" id="nome_completo" name="nome_completo" size="15" maxlength="250" required>
          </div>
          <div class="col-xs-12 col-sm-4">
            <label for="genero">Gênero:</label><br>
            <select id="genero" name="genero">
                  <option value="N" selected >Não Informado</option>
                  <option value="F">Feminino</option>
                  <option value="M">Masculino</option>
            </select>
          </div>
        </div>
        </fieldset>
        <fieldset style="margin-top:20px"><legend>Contatos</legend>
          <div class="row">
          <div class="col-xs-12 col-sm-6">
            <label for="fone_a">*Telefone 1:</label><br><input type="text" id="fone_a" name="fone_a" size="15" maxlength="14" required>
          </div>
          <div class="col-xs-12 col-sm-6">
            <label for="email_profissional">*e-mail:</label><br><input type="text" id="email_profissional" name="email_profissional" size="15" maxlength="100" placeholder="email@email.com" required >
          </div>
          <div class="col-xs-12 col-sm-6">
            <label for="fone_b">Telefone 2:</label><br><input type="text" id="fone_b" name="fone_b" size="15" maxlength="14">
          </div>
          <div class="col-xs-12 col-sm-6">
            <label for="link">Perfil Social/Página Web:</label><br><input type="text" id="link" name="link" size="20" maxlength="200">
          </div>
        </div>
        </fieldset>
        <fieldset style="margin-top:20px"><legend>Endereço</legend>
          <div class="row">
          <div class="col-xs-12 col-sm-5">
            <label for="logradouro">Logradouro:</label><br><input type="text" id="logradouro" name="logradouro" size="30" maxlength="250" placeholder="Rua, Av. Trav.">
          </div>
          <div class="col-xs-12 col-sm-3">
            <label for="numero">Número:</label><br><input type="text" id="numero" name="numero" size="5" maxlength="8">
          </div>
          <div class="col-xs-12 col-sm-4">
           <label for="bairro">*Bairro:</label><br><input type="text" id="bairro" name="bairro" size="15" maxlength="150" placeholder="Bairro" required>
          </div>
          <div class="col-xs-12 col-sm-4">
            <label for="cidade">*Cidade:</label><br><input type="text" id="cidade" name="cidade" size="15" maxlength="150" placeholder="Cidade" required>
          </div>
          <div class="col-xs-12 col-sm-2">
            <label for="uf">*UF:</label><br>
            <select id="uf" name="uf" required>
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
        </fieldset>
        <fieldset style="margin-top:20px"><legend>Adicionais</legend>
        <div class="row">
          <div class="col-xs-12">
            <label for="atividades">*Quais as atividades que você executa?</label><br>
            <textarea id="atividades" name="atividades" rows="6" cols="50" placeholder="Descreva resumidamente os principais serviços que você presta." required></textarea>
          </div>

          <div class="col-xs-12" style="margin-top:20px">
            <label for="referencias">Informe suas experiências anteriores, se possível com contatos de referências:</label><br>
            <textarea id="referencias" name="referencias" rows="6" cols="50" placeholder="Ex.: Prestação de 'SERVIÇOS' para a 'EMPRESA X' ou 'PESSOA Y', contato (xx)xxxx-xxxx."></textarea>
          </div>
        </div>
        </fieldset>
      </div>
      <div class="modal-footer">
        <div>
          <div class="has-success text-justify">
            <strong>(*)Campos de preenchimento Obrigatórios.</strong>
            <div class="radio">
              <label>
                <input type="radio" checked>Estou de ACORDO com os Termos de Serviços e a Política de Privacidade da Endogênese Soluções (se não concorda, clique em CANCELAR.)
              </label>
            </div>
          </div>
         </div>
        <button type='button' class='btn btn-danger pull-left' data-dismiss='modal' style='font-weight: bold;'>CANCELAR</button>
        <button type='button'  onclick="incluirProfissional('cad_profissionais')" class='btn btn-success pull-right' style='font-weight: bold;'>CADASTRAR</button>
        
      </div>
    </form>
    </div>
  </div>
</div>
<!-- MODAL CADASTRO
<div class="container">
<div class="row">
  <div class="col-xs-3">
    <div style="background-image: url('/eg/img/alan.jpg');" class='foto'></div>
  </div>
    <div class="col-xs-9">
  <p class="fonte-md">Nome Conhecido</p>
  <p class="fonte-sm">Profissão</p>
  <p class="fonte-sm">Atividades:</p>
  <p class="text-justify">Texto descritivo das atividades Texto descritivo das atividades Texto descritivo das atividades Texto descritivo das atividades Texto descritivo das atividades 
  Texto descritivo das atividades Texto descritivo das atividades Texto descritivo das atividades</p>
    
  </div>
</div>
  <hr>
  <div class="row">
    <div class="col-xs-3">
    <div style="background-image: url('/eg/img/alan.jpg');" class='foto'></div>
  </div>
    <div class="col-xs-9">
  <p class="fonte-md">Nome Conhecido</p>
  <p class="fonte-sm">Profissão</p>
  <h4>Atividades</h4>
  <p class="text-justify">Texto descritivo das atividades Texto descritivo das atividades Texto descritivo das atividades Texto descritivo das atividades Texto descritivo das atividades 
  Texto descritivo das atividades Texto descritivo das atividades Texto descritivo das atividades</p>
    
  </div>

</div>
</div>-->
<script type="text/javascript">
//CRIA LISTA DE PROFISSIONAIS NA HOME
listaProfissionais(1, "todas");
//CRIA LISTA LISTA DE PROFISSÕES NO SELECT
listaProfissoes("profissoes");



</script>

<?php 
require $_SERVER["DOCUMENT_ROOT"]."/padrao/footer.php";  ?>