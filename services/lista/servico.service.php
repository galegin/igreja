<?php 

require_once("../../models/lista/reuniao.model.php");
require_once("../../models/lista/tipo.servico.model.php");
require_once("../../models/lista/localidade.model.php");
require_once("../../models/lista/servico.consulta.model.php");
require_once("../../models/lista/igreja.servico.consulta.model.php");

class ServicoService
{
	public static function GetChave($servico,$reuniao,$tiposervico)
	{
		$chave = 
            ($servico->Codigo_Servico ?: 'null') . ',' . 
            ($servico->Codigo_Reuniao ?: $reuniao->Codigo ?: 'null') . ',' . 
            ($servico->Codigo_Tipo_Servico ?: $tiposervico->Codigo ?: 'null') . ',' . 
            ($servico->Codigo_Localidade ?: 'null') ;
        //echo '$chave ' . $chave . ' ';
        return $chave;
    }

	public static function GetChaveComp($servico,$reuniao,$tiposervico)
	{
        $chavecomp = 
            ($servico->Codigo_Servico ?: '0') . '_' . 
            ($servico->Codigo_Reuniao ?: $reuniao->Codigo ?: '0') . '_' . 
            ($servico->Codigo_Tipo_Servico ?: $tiposervico->Codigo ?: '0') . '_' . 
            ($servico->Codigo_Localidade ?: '0') ;
        //echo '$chavecomp ' . $chavecomp . ' ';		
        return $chavecomp;
	}

	//--

	public static function ListarServicoReuniao($codigo_reuniao)
	{
		$servicoconsulta = new ServicoConsulta();
		$servicoconsulta->Codigo_Reuniao = $codigo_reuniao;
		return $servicoconsulta->Listar();
	}

	//--

	public static function ListarTipoServicoReuniao($codigo_reuniao,$tipo_servico)
	{
		$reuniao = new Reuniao();
		$reuniao->Codigo = $codigo_reuniao;
		$reuniao->Consultar();

		$ano = explode("-", $reuniao->Data)[0];

		$datainicio = new DateTime();
		$datainicio->setDate($ano, 1, 1);

		$datatermino = new DateTime();
		$datatermino->setDate($ano, 12, 31);

		$servicoconsulta = new ServicoConsulta();
		$servicoconsulta->Data_Inicio = $datainicio->format('Y-m-d');
		$servicoconsulta->Data_Termino = $datatermino->format('Y-m-d');
		$servicoconsulta->Tipo_Servico = $tipo_servico;
		return $servicoconsulta->Listar();
	}

	public static function ListarBatismoReuniao($codigo_reuniao)
	{
		return self::ListarTipoServicoReuniao($codigo_reuniao, TS_BATISMO);
	}

	public static function ListarReuniaoMocidadeReuniao($codigo_reuniao)
	{
		return self::ListarTipoServicoReuniao($codigo_reuniao, TS_REUNIAOMOCIDADE);
	}

	//-- por igreja

	public static function ListarIgrejaTipoServicoReuniao($codigo_reuniao,$tipo_servico)
	{
		$reuniao = new Reuniao();
		$reuniao->Codigo = $codigo_reuniao;
		$reuniao->Consultar();

		$ano = explode("-", $reuniao->Data)[0];

		$datainicio = new DateTime();
		$datainicio->setDate($ano, 1, 1);

		$datatermino = new DateTime();
		$datatermino->setDate($ano, 12, 31);

		$igrejaservicoconsulta = new IgrejaServicoConsulta();
		$igrejaservicoconsulta->Data_Inicio = $datainicio->format('Y-m-d');
		$igrejaservicoconsulta->Data_Termino = $datatermino->format('Y-m-d');
		$igrejaservicoconsulta->Tipo_Servico = $tipo_servico;
		$igrejaservicoconsulta->Tipo_Localidade = TL_IGREJA;
		return $igrejaservicoconsulta->Listar();
	}

	public static function ListarCultoEnsinamentoReuniao($codigo_reuniao)
	{
		return self::ListarIgrejaTipoServicoReuniao($codigo_reuniao, TS_CULTOENSINAMENTO);
	}

	public static function ListarSantaCeiaReuniao($codigo_reuniao)
	{
		return self::ListarIgrejaTipoServicoReuniao($codigo_reuniao, TS_SANTACEIA);
	}

	//--

	public static function ListarColetaReuniao($codigo_reuniao)
	{
		$servicoconsulta = new IgrejaServicoConsulta();
		$servicoconsulta->Codigo_Reuniao = $codigo_reuniao;
		$servicoconsulta->Tipo_Servico = TS_COLETA;
		return $servicoconsulta->Listar();
	}
}
?>