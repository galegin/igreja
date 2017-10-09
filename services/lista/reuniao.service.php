<?php 

require_once("../../models/contexto.php");
require_once("../../models/lista/reuniao.model.php");

class ReuniaoService
{
	public static function ReuniaoAtual()
	{
		$data = new DateTime();
		$where = 
			"Data = (" . 
				"select max(Data) " . 
				"from Reuniao " . 
				"where Data <= '" . $data->format('Y-m-d H:i:s') . "')";
		return Contexto::Instance()->GetObjeto("Reuniao", $where);
	}
}
?>