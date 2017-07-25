<?php

require_once("../../models/lista/reuniao.model.php");

$opcao = $_POST['opcao'];
Logger::Instance()->Info("reuniao.controller.php", "opcao: " . $opcao);
$dados = $_POST['dados'];
Logger::Instance()->Info("reuniao.controller.php", "dados: " . json_encode($dados));

$reuniao = new Reuniao();

if ($opcao == "Consultar")
{
    $reuniao->Codigo = $dados['Codigo'];
    $reuniao->Consultar();
}
else if ($opcao == "Salvar")
{
    $reuniao->Codigo = $dados['Codigo'];
    $reuniao->Descricao = $dados['Descricao'];
    $reuniao->Data = $dados['Data'];
    $reuniao->Data_Proxima = $dados['Data_Proxima'];
    $reuniao->Hora_Inicio = $dados['Hora_Inicio'];
    $reuniao->Nome_Atende = $dados['Nome_Atende'];
    $reuniao->Palavra = $dados['Palavra'];
    $reuniao->Salvar();
}
else if ($opcao == "Excluir")
{
    $reuniao->Codigo = $dados['Codigo'];
    $reuniao->Excluir();
}

$response = array("success" => true, "opcao" => $opcao, "dados" => $reuniao);

echo json_encode($response);    

?>