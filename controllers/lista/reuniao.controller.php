<?php

require_once("../../models/lista/reuniao.model.php");

$reuniao = new Reuniao();

$opcao = $_POST['opcao'];

if ($opcao == "Consultar")
{
    $reuniao->Codigo = $_POST['Codigo'];
    $reuniao->Consultar();
}
else if ($opcao == "Salvar")
{
    $reuniao->Codigo = $_POST['Codigo'];
    $reuniao->Descricao = $_POST['Descricao'];
    $reuniao->Data = $_POST['Data'];
    $reuniao->Data_Proxima = $_POST['Data_Proxima'];
    $reuniao->Hora_Inicio = $_POST['Hora_Inicio'];
    $reuniao->Nome_Atende = $_POST['Nome_Atende'];
    $reuniao->Palavra = $_POST['Palavra'];
    $reuniao->Salvar();
}
else if ($opcao == "Excluir")
{
    $reuniao->Codigo = $_POST['Codigo'];
    $reuniao->Excluir();
}

$response = array("success" => true, "opcao" => $opcao, "dados" => $reuniao);

echo json_encode($response);    

?>