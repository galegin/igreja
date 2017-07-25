<?php

require_once("../../models/lista/servico.model.php");

$opcao = $_POST['opcao'];
Logger::Instance()->Info("servico.controller.php", "opcao: " . $opcao);
$dados = $_POST['dados'];
Logger::Instance()->Info("servico.controller.php", "dados: " . json_encode($dados));

$servico = new Atendente();

if ($opcao == "Consultar")
{
    $servico->Codigo = $dados['Codigo'];
    $servico->Consultar();
}
else if ($opcao == "Salvar")
{
    $servico->Codigo = $dados['Codigo'];
    $servico->Codigo_Reuniao = $dados['Codigo_Reuniao'];
    $servico->Codigo_Tipo_Servico = $dados['Codigo_Tipo_Servico'];
    $servico->Codigo_Localidade = $dados['Codigo_Localidade'];
    $servico->Data_Inicio = $dados['Data_Inicio'];
    $servico->Data_Termino = $dados['Data_Termino'];
    $servico->Hora_Inicio = $dados['Hora_Inicio'];
    $servico->Hora_Termino = $dados['Hora_Termino'];
    $servico->Complemento = $dados['Complemento'];
    $servico->Qtde_Irmao = $dados['Qtde_Irmao'];
    $servico->Qtde_Irma = $dados['Qtde_Irma'];
    $servico->Salvar();
}
else if ($opcao == "Excluir")
{
    $servico->Codigo = $dados['Codigo'];
    $servico->Excluir();
}

$response = array("success" => true, "opcao" => $opcao, "dados" => $servico);

echo json_encode($response);    

?>