<?php 

require_once("modulo.php");
require_once("consulta.php");

abstract class Persistencia extends Consulta
{
    public function Pesistencia()
    {
    }

    //--

    public function GetConsulta($sql)
    {
        return $this->GetConexao()->GetConsulta($sql);
    }

    public function ExecComando($cmd)
    {
        return $this->GetConexao()->ExecComando($cmd);
    }

    //--

    protected abstract function GetCmdConsultar();
    protected abstract function GetCmdIncluir();
    protected abstract function GetCmdAlterar();
    protected abstract function GetCmdExcluir();

    //--

    public function ConsultarObj($where)
    {
        $sql = $this->GetCmdListar() . (isset($where) ? " where " : "") . $where;
        
        $record = $this->GetConsulta($sql);
        
        $this->SetValues($record);

        return $this;
    }

    public function Consultar()
    {
        $record = $this->GetConsulta($this->GetCmdConsultar());
        
        $this->SetValues($record);

        return $this;
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