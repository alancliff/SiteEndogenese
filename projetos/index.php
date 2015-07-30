<!-- CONTEÚDO -->
    <?php 
    require $_SERVER["DOCUMENT_ROOT"]."/padrao/constantes.php";
    require $_SERVER["DOCUMENT_ROOT"]."/padrao/header_egprojetos.php"; 

    ?>
  </head>
  <body>
<?php
  require $_SERVER["DOCUMENT_ROOT"]."/padrao/menu.php";
?>


<div class="corpo"> 
  <div class="menu_lateral" id="menu_lateral"> 
    <div class="panel-group menu_egprojetos" id="accordion" role="tablist" aria-multiselectable="true" style="float: left">
  
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Empresa
            </a>
          </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
          <div class="panel-body">
            <ul class="list-group">
              <li class="list-group-item" onclick="getPagina('dados_basicos'), ativa(this)">Dados Básicos</li>
              <li class="list-group-item" onclick="getPagina('dados_basicos'), ativa(this)">Dirigentes</li>
              <li class="list-group-item" onclick="getPagina('dados_basicos'), ativa(this)">Coligadas</li>
              <li class="list-group-item" onclick="getPagina('dados_basicos'), ativa(this)">Sociedade</li>
              <li class="list-group-item" onclick="getPagina('dados_basicos'), ativa(this)">Balanços</li>
              <li class="list-group-item" onclick="getPagina('dados_basicos'), ativa(this)">DREs</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingTwo">
          <h4 class="panel-title">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Projeto
            </a>
          </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
          <div class="panel-body">
            <ul class="list-group">
              <li class="list-group-item">Dados Básicos</li>
              <li class="list-group-item">Plano de Aplicação</li>
              <li class="list-group-item">BDI</li>
              <li class="list-group-item">Cronograma</li>
              <li class="list-group-item">Capacidade Produtiva</li>
              <li class="list-group-item">Receitas</li>
              <li class="list-group-item">Insumos</li>
              <li class="list-group-item">Mão-de-Obra</li>
              <li class="list-group-item">Custos Diversos</li>
              <li class="list-group-item">Indicadores CG</li>
              <li class="list-group-item">Textos</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingThree">
          <h4 class="panel-title">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Complementos
            </a>
          </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
          <div class="panel-body">
            <ul class="list-group">
              <li class="list-group-item">Condições Gerais</li>
              <li class="list-group-item">Participantes</li>
              <li class="list-group-item">Faturamento Atual</li>
              <li class="list-group-item">Garantias</li>
              <li class="list-group-item">Endividamento</li>            
              <li class="list-group-item">Check-list</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingFour">
          <h4 class="panel-title">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
              Relatórios
            </a>
          </h4>
        </div>
        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
          <div class="panel-body">
            <ul class="list-group">
              <li class="list-group-item">Análise Financeira</li>
              <li class="list-group-item">D-M-S</li>
              <li class="list-group-item">Mem. Cál. CG</li>
              <li class="list-group-item">Capital de Giro</li>
              <li class="list-group-item">Mem. Cál. Custos</li>
              <li class="list-group-item">Estrut. dos Custos</li>            
              <li class="list-group-item">Usos e Fontes</li>
              <li class="list-group-item">Simulação Financ.</li>
              <li class="list-group-item">Capacidade de Pagamento</li>
              <li class="list-group-item">Indic. do Projeto</li>
              <li class="list-group-item">Cronograma Liberação</li>
              <li class="list-group-item">Verificação Geral</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingFive">
          <h4 class="panel-title">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
              Documentos
            </a>
          </h4>
        </div>
        <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
          <div class="panel-body">
            <ul class="list-group">
              <li class="list-group-item">FISA - QSA</li>
              <li class="list-group-item">Declaração - Serv. Federal</li>
              <li class="list-group-item">Declaração - SUDAN</li>
              <li class="list-group-item">Declaração - CVM</li>
              <li class="list-group-item">Declaração - BNDES</li>
              <li class="list-group-item">Declaração - Fundos</li>            
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="conteudo" id="conteudo">
    
  </div>
  <script type="text/javascript">getPagina();</script>
</div>
<div style="margin-top:80px"></div>

<?php 
require $_SERVER["DOCUMENT_ROOT"]."/padrao/footer.php";  ?>