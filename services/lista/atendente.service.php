<?php 

require_once("../../models/lista/atendente.model.php");

class AtendenteService
{
	public static function ListarTodas()
	{
        $atendente = new Atendente();
        return $atendente->Listar();
	}
}
?>