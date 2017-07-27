<?php 

require_once("../../models/lista/servico.model.php");

class ServicoLista
{
	public $Codigo;
	public $Codigo_Reuniao;
	public $Descricao_Reuniao;
	public $Codigo_Tipo_Servico;
	public $Descricao_Tipo_Servico;
	public $Codigo_Localidade;
	public $Nome_Localidade;
	public $Data_Inicio;
	public $Data_Termino;
	public $Hora_Inicio;
	public $Hora_Termino;
	public $Complemento;
	public $Atendente;
	public $Qtde_Irmao;
	public $Qtde_Irma;

	public function SetRecord($record)
	{
		$this->Codigo = $record["Codigo"];
        $this->Codigo_Reuniao = $record["Codigo_Reuniao"];
        $this->Descricao_Reuniao = $record["Descricao_Reuniao"];
        $this->Codigo_Tipo_Servico = $record["Codigo_Tipo_Servico"];
        $this->Descricao_Tipo_Servico = $record["Descricao_Tipo_Servico"];
        $this->Codigo_Localidade = $record["Codigo_Localidade"];
        $this->Nome_Localidade = $record["Nome_Localidade"];
        $this->Data_Inicio = $record["Data_Inicio"];
        $this->Data_Termino = $record["Data_Termino"];
        $this->Hora_Inicio = $record["Hora_Inicio"];
        $this->Hora_Termino = $record["Hora_Termino"];
        $this->Complemento = $record["Complemento"];
        $this->Atendente = $record["Atendente"];
        $this->Qtde_Irmao = $record["Qtde_Irmao"];
        $this->Qtde_Irma = $record["Qtde_Irma"];
	}
}

class ServicoService
{
	public static function ListaServicoReuniao($codigo_reuniao)
	{
		$sql = 
			'select s.Codigo ' .
			', s.Codigo_Reuniao ' .
			', r.Descricao as Descricao_Reuniao ' .
			', s.Codigo_Tipo_Servico ' .
			', t.Descricao as Descricao_Tipo_Servico ' .
			', s.Codigo_Localidade ' .
			', l.Nome as Nome_Localidade ' .
			', s.Data_Inicio ' .
			', s.Data_Termino ' .
			', s.Hora_Inicio ' .
			', s.Hora_Termino ' .
			', s.Complemento ' .
			', s.Atendente ' .
			', s.Qtde_Irmao ' .
			', s.Qtde_Irma ' .
			'from Servico s ' .
			'inner join Reuniao r on (r.Codigo = s.Codigo_Reuniao) ' .
			'inner join TipoServico t on (t.Codigo = s.Codigo_Tipo_Servico) ' .
			'inner join Localidade l on (l.Codigo = s.Codigo_Localidade) ' .
			'where s.Codigo_Reuniao = ' . $codigo_reuniao . ' ' .
			'order by t.Ordem, t.Descricao, s.Data_Inicio, s.Hora_Inicio, l.Nome ';
		//echo $sql;
		$servico = new Servico();
		$query = $servico->GetLista($sql);
		$lista = new ArrayObject();
		foreach ($query as $record) {
			$obj = new ServicoLista();
			$obj->SetRecord($record);
			$lista->append($obj);
		}
		return $lista;
	}
}
?>