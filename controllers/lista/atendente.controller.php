<?php

require_once("../../models/lista/atendente.model.php");

$atendente = new Atendente();

$opcao = $_POST['opcao'];

if ($opcao == "Consultar")
{
    $atendente->Codigo = $_POST['Codigo'];
    $atendente->Consultar();
}
else if ($opcao == "Salvar")
{
    $atendente->Codigo = $_POST['Codigo'];
    $atendente->Nome = $_POST['Nome'];
    $atendente->Ministerio = $_POST['Ministerio'];
    $atendente->Administracao = $_POST['Administracao'];
    $atendente->Codigo_Localidade = $_POST['Codigo_Localidade'];
    $atendente->Telefone_Pessoal = $_POST['Telefone_Pessoal'];
    $atendente->Telefone_Trabalho = $_POST['Telefone_Trabalho'];
    $atendente->Telefone_Recado = $_POST['Telefone_Recado'];
    $atendente->Data_Apresentacao = $_POST['Data_Apresentacao'];
    $atendente->Salvar();
}
else if ($opcao == "Excluir")
{
    $atendente->Codigo = $_POST['Codigo'];
    $atendente->Excluir();
}

$response = array("success" => true, "opcao" => $opcao, "dados" => $atendente);

echo json_encode($response);    

?>