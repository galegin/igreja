<?php

$METHOD = "apresentacao.controller.php";

require_once("../../models/logger.php");
require_once("../../models/objeto.php");
require_once("../../models/contexto.php");
require_once("../../models/lista/apresentacao.model.php");

$opcao = $_POST['opcao'];
Logger::Instance()->Info($METHOD, "opcao: " . $opcao);
$dados = $_POST['dados'];
Logger::Instance()->Info($METHOD, "dados: " . json_encode($dados));

$apresentacao = new Apresentacao();
Objeto::SetValues($apresentacao, $dados);

if ($opcao == "Consultar")
    $apresentacao = Contexto::Instance()->GetObjeto(get_class($apresentacao), "Codigo = " . $dados["Codigo"]);
else if ($opcao == "Salvar" || $opcao == "Incluir" || $opcao == "Alterar")
    Contexto::Instance()->SetObjeto($apresentacao);
else if ($opcao == "Excluir")
    Contexto::Instance()->RemObjeto($apresentacao);

$response = array("success" => true, "opcao" => $opcao, "dados" => $apresentacao);
Logger::Instance()->Info($METHOD, "response: " . json_encode($response));

echo json_encode($response);    

?>