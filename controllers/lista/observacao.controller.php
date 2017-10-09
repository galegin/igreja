<?php

$METHOD = "observacao.controller.php";

require_once("../../models/logger.php");
require_once("../../models/objeto.php");
require_once("../../models/contexto.php");
require_once("../../models/lista/observacao.model.php");

$opcao = $_POST['opcao'];
Logger::Instance()->Info($METHOD, "opcao: " . $opcao);
$dados = $_POST['dados'];
Logger::Instance()->Info($METHOD, "dados: " . json_encode($dados));

$observacao = new Observacao();
Objeto::SetValues($observacao, $dados);

if ($opcao == "Consultar")
    $observacao = Contexto::Instance()->GetObjeto(get_class($observacao), "Codigo = " . $dados["Codigo"]);
else if ($opcao == "Salvar" || $opcao == "Incluir" || $opcao == "Alterar")
    Contexto::Instance()->SetObjeto($observacao);
else if ($opcao == "Excluir")
    Contexto::Instance()->RemObjeto($observacao);

$response = array("success" => true, "opcao" => $opcao, "dados" => $observacao);
Logger::Instance()->Info($METHOD, "response: " . json_encode($response));

echo json_encode($response);    

?>