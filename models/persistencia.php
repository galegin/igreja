<?php 

require_once("modulo.php");
require_once("consulta.php");

abstract class Persistencia extends Consulta
{
    //--

    protected function GetCmdConsultar($where = "")
    {
        $METHOD = "Pesistencia.GetCmdConsultar";

        if ($where != "")
            $where = " where " . $where ;
        else
            $where = " where Codigo = " . $this->{'Codigo'} . "" ;

        $sql = 
            "select * from " . get_class($this) .
            $where ;

        Logger::Instance()->Info($METHOD, "sql: " . $sql);

        return $sql;
    }

    protected function GetCmdIncluir()
    {
        $METHOD = "Pesistencia.GetCmdIncluir";

        $names = "";
        $values = "";

        foreach ($this as $propName => $propValue)
        {
            $names = $names . ($names != "" ? "," : "") . $propName;
            $values = $values . ($values != "" ? "," : "") . 
                (isset($propValue) && $propValue != "" ? "'" . $propValue . "'" : "null") ;
        }

        $sql = 
            "insert into " . get_class($this) .
            " (" . $names . ") values (" . $values . ") " ;

        Logger::Instance()->Info($METHOD, "sql: " . $sql);

        return $sql;
    }

    protected function GetCmdAlterar()
    {
        $METHOD = "Pesistencia.GetCmdAlterar";

        $sets = "";

        foreach ($this as $propName => $propValue)
            if ($propName != "Codigo")
                $sets = $sets . ($sets != "" ? ", " : "") . 
                    $propName . " = " . (isset($propValue) && $propValue != "" ? "'" . $propValue . "'" : "null") ;

        $sql = 
            "update " . get_class($this) . 
            " set " . $sets . 
            " where Codigo = " . $this->{'Codigo'} . "" ;

        Logger::Instance()->Info($METHOD, "sql: " . $sql);

        return $sql;        
    }

    protected function GetCmdExcluir()
    {
        $METHOD = "Pesistencia.GetCmdExcluir";

        $sql = 
            "delete from " . get_class($this) . 
            " where Codigo = " . $this->{'Codigo'} . "" ;

        Logger::Instance()->Info($METHOD, "sql: " . $sql);

        return $sql;
    }

    //--

    public function Consultar($where = "")
    {
        $record = $this->$Conexao->GetConsulta($this->GetCmdConsultar($where));
        
        $this->SetValues($record);

        return $this;
    }

    //--

    public function Incluir()
    {
        $retorno = $this->$Conexao->ExecComando($this->GetCmdIncluir());

        $this->{'Codigo'} = $this->$Conexao->lastInsertId();

        return $retorno;
    }

    public function Alterar()
    {
        return $this->$Conexao->ExecComando($this->GetCmdAlterar());
    }

    public function Excluir()
    {
        return $this->$Conexao->ExecComando($this->GetCmdExcluir());
    }

    //--

    public function Salvar()
    {
        $codigo = $this->{'Codigo'};

        if (isset($codigo))
        {
            $record = $this->$Conexao->GetConsulta($this->GetCmdConsultar());
            $codigo = $record["Codigo"];
        }
        
        if (!isset($codigo))
            return $this->Incluir();
        else
            return $this->Alterar();
    }
}
?>