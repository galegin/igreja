<?php

$METHOD = "tipo.servico.controller.php";

require_once("../../models/logger.php");
require_once("../../models/objeto.php");
require_once("../../models/contexto.php");
require_once("../../models/lista/tipo.servico.model.php");

$opcao = $_POST['opcao'];
Logger::Instance()->Info($METHOD, "opcao: " . $opcao);
$dados = $_POST['dados'];
Logger::Instance()->Info($METHOD, "dados: " . json_encode($dados));

$tiposervico = new TipoServico();
Objeto::SetValues($tiposervico, $dados);

if ($opcao == "Consultar")
    $tiposervico = Contexto::Instance()->GetObjeto(get_class($tiposervico), "Codigo = " . $dados["Codigo"]);
else if ($opcao == "Salvar" || $opcao == "Incluir" || $opcao == "Alterar")
    Contexto::Instance()->SetObjeto($tiposervico);
else if ($opcao == "Excluir")
    Contexto::Instance()->RemObjeto($tiposervico);

$response = array("success" => true, "opcao" => $opcao, "dados" => $tiposervico);
Logger::Instance()->Info($METHOD, "response: " . json_encode($response));

echo json_encode($response);

?>