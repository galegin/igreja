<?php 

require_once("../../models/lista/reuniao.model.php");
require_once("../../models/lista/servico.consulta.model.php");

class ServicoService
{
	public static function ListarServicoReuniao($codigo_reuniao)
	{
		$servicoconsulta = new ServicoConsulta();
		$servicoconsulta->Codigo_Reuniao = $codigo_reuniao;
		return $servicoconsulta->Listar();
	}

	//--

	/*
	   0-Servico
       1-Batismo
       2-Culto Ensinamento
       3-Santa Ceia
       4-Coleta
       5-Reuniao Mocidade
    */

	public static function ListarTipoServicoReuniao($codigo_reuniao,$tipo_servico)
	{
		$reuniao = new Reuniao();
		$reuniao->Codigo = $codigo_reuniao;
		$reuniao->Consultar();

		$datainicio = new DataTime();
		$datainicio->setDate(strtoint($reuniao->Data->format("Y")), 1, 1);

		$datatermino = new DataTime();
		$datatermino->setDate(strtoint($reuniao->Data->format("Y")), 12, 31);

		$servicoconsulta = new ServicoConsulta();
		$servicoconsulta->Data_Inicio = $datainicio;
		$servicoconsulta->Data_Termino = $datatermino;
		$servicoconsulta->Tipo_Servico = $tipo_servico;
		$servicoconsulta->Listar_Igreja = ($tipo_servico == 2) || ($tipo_servico == 3);
		return $servicoconsulta->Listar();
	}

	public static function ListarBatismoReuniao($codigo_reuniao)
	{
		return ListarTipoServicoReuniao($codigo_reuniao, 1);
	}

	public static function ListarCultoEnsinamentoReuniao($codigo_reuniao)
	{
		return ListarTipoServicoReuniao($codigo_reuniao, 2);
	}

	public static function ListarSantaCeiaReuniao($codigo_reuniao)
	{
		return ListarTipoServicoReuniao($codigo_reuniao, 3);
	}

	public static function ListarReuniaoMocidadeBatismoReuniao($codigo_reuniao)
	{
		return ListarTipoServicoReuniao($codigo_reuniao, 5);
	}

	//--

	public static function ListarColetaReuniao($codigo_reuniao)
	{
		$servicoconsulta = new ServicoConsulta();
		$servicoconsulta->Codigo_Reuniao = $codigo_reuniao;
		$servicoconsulta->Tipo_Servico = 4;
		return $servicoconsulta->Listar();
	}
}
?>