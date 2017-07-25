<?php

require_once("../../models/lista/agenda.servico.model.php");

$opcao = $_POST['opcao'];
Logger::Instance()->Info("agenda.servico.controller.php", "opcao: " . $opcao);
$dados = $_POST['dados'];
Logger::Instance()->Info("agenda.servico.controller.php", "dados: " . json_encode($dados));

$agendaservico = new AgendaServico();

if ($opcao == "Consultar")
{
    $agendaservico->Codigo = $dados['Codigo'];
    $agendaservico->Consultar();
}
else if ($opcao == "Salvar")
{
    $agendaservico->Codigo = $dados['Codigo'];
    $agendaservico->Codigo_Tipo_Servico = $dados['Codigo_Tipo_Servico'];
    $agendaservico->Codigo_Localidade = $dados['Codigo_Localidade'];
    $agendaservico->Dia_Semana = $dados['Dia_Semana'];
    $agendaservico->Semana_Mes = $dados['Semana_Mes'];
    $agendaservico->Hora = $dados['Hora'];
    $agendaservico->Complemento = $dados['Complemento'];
    $agendaservico->Atendente = $dados['Atendente'];
    $agendaservico->Data_Apresentacao = $dados['Data_Apresentacao'];
    $agendaservico->Salvar();
}
else if ($opcao == "Excluir")
{
    $agendaservico->Codigo = $dados['Codigo'];
    $agendaservico->Excluir();
}

$response = array("success" => true, "opcao" => $opcao, "dados" => $agendaservico);

echo json_encode($response);    

?>