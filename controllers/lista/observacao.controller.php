<?php

require_once("../../models/lista/observacao.model.php");

$observacao = new Observacao();

$opcao = $_POST['opcao'];

if ($opcao == "Consultar")
{
    $observacao->Codigo = $_POST['Codigo'];
    $observacao->Consultar();
}
else if ($opcao == "Salvar")
{
    $observacao->Codigo = $_POST['Codigo'];
    $observacao->Codigo_Reuniao = $_POST['Codigo_Reuniao'];
    $observacao->Descricao = $_POST['Descricao'];
    $observacao->Salvar();
}
else if ($opcao == "Excluir")
{
    $observacao->Codigo = $_POST['Codigo'];
    $observacao->Excluir();
}

$response = array("success" => true, "opcao" => $opcao, "dados" => $observacao);

echo json_encode($response);    

?>