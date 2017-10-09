<?php 

require_once("../../models/contexto.php");
require_once("../../models/lista/localidade.model.php");

class LocalidadeService
{
	public static function ListarTodas()
	{
        return Contexto::Instance()->GetLista("Localidade");
	}
}
?>