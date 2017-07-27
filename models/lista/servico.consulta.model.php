<?php 

require_once("../../models/consulta.php");

class ServicoConsulta extends Consulta
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

	protected function GetCmdListar()
	{
		return
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
			'where s.Codigo_Reuniao = ' . $this->Codigo_Reuniao . ' ' .
			'order by t.Ordem, t.Descricao, s.Data_Inicio, s.Hora_Inicio, l.Nome ';
	}
}
?>