<?php 

require_once("modulo.php");

abstract class Persistencia
{
	private $_conexao;

	public function Pesistencia()
	{
	}

    protected function GetConexao()
    {
        if (!isset($this->_conexao))
            $this->_conexao = Modulo::Instance()->ConexaoAmbiente();

        return $this->_conexao;
    }

    //--

    protected function GetLista($sql)
    {
        return $this->GetConexao()->GetLista($sql);
    }

    protected function GetConsulta($sql)
    {
        return $this->GetConexao()->GetConsulta($sql);
    }

    protected function ExecComando($cmd)
    {
        return $this->GetConexao()->ExecComando($cmd);
    }

    //--

    abstract protected function SetRecord($record);

    //--

	abstract protected function GetCmdListar();
    abstract protected function GetCmdConsultar();
    abstract protected function GetCmdIncluir();
    abstract protected function GetCmdAlterar();
    abstract protected function GetCmdExcluir();

    //--

    public function Listar()
    {
    	return $this->GetLista($this->GetCmdListar());
    }

    public function Consultar()
    {
    	$record = $this->GetConsulta($this->GetCmdConsultar());
    	
    	$this->SetRecord($record);

    	return $record;
    }

    //--

    public function Incluir()
    {
    	return $this->ExecComando($this->GetCmdIncluir());
    }

    public function Alterar()
    {
    	return $this->ExecComando($this->GetCmdAlterar());
    }

    public function Excluir()
    {
		return $this->ExecComando($this->GetCmdExcluir());
    }

    //--

 	public function Salvar()
    {
        $record = $this->GetConsulta($this->GetCmdConsultar());

    	if (!isset($record))
    		return $this->Incluir();
    	else
    		return $this->Alterar();
    }
}
?>