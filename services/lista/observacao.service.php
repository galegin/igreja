<?php 

require_once("../../models/lista/observacao.model.php");

class ObservacaoService
{
	public static function ListarObservacaoReuniao($reuniao)
	{
		$observacao = new Observacao();
		$observacao->Codigo_Reuniao = $reuniao->Codigo;
		return $observacao->Listar();
	}
}
?>