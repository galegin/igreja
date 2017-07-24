<?php

require_once("../../models/lista/agenda.servico.model.php");

$agendaservico = new AgendaServico();

$opcao = $_POST['opcao'];

if ($opcao == "Consultar")
{
    $agendaservico->Codigo = $_POST['Codigo'];
    $agendaservico->Consultar();
}
else if ($opcao == "Salvar")
{
    $agendaservico->Codigo = $_POST['Codigo'];
    $agendaservico->Codigo_Tipo_Servico = $_POST['Codigo_Tipo_Servico'];
    $agendaservico->Codigo_Localidade = $_POST['Codigo_Localidade'];
    $agendaservico->Dia_Semana = $_POST['Dia_Semana'];
    $agendaservico->Semana_Mes = $_POST['Semana_Mes'];
    $agendaservico->Hora = $_POST['Hora'];
    $agendaservico->Complemento = $_POST['Complemento'];
    $agendaservico->Atendente = $_POST['Atendente'];
    $agendaservico->Data_Apresentacao = $_POST['Data_Apresentacao'];
    $agendaservico->Salvar();
}
else if ($opcao == "Excluir")
{
    $agendaservico->Codigo = $_POST['Codigo'];
    $agendaservico->Excluir();
}

$response = array("success" => true, "opcao" => $opcao, "dados" => $agendaservico);

echo json_encode($response);    

?>