<?php

require_once("../../models/lista/servico.model.php");

$opcao = $_POST['opcao'];
Logger::Instance()->Info("servico.controller.php", "opcao: " . $opcao);
$dados = $_POST['dados'];
Logger::Instance()->Info("servico.controller.php", "dados: " . json_encode($dados));

$servico = new Servico();
$servico->SetValues($dados);

if ($opcao == "Consultar")
    $servico->Consultar();
else if ($opcao == "Incluir")
    $servico->Incluir();
else if ($opcao == "Alterar")
    $servico->Alterar();
else if ($opcao == "Salvar")
    $servico->Salvar();
else if ($opcao == "Excluir")
    $servico->Excluir();

$response = array("success" => true, "opcao" => $opcao, "dados" => $servico);
Logger::Instance()->Info("servico.controller.php", "response: " . json_encode($response));

echo json_encode($response);    

?>