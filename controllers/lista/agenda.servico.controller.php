<?php

require_once("../../models/lista/agenda.servico.model.php");

$opcao = $_POST['opcao'];
Logger::Instance()->Info("agenda.servico.controller.php", "opcao: " . $opcao);
$dados = $_POST['dados'];
Logger::Instance()->Info("agenda.servico.controller.php", "dados: " . json_encode($dados));

$agendaservico = new AgendaServico();
$agendaservico->SetValues($dados);

if ($opcao == "Consultar")
    $agendaservico->Consultar();
else if ($opcao == "Salvar")
    $agendaservico->Salvar();
else if ($opcao == "Excluir")
    $agendaservico->Excluir();

$response = array("success" => true, "opcao" => $opcao, "dados" => $agendaservico);
Logger::Instance()->Info("agenda.servico.controller.php", "response: " . json_encode($response));

echo json_encode($response);    

?>