<?php

require_once("../../models/lista/observacao.model.php");

$opcao = $_POST['opcao'];
Logger::Instance()->Info("observacao.controller.php", "opcao: " . $opcao);
$dados = $_POST['dados'];
Logger::Instance()->Info("observacao.controller.php", "dados: " . json_encode($dados));

$observacao = new Observacao();
$observacao->SetValues($dados);

if ($opcao == "Consultar")
    $observacao->Consultar();
else if ($opcao == "Incluir")
    $observacao->Incluir();
else if ($opcao == "Alterar")
    $observacao->Alterar();
else if ($opcao == "Salvar")
    $observacao->Salvar();
else if ($opcao == "Excluir")
    $observacao->Excluir();

$response = array("success" => true, "opcao" => $opcao, "dados" => $observacao);
Logger::Instance()->Info("observacao.controller.php", "response: " . json_encode($response));

echo json_encode($response);    

?>