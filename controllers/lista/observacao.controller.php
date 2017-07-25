<?php

require_once("../../models/lista/observacao.model.php");

$opcao = $_POST['opcao'];
Logger::Instance()->Info("observacao.controller.php", "opcao: " . $opcao);
$dados = $_POST['dados'];
Logger::Instance()->Info("observacao.controller.php", "dados: " . json_encode($dados));

$observacao = new Observacao();

if ($opcao == "Consultar")
{
    $observacao->Codigo = $dados['Codigo'];
    $observacao->Consultar();
}
else if ($opcao == "Salvar")
{
    $observacao->Codigo = $dados['Codigo'];
    $observacao->Codigo_Reuniao = $dados['Codigo_Reuniao'];
    $observacao->Descricao = $dados['Descricao'];
    $observacao->Salvar();
}
else if ($opcao == "Excluir")
{
    $observacao->Codigo = $dados['Codigo'];
    $observacao->Excluir();
}

$response = array("success" => true, "opcao" => $opcao, "dados" => $observacao);

echo json_encode($response);    

?>