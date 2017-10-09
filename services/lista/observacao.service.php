<?php 

require_once("../../models/contexto.php");
require_once("../../models/lista/observacao.model.php");
require_once("../../models/lista/reuniao.model.php");

class ObservacaoService
{
	public static function GetChave($observacao,$reuniao)
	{
		$chave = 
            ($observacao->Codigo ?: 'null') . ',' . 
            ($observacao->Codigo_Reuniao ?: $reuniao->Codigo ?: 'null') ;
        return $chave;
    }

	public static function GetChaveComp($observacao,$reuniao)
	{
        $chavecomp = 
            ($observacao->Codigo ?: '0') . '_' . 
            ($observacao->Codigo_Reuniao ?: $reuniao->Codigo ?: '0') ;
        return $chavecomp;
	}

	//--

	public static function ListarObservacaoReuniao($reuniao)
	{
		$where = 
            "Codigo_Reuniao = " . $reuniao->Codigo;
		return Contexto::Instance()->GetLista("Observacao", $where);
	}
}
?>