<?php

require_once("../../models/lista/apresentacao.model.php");

$opcao = $_POST['opcao'];
Logger::Instance()->Info("apresentacao.controller.php", "opcao: " . $opcao);
$dados = $_POST['dados'];
Logger::Instance()->Info("apresentacao.controller.php", "dados: " . json_encode($dados));

$apresentacao = new Apresentacao();
$apresentacao->SetValues($dados);

if ($opcao == "Consultar")
    $apresentacao->Consultar();
else if ($opcao == "Incluir")
    $apresentacao->Incluir();
else if ($opcao == "Alterar")
    $apresentacao->Alterar();
else if ($opcao == "Salvar")
    $apresentacao->Salvar();
else if ($opcao == "Excluir")
    $apresentacao->Excluir();

$response = array("success" => true, "opcao" => $opcao, "dados" => $apresentacao);
Logger::Instance()->Info("apresentacao.controller.php", "response: " . json_encode($response));

echo json_encode($response);    

?>