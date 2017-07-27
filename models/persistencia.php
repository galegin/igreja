<?php 

require_once("modulo.php");
require_once("consulta.php");

abstract class Persistencia extends Consulta
{
    private $_conexao;

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

    public function Consultar()
    {
        $record = $this->GetConsulta($this->GetCmdConsultar());

        foreach ($record as $key => $value) {
            Logger::Instance()->Info("Persistencia.Consultar()", $key . "=" . $value);
        }
        
        $this->SetValues($record);

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