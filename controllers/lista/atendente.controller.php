<?php

$METHOD = "atendente.controller.php";

require_once("../../models/logger.php");
require_once("../../models/objeto.php");
require_once("../../models/contexto.php");
require_once("../../models/lista/atendente.model.php");

$opcao = $_POST['opcao'];
Logger::Instance()->Info($METHOD, "opcao: " . $opcao);
$dados = $_POST['dados'];
Logger::Instance()->Info($METHOD, "dados: " . json_encode($dados));

$atendente = new Atendente();
Objeto::SetValues($atendente, $dados);

if ($opcao == "Consultar")
    $atendente = Contexto::Instance()->GetObjeto(get_class($atendente), "Codigo = " . $dados["Codigo"]);
else if ($opcao == "Salvar" || $opcao == "Incluir" || $opcao == "Alterar")
    Contexto::Instance()->SetObjeto($atendente);
else if ($opcao == "Excluir")
    Contexto::Instance()->RemObjeto($atendente);

$response = array("success" => true, "opcao" => $opcao, "dados" => $atendente);
Logger::Instance()->Info($METHOD, "response: " . json_encode($response));

echo json_encode($response);    

?>