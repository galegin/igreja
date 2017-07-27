<?php

require_once("../../models/lista/tipo.servico.model.php");

$opcao = $_POST['opcao'];
Logger::Instance()->Info("tipo.servico.controller.php", "opcao: " . $opcao);
$dados = $_POST['dados'];
Logger::Instance()->Info("tipo.servico.controller.php", "dados: " . json_encode($dados));

$tiposervico = new TipoServico();

if ($opcao == "Consultar")
{
    $tiposervico->Codigo = $dados['Codigo'];
    $tiposervico->Consultar();
}
else if ($opcao == "Salvar")
{
    $tiposervico->Codigo = $dados['Codigo'];
    $tiposervico->Descricao = $dados['Descricao'];
    $tiposervico->Tipo = $dados['Tipo'];
    $tiposervico->Ordem = $dados['Ordem'];
    $tiposervico->Salvar();
}
else if ($opcao == "Excluir")
{
    $tiposervico->Codigo = $dados['Codigo'];
    $tiposervico->Excluir();
}

$response = array("success" => true, "opcao" => $opcao, "dados" => $tiposervico);

echo json_encode($response);    

?>