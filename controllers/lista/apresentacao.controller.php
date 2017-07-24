<?php

require_once("../../models/lista/apresentacao.model.php");

$apresentacao = new Apresentacao();

$opcao = $_POST['opcao'];

if ($opcao == "Consultar")
{
    $apresentacao->Codigo = $_POST['Codigo'];
    $apresentacao->Consultar();
}
else if ($opcao == "Salvar")
{
    $apresentacao->Codigo = $_POST['Codigo'];
    $apresentacao->Codigo_Reuniao = $_POST['Codigo_Reuniao'];
    $apresentacao->Codigo_Localidade = $_POST['Codigo_Localidade'];
    $apresentacao->Tipo = $_POST['Tipo'];
    $apresentacao->Codigo_Tipo_Servico = $_POST['Codigo_Tipo_Servico'];
    $apresentacao->Funcao = $_POST['Funcao'];
    $apresentacao->Nome = $_POST['Nome'];
    $apresentacao->Salvar();
}
else if ($opcao == "Excluir")
{
    $apresentacao->Codigo = $_POST['Codigo'];
    $apresentacao->Excluir();
}

$response = array("success" => true, "opcao" => $opcao, "dados" => $apresentacao);

echo json_encode($response);    

?>