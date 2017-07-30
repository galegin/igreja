<?php 

require_once("../../models/lista/apresentacao.model.php");

class ApresentacaoService
{
	public static function ListarApresentacaoReuniao($reuniao,$tipo)
	{
		$apresentacao = new Apresentacao();
		$apresentacao->Codigo_Reuniao = $reuniao->Codigo;
		$apresentacao->Tipo = $tipo;
		return $apresentacao->Listar();
	}
	
	public static function ListarConfirmacaoServicoReuniao($reuniao)
	{
		return sekf::ListarApresentacaoReuniao($reuniao,TA_CONF_SERVICO);
	}
	
	public static function ListarApresentacaoServicoReuniao($reuniao)
	{
		return sekf::ListarApresentacaoReuniao($reuniao,TA_APRES_SERVICO);
	}
	
	public static function ListarApresentacaoServoReuniao($reuniao)
	{
		return sekf::ListarApresentacaoReuniao($reuniao,TA_APRES_SERVO);		
	}
}
?>