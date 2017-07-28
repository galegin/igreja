<?php 

require_once("../../models/consulta.php");

class IgrejaServicoConsulta extends Consulta
{
	public $Codigo_Localidade;
	public $Nome_Localidade;
	public $Tipo_Localidade;
	public $Codigo_Servico;
	public $Codigo_Reuniao;
	public $Descricao_Reuniao;
	public $Codigo_Tipo_Servico;
	public $Descricao_Tipo_Servico;
	public $Tipo_Servico;
	public $Ordem_Servico;
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
		$where_l = '';
		$where_s = '';

		if (isset($this->Tipo_Localidade))
			$where_l = $where_l. ($where_l != "" ? "and " : "where ") .
				"l.Tipo = " . $this->Tipo_Localidade . " " ;

		if (isset($this->Codigo_Reuniao))
			$where_s = $where_s. ($where_s != "" ? "and " : "where ") .
				"s1.Codigo_Reuniao = " . $this->Codigo_Reuniao . " " ;
		if (isset($this->Codigo_Tipo_Servico))
			$where_s = $where_s. ($where_s != "" ? "and " : "where ") .
				"s1.Codigo_Tipo_Servico = " . $this->Codigo_Tipo_Servico . " " ;
		if (isset($this->Codigo_Localidade))
			$where_s = $where_s. ($where_s != "" ? "and " : "where ") .
				"s1.Codigo_Localidade = " . $this->Codigo_Localidade . " " ;
		if (isset($this->Data_Inicio))
			$where_s = $where_s. ($where_s != "" ? "and " : "where ") .
				"s1.Data_Inicio >= '" . $this->Data_Inicio . "' " ;
		if (isset($this->Data_Termino))
			$where_s = $where_s. ($where_s != "" ? "and " : "where ") .
				"s1.Data_Inicio <= '" . $this->Data_Termino . "' " ;

		if (isset($this->Tipo_Servico))
			$where_s = $where_s. ($where_s != "" ? "and " : "where ") .
				"t1.Tipo = " . $this->Tipo_Servico . " " ;

		//echo '$where_l ' . $where_l . "\n";
		//echo '$where_s ' . $where_s . "\n";
		
		/* $sql =
			'select l.Codigo as Codigo_Localidade ' .
			', l.Nome as Nome_Localidade ' .
			', l.Tipo as Tipo_Localidade ' .
			', s.Codigo as Codigo_Servico' .
			', s.Codigo_Reuniao ' .
			', r.Descricao as Descricao_Reuniao ' .
			', s.Codigo_Tipo_Servico ' .
			', t.Descricao as Descricao_Tipo_Servico ' .
			', t.Tipo as Tipo_Servico ' .
			', t.Ordem as Ordem_Servico ' .
			', s.Data_Inicio ' .
			', s.Data_Termino ' .
			', s.Hora_Inicio ' .
			', s.Hora_Termino ' .
			', s.Complemento ' .
			', s.Atendente ' .
			', s.Qtde_Irmao ' .
			', s.Qtde_Irma ' .
			'from Localidade l ' .
			'left outer join Servico s on (s.Codigo_Localidade = l.Codigo' . $where_s . ') ' .
			'left outer join Reuniao r on (r.Codigo = s.Codigo_Reuniao) ' .
			'left outer join TipoServico t on (t.Codigo = s.Codigo_Tipo_Servico' . $where_t . ') ' .
			$where_l .
			'order by l.Nome' ; */

		$sql =
			'select l.Codigo as Codigo_Localidade ' .
			', l.Nome as Nome_Localidade ' .
			', l.Tipo as Tipo_Localidade ' .
			', s.Codigo_Servico ' .
			', s.Codigo_Reuniao ' .
			', s.Descricao_Reuniao ' .
			', s.Codigo_Tipo_Servico ' .
			', s.Descricao_Tipo_Servico ' .
			', s.Tipo_Servico ' .
			', s.Ordem_Servico ' .
			', s.Data_Inicio ' .
			', s.Data_Termino ' .
			', s.Hora_Inicio ' .
			', s.Hora_Termino ' .
			', s.Complemento ' .
			', s.Atendente ' .
			', s.Qtde_Irmao ' .
			', s.Qtde_Irma ' .
			'from Localidade l  ' .
			'left outer join ( ' .
			    'select s1.* ' .
			    ', s1.Codigo as Codigo_Servico ' .
			    ', r1.Descricao as Descricao_Reuniao ' .
			    ', t1.Descricao as Descricao_Tipo_Servico ' .
			    ', t1.Tipo as Tipo_Servico ' .
			    ', t1.Ordem as Ordem_Servico ' .
			    'from Servico s1 ' .
			    'inner join Reuniao r1 on (r1.Codigo = s1.Codigo_Reuniao) ' .
			    'inner join TipoServico t1 on (t1.Codigo = s1.Codigo_Tipo_Servico) ' .
			    //'where s1.Data_Inicio >= '2017-01-01' and s1.Data_Inicio <= '2017-12-31' ' .
			    //'and t1.Tipo = 2 ' .
				$where_s .
			') s on (s.Codigo_Localidade = l.Codigo) ' .
			//'where l.Tipo = 1 ' .
			$where_l .
			'order by l.Nome ' ;

		echo $sql;

		return $sql;
	}

	public function GetAtendente($index)
	{		
		$atendente = '/' . (isset($this->Atendente) ? $this->Atendente : '') . '/';
		$atendentes = explode("/", $atendente);
		return $atendentes[$index];
	}
}
?>