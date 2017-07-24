<?php

require_once("../../models/lista/servico.model.php");

$servico = new Atendente();

$opcao = $_POST['opcao'];

if ($opcao == "Consultar")
{
    $servico->Codigo = $_POST['Codigo'];
    $servico->Consultar();
}
else if ($opcao == "Salvar")
{
    $servico->Codigo = $_POST['Codigo'];
    $servico->Codigo_Reuniao = $_POST['Codigo_Reuniao'];
    $servico->Codigo_Tipo_Servico = $_POST['Codigo_Tipo_Servico'];
    $servico->Codigo_Localidade = $_POST['Codigo_Localidade'];
    $servico->Data_Inicio = $_POST['Data_Inicio'];
    $servico->Data_Termino = $_POST['Data_Termino'];
    $servico->Hora_Inicio = $_POST['Hora_Inicio'];
    $servico->Hora_Termino = $_POST['Hora_Termino'];
    $servico->Complemento = $_POST['Complemento'];
    $servico->Qtde_Irmao = $_POST['Qtde_Irmao'];
    $servico->Qtde_Irma = $_POST['Qtde_Irma'];
    $servico->Salvar();
}
else if ($opcao == "Excluir")
{
    $servico->Codigo = $_POST['Codigo'];
    $servico->Excluir();
}

$response = array("success" => true, "opcao" => $opcao, "dados" => $servico);

echo json_encode($response);    

?>