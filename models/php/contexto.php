<?php

class Contexto
{
	public function GetLista($class, $where = "")
	{
		$retorno = new ArrayObject();
		$sql = Comando::GetSelect($class, $where);
		$query = $this->_conexao->GetConsulta($sql);
		foreach ($lista as $row) 
		{
			$obj = new $class();
			$retorno->append($obj);
			foreach ($obj as $propName => $value) 
				$obj->{$propName} = $row[$propName];
		}
	}

	public function SetLista($objs)
	{
		foreach ($objs as $obj) 
		{
			$sql = Comando::GetSelect($obj);
			$query = $this->_conexao->GetConsulta($sql)
			$existe = $query->fetch();
			$cmd = "";
			if ($existe)
				$cmd = Comando::GetUpdate($obj);
			else
				$cmd = Comando::GetInsert($obj);
			$this->_conexao->ExecComando($sql)
		}
	}
	
	public function RemLista($objs)
	{
		foreach ($objs as $obj) 
		{
			$cmd = Comando::GetDelete($obj);
			$this->_conexao->ExecComando($sql)
		}
	}
}

?>