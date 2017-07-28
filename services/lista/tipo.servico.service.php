<?php 

require_once("../../models/lista/tipo.servico.model.php");

class TipoServicoService
{
	public static function BuscarTipoServicoTipo($tipo_servico)
	{
		$tiposervico = new TipoServico();
		return $tiposervico->ConsultarObj("Tipo = " . $tipo_servico);
	}
}
?>