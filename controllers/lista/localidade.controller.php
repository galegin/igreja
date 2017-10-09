<?php

$METHOD = "localidade.controller.php";

require_once("../../models/logger.php");
require_once("../../models/objeto.php");
require_once("../../models/contexto.php");
require_once("../../models/lista/localidade.model.php");

$opcao = $_POST['opcao'];
Logger::Instance()->Info($METHOD, "opcao: " . $opcao);
$dados = $_POST['dados'];
Logger::Instance()->Info($METHOD, "dados: " . json_encode($dados));

$localidade = new Localidade();
Objeto::SetValues($localidade, $dados);

if ($opcao == "Consultar")
    $localidade = Contexto::Instance()->GetObjeto(get_class($localidade), "Codigo = " . $dados["Codigo"]);
else if ($opcao == "Salvar" || $opcao == "Incluir" || $opcao == "Alterar")
    Contexto::Instance()->SetObjeto($localidade);
else if ($opcao == "Excluir")
    Contexto::Instance()->RemObjeto($localidade);

$response = array("success" => true, "opcao" => $opcao, "dados" => $localidade);
Logger::Instance()->Info($METHOD, "response: " . json_encode($response));

echo json_encode($response);    

?>