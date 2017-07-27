<?php 

require_once("../../models/lista/reuniao.model.php");

class ReuniaoService
{
	public static function ReuniaoAtual()
	{
		$data = new DateTime();
		$dataStr = $data->format('Y-m-d H:i:s');
		$sql = "select * from Reuniao where Data = (select max(Data) from Reuniao where Data <= '$dataStr')";
		$reuniao = new Reuniao();
		$record = $reuniao->GetConsulta($sql);
		$reuniao->Codigo = $record["Codigo"];
		$reuniao->Consultar();
		return $reuniao;
	}
}
?>