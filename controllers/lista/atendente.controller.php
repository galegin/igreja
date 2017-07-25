<?php

require_once("../../models/lista/atendente.model.php");

$opcao = $_POST['opcao'];
Logger::Instance()->Info("atendente.controller.php", "opcao: " . $opcao);
$dados = $_POST['dados'];
Logger::Instance()->Info("atendente.controller.php", "dados: " . $dados['Codigo']);

$atendente = new Atendente();

if ($opcao == "Consultar")
{
    $atendente->Codigo = $dados['Codigo'];
    $atendente->Consultar();
}
else if ($opcao == "Salvar")
{
    $atendente->Codigo = $dados['Codigo'];
    $atendente->Nome = $dados['Nome'];
    $atendente->Ministerio = $dados['Ministerio'];
    $atendente->Administracao = $dados['Administracao'];
    $atendente->Codigo_Localidade = $dados['Codigo_Localidade'];
    $atendente->Telefone_Pessoal = $dados['Telefone_Pessoal'];
    $atendente->Telefone_Trabalho = $dados['Telefone_Trabalho'];
    $atendente->Telefone_Recado = $dados['Telefone_Recado'];
    $atendente->Data_Apresentacao = $dados['Data_Apresentacao'];
    $atendente->Salvar();
}
else if ($opcao == "Excluir")
{
    $atendente->Codigo = $dados['Codigo'];
    $atendente->Excluir();
}

$response = array("success" => true, "opcao" => $opcao, "dados" => $atendente);

echo json_encode($response);    

?>