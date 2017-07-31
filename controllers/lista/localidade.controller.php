<?php

require_once("../../models/lista/localidade.model.php");

$opcao = $_POST['opcao'];
Logger::Instance()->Info("localidade.controller.php", "opcao: " . $opcao);
$dados = $_POST['dados'];
Logger::Instance()->Info("localidade.controller.php", "dados: " . json_encode($dados));

$localidade = new Localidade();
$localidade->SetValues($dados);

if ($opcao == "Consultar")
    $localidade->Consultar();
else if ($opcao == "Incluir")
    $localidade->Incluir();
else if ($opcao == "Alterar")
    $localidade->Alterar();
else if ($opcao == "Salvar")
    $localidade->Salvar();
else if ($opcao == "Excluir")
    $localidade->Excluir();

$response = array("success" => true, "opcao" => $opcao, "dados" => $localidade);
Logger::Instance()->Info("localidade.controller.php", "response: " . json_encode($response));

echo json_encode($response);    

?>