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
    $localidade->Tipo_Logradouro = $_POST['Tipo_Logradouro'];
    $localidade->Logradouro = $_POST['Logradouro'];
    $localidade->Numero_Logradouro = $_POST['Numero_Logradouro'];
    $localidade->Bairro = $_POST['Bairro'];
    $localidade->Cidade = $_POST['Cidade'];
    $localidade->Tipo_Imovel = $_POST['Tipo_Imovel'];
    $localidade->Acomodacao = $_POST['Acomodacao'];
    $localidade->Comodatario = $_POST['Comodatario'];
    $localidade->Metragem = $_POST['Metragem'];
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