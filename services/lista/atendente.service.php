<?php 

require_once("../../models/contexto.php");
require_once("../../models/lista/atendente.model.php");

class AtendenteService
{
	public static function ListarTodas()
	{
        return Contexto::Instance()->GetLista("Atendente");
	}
}
?>