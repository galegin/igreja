<?php 

require_once("../../models/contexto.php");
require_once("../../models/lista/apresentacao.model.php");
require_once("../../models/lista/reuniao.model.php");
require_once("../../models/lista/localidade.model.php");
require_once("../../models/lista/tipo.servico.model.php");

class ApresentacaoService
{
	public static function GetChave($apresentacao,$reuniao,$tipo)
	{
		$chave = 
            ($apresentacao->Codigo ?: 'null') . ',' . 
            ($apresentacao->Codigo_Reuniao ?: $reuniao->Codigo ?: 'null') . ',' .
            ($apresentacao->Tipo ?: $tipo ?: 'null') ; 
        return $chave;
    }

	public static function GetChaveComp($apresentacao,$reuniao,$tipo)
	{
        $chavecomp = 
            ($apresentacao->Codigo ?: '0') . '_' . 
            ($apresentacao->Codigo_Reuniao ?: $reuniao->Codigo ?: '0') . '_' . 
            ($apresentacao->Tipo ?: $tipo ?: '0') ;
        return $chavecomp;
	}

	//--

	public static function ListarApresentacaoReuniao($reuniao,$tipo)
	{
        $where = 
            "Codigo_Reuniao = " . $reuniao->Codigo . " and " .
            "Tipo = " . $tipo;
		return Contexto::Instance()->GetLista("Apresentacao", $where);
	}
	
	public static function ListarConfirmacaoServicoReuniao($reuniao)
	{
		return self::ListarApresentacaoReuniao($reuniao, TA_CONF_SERVICO);
	}
	
	public static function ListarApresentacaoServicoReuniao($reuniao)
	{
		return self::ListarApresentacaoReuniao($reuniao, TA_APRES_SERVICO);
	}
	
	public static function ListarApresentacaoServoReuniao($reuniao)
	{
		return self::ListarApresentacaoReuniao($reuniao, TA_APRES_SERVO);		
	}
}
?>