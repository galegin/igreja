<?php 

require_once("../../models/lista/agenda.servico.model.php");

class AgendaServicoService
{
	public static function ListarTodas()
	{
        $agendaservico = new AgendaServico();
        return $agendaservico->Listar();
	}
}
?>