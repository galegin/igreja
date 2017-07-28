<?php 

require_once("../../models/consulta.php");

class ServicoConsulta extends Consulta
{
	public $Codigo;
	public $Codigo_Reuniao;
	public $Descricao_Reuniao;
	public $Codigo_Tipo_Servico;
	public $Descricao_Tipo_Servico;
	public $Tipo_Servico;
	public $Ordem_Servico;
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

	protected function GetCmdListar()
	{
		$where = '';

		if (isset($this->Codigo_Reuniao))
			$where = $where . ($where != "" ? "where " : " and") .
				"s.Codigo_Reuniao = " . $this->Codigo_Reuniao . " " ;
		if (isset($this->Codigo_Tipo_Servico))
			$where = $where . ($where != "" ? "where " : " and") .
				"s.Codigo_Tipo_Servico = " . $this->Codigo_Tipo_Servico . " " ;
		if (isset($this->Tipo_Servico))
			$where = $where . ($where != "" ? "where " : " and") .
				"t.Tipo = " . $this->Tipo_Servico . " " ;
		if (isset($this->Codigo_Localidade))
			$where = $where . ($where != "" ? "where " : " and") .
				"s.Codigo_Localidade = " . $this->Codigo_Localidade . " " ;
		if (isset($this->Data_Inicio))
			$where = $where . ($where != "" ? "where " : " and") .
				"s.Data_Inicio >= '" . $this->Data_Inicio . "' " ;
		if (isset($this->Data_Termino))
			$where = $where . ($where != "" ? "where " : " and") .
				"s.Data_Inicio <= '" . $this->Data_Termino . "' " ;

		echo $where;

		return
			'select s.Codigo ' .
			', s.Codigo_Reuniao ' .
			', r.Descricao as Descricao_Reuniao ' .
			', s.Codigo_Tipo_Servico ' .
			', t.Descricao as Descricao_Tipo_Servico ' .
			', t.Tipo as Tipo_Servico ' .
			', t.Ordem as Ordem_Servico ' .
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
			$where .
			'order by t.Ordem, t.Descricao, s.Data_Inicio, s.Hora_Inicio, l.Nome ';
	}
}
?>