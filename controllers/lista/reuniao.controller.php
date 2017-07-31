<?php

require_once("../../models/lista/reuniao.model.php");

$opcao = $_POST['opcao'];
Logger::Instance()->Info("reuniao.controller.php", "opcao: " . $opcao);
$dados = $_POST['dados'];
Logger::Instance()->Info("reuniao.controller.php", "dados: " . json_encode($dados));

$reuniao = new Reuniao();
$reuniao->SetValues($dados);

if ($opcao == "Consultar")
    $reuniao->Consultar();
else if ($opcao == "Incluir")
    $reuniao->Incluir();
else if ($opcao == "Alterar")
    $reuniao->Alterar();
else if ($opcao == "Salvar")
    $reuniao->Salvar();
else if ($opcao == "Excluir")
    $reuniao->Excluir();

$response = array("success" => true, "opcao" => $opcao, "dados" => $reuniao);
Logger::Instance()->Info("reuniao.controller.php", "response: " . json_encode($response));

echo json_encode($response);    

?>