<?php

$METHOD = "reuniao.controller.php";

require_once("../../models/logger.php");
require_once("../../models/objeto.php");
require_once("../../models/contexto.php");
require_once("../../models/lista/reuniao.model.php");

$opcao = $_POST['opcao'];
Logger::Instance()->Info($METHOD, "opcao: " . $opcao);
$dados = $_POST['dados'];
Logger::Instance()->Info($METHOD, "dados: " . json_encode($dados));

$reuniao = new Reuniao();
Objeto::SetValues($reuniao, $dados);

if ($opcao == "Consultar")
    $reuniao = Contexto::Instance()->GetObjeto(get_class($reuniao), "Codigo = " . $dados["Codigo"]);
else if ($opcao == "Salvar" || $opcao == "Incluir" || $opcao == "Alterar")
    Contexto::Instance()->SetObjeto($reuniao);
else if ($opcao == "Excluir")
    Contexto::Instance()->RemObjeto($reuniao);

$response = array("success" => true, "opcao" => $opcao, "dados" => $reuniao);
Logger::Instance()->Info($METHOD, "response: " . json_encode($response));

echo json_encode($response);    

?>