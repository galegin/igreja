<?php 

require_once("../../models/lista/tipo.servico.model.php");

class TipoServicoService
{
	public static function BuscarTipoServicoTipo($tipo_servico)
	{
		$tiposervico = new TipoServico();
		return $tiposervico->Consultar("Tipo = " . $tipo_servico);
	}

	public static function ListarTodas()
	{
        $tiposervico = new TipoServico();
        return $tiposervico->Listar();
	}	
}
?>