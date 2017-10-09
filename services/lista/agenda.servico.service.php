<?php 

require_once("../../models/contexto.php");
require_once("../../models/lista/agenda.servico.model.php");

class AgendaServicoService
{
	public static function ListarTodas()
	{
        return Contexto::Instance()->GetLista("AgendaServico");
	}
}
?>