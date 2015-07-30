<?php
/* ========================================================================
 * EG Profissionais - criar_lista_profissoes.php  V. 1.0
 * Endogênese Consultoria e Serviços LTDA
 * ========================================================================
 * Finalidade: Criar a lista de opções no select do painel esquerdo, para o usuário selecionar a profissão.
 * Autor: Alan Cliff
 * Última Atualização - 15/05/2015
 * ======================================================================== */

include "../includes/conexao.php";
  $busca = $_POST["busca"];
  if ( $busca == ""){
    $sql_geral = ("SELECT DISTINCT profissao 
                FROM profissionais
                WHERE ativa = true
                ORDER BY profissao ASC");
  }
  else{
    $sql_geral = ("SELECT DISTINCT profissao 
                  FROM profissionais 
                  WHERE profissao LIKE '%$busca%'
                  AND ativa = true
                  ORDER BY profissao ASC");
  } 
      $sql_geral = $conexao->prepare($sql_geral);
      $sql_geral->execute();
  if ($sql_geral->rowCount() > 0)
    {
      echo "<option value='todas'>-- TODAS AS CATEGORIAS --</option>";
      while ($valor = $sql_geral->fetch(PDO::FETCH_ASSOC) )
          {
            echo "<option value='$valor[profissao]'>$valor[profissao]</option>";
          }
    }
  else
  {
    echo "<option value='todas'>-- TODAS AS CATEGORIAS --</option>";
  }

?>