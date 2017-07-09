<?php

require_once("../../models/lista/tipo.servico.model.php");

$tiposervico = new TipoServico();
$tiposervico->Codigo = $_POST['Codigo'];
$tiposervico->Descricao = $_POST['Descricao'];
$tiposervico->Tipo = $_POST['Tipo'];

$opcao = $_POST['opcao'];

if ($opcao == "Consultar")
    $tiposervico->Consultar();
else if ($opcao == "Salvar")
    $tiposervico->Salvar();
else if ($opcao == "Excluir")
    $tiposervico->Excluir();

$response = array("success" => true, "dados" => $tiposervico);

echo json_encode($response);    

?>