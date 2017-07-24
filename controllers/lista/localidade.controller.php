<?php

require_once("../../models/lista/localidade.model.php");

$localidade = new Localidade();

$opcao = $_POST['opcao'];

if ($opcao == "Consultar")
{
    $localidade->Codigo = $_POST['Codigo'];
    $localidade->Consultar();
}
else if ($opcao == "Salvar")
{
    $localidade->Codigo = $_POST['Codigo'];
    $localidade->Descricao = $_POST['Descricao'];
    $localidade->Tipo = $_POST['Tipo'];
    $localidade->Anciao = $_POST['Anciao'];
    $localidade->Diacono = $_POST['Diacono'];
    $localidade->Cooperador = $_POST['Cooperador'];
    $localidade->Cooperador_Jovem = $_POST['Cooperador_Jovem'];
    $localidade->Encarregado = $_POST['Encarregado'];
    $localidade->Dias_Culto = $_POST['Dias_Culto'];
    $localidade->Dias_Culto_Jovem = $_POST['Dias_Culto_Jovem'];
    $localidade->Salvar();
}
else if ($opcao == "Excluir")
{
    $localidade->Codigo = $_POST['Codigo'];
    $localidade->Excluir();
}

$response = array("success" => true, "opcao" => $opcao, "dados" => $localidade);

echo json_encode($response);    

?>