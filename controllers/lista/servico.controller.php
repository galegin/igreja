<?php

$METHOD = "servico.controller.php";

require_once("../../models/logger.php");
require_once("../../models/objeto.php");
require_once("../../models/contexto.php");
require_once("../../models/lista/servico.model.php");

$opcao = $_POST['opcao'];
Logger::Instance()->Info($METHOD, "opcao: " . $opcao);
$dados = $_POST['dados'];
Logger::Instance()->Info($METHOD, "dados: " . json_encode($dados));

$servico = new Servico();
Objeto::SetValues($servico, $dados);

if ($opcao == "Consultar")
    $servico = Contexto::Instance()->GetObjeto(get_class($servico), "Codigo = " . $dados["Codigo"]);
else if ($opcao == "Salvar" || $opcao == "Incluir" || $opcao == "Alterar")
    Contexto::Instance()->SetObjeto($servico);
else if ($opcao == "Excluir")
    Contexto::Instance()->RemObjeto($servico);

$response = array("success" => true, "opcao" => $opcao, "dados" => $servico);
Logger::Instance()->Info($METHOD, "response: " . json_encode($response));

echo json_encode($response);    

?>