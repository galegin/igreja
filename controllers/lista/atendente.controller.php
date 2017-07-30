<?php

require_once("../../models/lista/atendente.model.php");

$opcao = $_POST['opcao'];
Logger::Instance()->Info("atendente.controller.php", "opcao: " . $opcao);
$dados = $_POST['dados'];
Logger::Instance()->Info("atendente.controller.php", "dados: " . $dados['Codigo']);

$atendente = new Atendente();
$atendente->SetValues($dados);

if ($opcao == "Consultar")
    $atendente->Consultar();
else if ($opcao == "Salvar")
    $atendente->Salvar();
else if ($opcao == "Excluir")
    $atendente->Excluir();

$response = array("success" => true, "opcao" => $opcao, "dados" => $atendente);

echo json_encode($response);    

?>