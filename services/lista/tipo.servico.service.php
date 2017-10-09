<?php 

require_once("../../models/contexto.php");
require_once("../../models/lista/tipo.servico.model.php");

class TipoServicoService
{
	public static function BuscarTipoServicoTipo($tipo_servico)
	{
		return Contexto::Instance()->GetObjeto("TipoServico", "Tipo = " . $tipo_servico);
	}

	public static function ListarTodas()
	{
        return Contexto::Instance()->GetLista("TipoServico");
	}
}
?>