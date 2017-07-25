<?php

require_once("../../models/lista/apresentacao.model.php");

$opcao = $_POST['opcao'];
Logger::Instance()->Info("apresentacao.controller.php", "opcao: " . $opcao);
$dados = $_POST['dados'];
Logger::Instance()->Info("apresentacao.controller.php", "dados: " . json_encode($dados));

$apresentacao = new Apresentacao();

if ($opcao == "Consultar")
{
    $apresentacao->Codigo = $dados['Codigo'];
    $apresentacao->Consultar();
}
else if ($opcao == "Salvar")
{
    $apresentacao->Codigo = $dados['Codigo'];
    $apresentacao->Codigo_Reuniao = $dados['Codigo_Reuniao'];
    $apresentacao->Codigo_Localidade = $dados['Codigo_Localidade'];
    $apresentacao->Tipo = $dados['Tipo'];
    $apresentacao->Codigo_Tipo_Servico = $dados['Codigo_Tipo_Servico'];
    $apresentacao->Funcao = $dados['Funcao'];
    $apresentacao->Nome = $dados['Nome'];
    $apresentacao->Salvar();
}
else if ($opcao == "Excluir")
{
    $apresentacao->Codigo = $dados['Codigo'];
    $apresentacao->Excluir();
}

$response = array("success" => true, "opcao" => $opcao, "dados" => $apresentacao);

echo json_encode($response);    

?>