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

    protected abstract function SetRecord($record);

    //--

    protected abstract function GetCmdListar();
    protected abstract function GetCmdConsultar();
    protected abstract function GetCmdIncluir();
    protected abstract function GetCmdAlterar();
    protected abstract function GetCmdExcluir();

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
        
        if ($record["Codigo"] == 0)
            return $this->Incluir();
        else
            return $this->Alterar();
    }
}
?>