<?php

require_once("../../models/lista/agenda.model.php");

$agenda = new Agenda();

$opcao = $_POST['opcao'];

if ($opcao == "Consultar")
{
    $agenda->Codigo = $_POST['Codigo'];
    $agenda->Consultar();
}
else if ($opcao == "Salvar")
{
    $agenda->Codigo = $_POST['Codigo'];
    $agenda->Codigo_Tipo_Servico = $_POST['Codigo_Tipo_Servico'];
    $agenda->Codigo_Localidade = $_POST['Codigo_Localidade'];
    $agenda->Dia_Semana = $_POST['Dia_Semana'];
    $agenda->Semana_Mes = $_POST['Semana_Mes'];
    $agenda->Hora = $_POST['Hora'];
    $agenda->Complemento = $_POST['Complemento'];
    $agenda->Atendente = $_POST['Atendente'];
    $agenda->Data_Apresentacao = $_POST['Data_Apresentacao'];
    $agenda->Salvar();
}
else if ($opcao == "Excluir")
{
    $agenda->Codigo = $_POST['Codigo'];
    $agenda->Excluir();
}

$response = array("success" => true, "opcao" => $opcao, "dados" => $agenda);

echo json_encode($response);    

?>