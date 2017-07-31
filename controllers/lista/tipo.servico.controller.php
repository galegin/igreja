<?php

require_once("../../models/lista/tipo.servico.model.php");

$opcao = $_POST['opcao'];
Logger::Instance()->Info("tipo.servico.controller.php", "opcao: " . $opcao);
$dados = $_POST['dados'];
Logger::Instance()->Info("tipo.servico.controller.php", "dados: " . json_encode($dados));

$tiposervico = new TipoServico();
$tiposervico->SetValues($dados);

if ($opcao == "Consultar")
    $tiposervico->Consultar();
else if ($opcao == "Incluir")
    $tiposervico->Incluir();
else if ($opcao == "Alterar")
    $tiposervico->Alterar();
else if ($opcao == "Salvar")
    $tiposervico->Salvar();
else if ($opcao == "Excluir")
    $tiposervico->Excluir();

$response = array("success" => true, "opcao" => $opcao, "dados" => $tiposervico);
Logger::Instance()->Info("tipo.servico.controller.php", "response: " . json_encode($response));

echo json_encode($response);

?>