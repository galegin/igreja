<?php 

require_once("../../models/lista/servico.consulta.model.php");

class ServicoService
{
	public static function ListaServicoReuniao($codigo_reuniao)
	{
		$servicoconsulta = new ServicoConsulta();
		$servicoconsulta->Codigo_Reuniao = $codigo_reuniao;
		return $servicoconsulta->Listar();
	}
}
?>