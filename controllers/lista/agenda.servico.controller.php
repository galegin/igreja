<?php

$METHOD = "agenda.servico.controller.php";

require_once("../../models/logger.php");
require_once("../../models/objeto.php");
require_once("../../models/contexto.php");
require_once("../../models/lista/agenda.servico.model.php");

$opcao = $_POST['opcao'];
Logger::Instance()->Info($METHOD, "opcao: " . $opcao);
$dados = $_POST['dados'];
Logger::Instance()->Info($METHOD, "dados: " . json_encode($dados));

$agendaservico = new AgendaServico();
Objeto::SetValues($agendaservico, $dados);

if ($opcao == "Consultar")
    $agendaservico = Contexto::Instance()->GetObjeto(get_class($agendaservico), "Codigo = " . $dados["Codigo"]);
else if ($opcao == "Salvar")
    Contexto::Instance()->SetObjeto($agendaservico);
else if ($opcao == "Excluir")
    Contexto::Instance()->RemObjeto($agendaservico);

$response = array("success" => true, "opcao" => $opcao, "dados" => $agendaservico);
Logger::Instance()->Info($METHOD, "response: " . json_encode($response));

echo json_encode($response);    

?>