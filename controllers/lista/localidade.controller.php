<?php

require_once("../../models/lista/localidade.model.php");

$opcao = $_POST['opcao'];
Logger::Instance()->Info("localidade.controller.php", "opcao: " . $opcao);
$dados = $_POST['dados'];
Logger::Instance()->Info("localidade.controller.php", "dados: " . json_encode($dados));

$localidade = new Localidade();

if ($opcao == "Consultar")
{
    $localidade->Codigo = $dados['Codigo'];
    $localidade->Consultar();
}
else if ($opcao == "Salvar")
{
    $localidade->Codigo = $dados['Codigo'];
    $localidade->Nome = $dados['Nome'];
    $localidade->Tipo = $dados['Tipo'];
    $localidade->Anciao = $dados['Anciao'];
    $localidade->Diacono = $dados['Diacono'];
    $localidade->Cooperador = $dados['Cooperador'];
    $localidade->Cooperador_Jovem = $dados['Cooperador_Jovem'];
    $localidade->Encarregado = $dados['Encarregado'];
    $localidade->Dias_Culto = $dados['Dias_Culto'];
    $localidade->Dias_Culto_Jovem = $dados['Dias_Culto_Jovem'];
    $localidade->Salvar();
}
else if ($opcao == "Excluir")
{
    $localidade->Codigo = $dados['Codigo'];
    $localidade->Excluir();
}

$response = array("success" => true, "opcao" => $opcao, "dados" => $localidade);

echo json_encode($response);    

?>