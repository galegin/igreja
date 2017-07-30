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
        return $chave;
    }

	public static function GetChaveComp($servico,$reuniao,$tiposervico)
	{
        $chavecomp = 
            ($servico->Codigo_Servico ?: '0') . '_' . 
            ($servico->Codigo_Reuniao ?: $reuniao->Codigo ?: '0') . '_' . 
            ($servico->Codigo_Tipo_Servico ?: $tiposervico->Codigo ?: '0') . '_' . 
            ($servico->Codigo_Localidade ?: '0') ;
        return $chavecomp;
	}

	//--

	public static function ListarServicoReuniao($reuniao)
	{
		$servicoconsulta = new ServicoConsulta();
		$servicoconsulta->Codigo_Reuniao = $reuniao->Codigo;
		return $servicoconsulta->Listar();
	}

	//--

	public static function PrimeiroDiaAno($data)
	{
		$ano = date("Y", strtotime($data));
		$datainicio = new DateTime();
		$datainicio->setDate($ano, 1, 1);
		return $datainicio;
	}

	public static function UltimoDiaAno($data)
	{
		$ano = date("Y", strtotime($data));
		$datatermino = new DateTime();
		$datatermino->setDate($ano, 12, 31);
		return $datatermino;
	}

	//--

	public static function ListarTipoServicoReuniao($reuniao,$tipo_servico)
	{
		$datainicio = self::PrimeiroDiaAno($reuniao->Data);
		$datatermino = self::UltimoDiaAno($reuniao->Data);

		$servicoconsulta = new ServicoConsulta();
		$servicoconsulta->Data_Inicio = $datainicio->format('Y-m-d');
		$servicoconsulta->Data_Termino = $datatermino->format('Y-m-d');
		$servicoconsulta->Tipo_Servico = $tipo_servico;
		return $servicoconsulta->Listar();
	}

	public static function ListarBatismoReuniao($reuniao)
	{
		return self::ListarTipoServicoReuniao($reuniao, TS_BATISMO);
	}

	public static function ListarReuniaoMocidadeReuniao($reuniao)
	{
		return self::ListarTipoServicoReuniao($reuniao, TS_REUNIAOMOCIDADE);
	}

	//-- por igreja

	public static function ListarIgrejaTipoServicoReuniao($reuniao,$tipo_servico)
	{
		$datainicio = self::PrimeiroDiaAno($reuniao->Data);
		$datatermino = self::UltimoDiaAno($reuniao->Data);

		$igrejaservicoconsulta = new IgrejaServicoConsulta();
		$igrejaservicoconsulta->Data_Inicio = $datainicio->format('Y-m-d');
		$igrejaservicoconsulta->Data_Termino = $datatermino->format('Y-m-d');
		$igrejaservicoconsulta->Tipo_Servico = $tipo_servico;
		$igrejaservicoconsulta->Tipo_Localidade = TL_IGREJA;
		return $igrejaservicoconsulta->Listar();
	}

	public static function ListarCultoEnsinamentoReuniao($reuniao)
	{
		return self::ListarIgrejaTipoServicoReuniao($reuniao, TS_CULTOENSINAMENTO);
	}

	public static function ListarSantaCeiaReuniao($reuniao)
	{
		return self::ListarIgrejaTipoServicoReuniao($reuniao, TS_SANTACEIA);
	}

	//--

	public static function ListarColetaReuniao($reuniao)
	{
		$servicoconsulta = new IgrejaServicoConsulta();
		$servicoconsulta->Codigo_Reuniao = $reuniao->Codigo;
		$servicoconsulta->Tipo_Servico = TS_COLETA;
		return $servicoconsulta->Listar();
	}
}
?>