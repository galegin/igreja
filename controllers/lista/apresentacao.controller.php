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
else if ($opcao == "Salvar")
    $apresentacao->Salvar();
else if ($opcao == "Excluir")
    $apresentacao->Excluir();

$response = array("success" => true, "opcao" => $opcao, "dados" => $apresentacao);

echo json_encode($response);    

?>