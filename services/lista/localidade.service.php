<?php 

require_once("../../models/lista/localidade.model.php");

class LocalidadeService
{
	public static function ListarTodas()
	{
        $localidade = new Localidade();
        return $localidade->Listar();
	}
}
?>