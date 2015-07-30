<?php 
$subtitulo = "Detalhamento da Vaga";
require $_SERVER["DOCUMENT_ROOT"]."/egvagas/action/protecao_login.php";
require $_SERVER["DOCUMENT_ROOT"]."/egvagas/includes/constantes.php"; 
require $_SERVER["DOCUMENT_ROOT"]."/egvagas/includes/header.php"; ?>

<!-- CONTEÚDO -->
    
<script type="text/javascript">
$(document).ready(function(){
  $("#empresas").on("click", function(){
    listaCargos($("#empresas").val());

  });
  $("#cargos").on("click", function(){
    relatorioVaga($("#cargos").val());

  });
});

function selecionaEmpresa() {
    
        
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("empresas").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("POST","<?php echo APP.'/egvagas/action/seleciona_empresa.php';?>",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send();
    
}

function listaCargos(id_empresa) {
  

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("cargos").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("POST","<?php echo APP.'/egvagas/action/lista_cargos.php';?>",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("id_empresa="+id_empresa);

}
function relatorioVaga(id_vaga) {
  

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("detalhamento_vaga").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("POST","<?php echo APP.'/egvagas/action/relatorio_vaga.php';?>",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("id_vaga="+id_vaga);

}
function imprimir() {
    window.print();
}
</script>
<style type="text/css">
@media print {
  .nao_impresso{
    display: none;

  }
}
</style>
<div class="container" style="margin-top:50px;">
  <h2 class="alert-success text-center">Detalhamento da Vaga</h2>
  <div style="margin-bottom:20px;">
    <a class="btn btn-default nao_impresso" href="<?php echo APP.'/egvagas/admin';?>">VOLTAR</a>
  </div>
  <div class="row nao_impresso">
           <div class="form-group col-xs-4">
              <div class="input-group altergroup">
                <span class="input-group-addon">Empresa</span>
                 <select class="form-control" id="empresas" name="empresas">

                </select> 
              </div>
            </div>
              <div class="form-group col-xs-4">
              <div class="input-group altergroup">
                <span class="input-group-addon">Cargos</span>
                 <select class="form-control" id="cargos" name="cargos">

                </select> 
              </div>
            </div>
  </div>
  <div id="detalhamento_vaga">
    
  </div>
</div>        
            
<script type="text/javascript">
  selecionaEmpresa();
</script>
<?php 
echo "<div class='nao_impresso'>";
require $_SERVER["DOCUMENT_ROOT"]."/egvagas/includes/footer.php";
echo "</div>";
 ?>