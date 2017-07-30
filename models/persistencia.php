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

    protected function GetCmdConsultar($where = "")
    {
        if ($where != "")
            $where = " where " . $where ;
        else
            $where = " where Codigo = " . $this->{'Codigo'} . "" ;

        $sql = 
            "select * from " . get_class($this) .
            $where ;

        echo $sql;
        Logger::Instance()->Info("Pesistencia.GetCmdConsultar", "sql: " . $sql);

        return $sql;
    }

    protected function GetCmdIncluir()
    {
        $names = "";
        $values = "";

        foreach ($this as $propName => $propValue)
        {
            $names = $names . ($names != "" ? "," : "") . 
                $propName;
            $values = $values . ($values != "" ? "," : "") . 
                (isset($propValue) && $propValue != "" ? "'" . $propValue . "'" : "null") ;
        }

        $sql = 
            "insert into " . get_class($this) .
            " (" . $names . ") values (" . $values . ") " ;

        echo $sql;
        Logger::Instance()->Info("Pesistencia.GetCmdIncluir", "sql: " . $sql);

        return $sql;        
    }

    protected function GetCmdAlterar()
    {
        $sets = "";

        foreach ($this as $propName => $propValue)
            if ($propName != "Codigo")
                $sets = $sets . ($sets != "" ? ", " : "") . 
                    $propName . " = " . (isset($propValue) && $propValue != "" ? "'" . $propValue . "'" : "null") ;

        $sql = 
            "update " . get_class($this) . 
            " set " . $sets . 
            " where Codigo = " . $this->{'Codigo'} . "" ;

        echo $sql;
        Logger::Instance()->Info("Pesistencia.GetCmdAlterar", "sql: " . $sql);

        return $sql;        
    }

    protected function GetCmdExcluir()
    {
        $sql = 
            "delete from " . get_class($this) . 
            " where Codigo = " . $this->{'Codigo'} . "" ;

        echo $sql;
        Logger::Instance()->Info("Pesistencia.GetCmdExcluir", "sql: " . $sql);

        return $sql;
    }

    //--

    public function Consultar($where = "")
    {
        $record = $this->GetConsulta($this->GetCmdConsultar($where));
        
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