<?php

require_once("../../models/lista/tipo.servico.model.php");

$tiposervico = new TipoServico();

$opcao = $_POST['opcao'];

if ($opcao == "Consultar")
{
    $tiposervico->Codigo = $_POST['Codigo'];
    $tiposervico->Consultar();
}
else if ($opcao == "Salvar")
{
    $tiposervico->Codigo = $_POST['Codigo'];
    $tiposervico->Descricao = $_POST['Descricao'];
    $tiposervico->Tipo = $_POST['Tipo'];
    $tiposervico->Salvar();
}
else if ($opcao == "Excluir")
{
    $tiposervico->Codigo = $_POST['Codigo'];
    $tiposervico->Excluir();
}

$response = array("success" => true, "opcao" => $opcao, "dados" => $tiposervico);

echo json_encode($response);    

?>