<?php 

require_once("modulo.php");

abstract class Consulta
{
    private $_conexao;

    public function Consulta()
    {
    }

    protected function GetConexao()
    {
        if (!isset($this->_conexao))
            $this->_conexao = Modulo::Instance()->ConexaoAmbiente();

        return $this->_conexao;
    }

    //--

    public function GetLista($sql)
    {
        return $this->GetConexao()->GetLista($sql);
    }

    //--

    public function SetValues($values)
    {
        $keys = array_keys($values);

        foreach ($keys as $key)
        {
            //Logger::Instance()->Info("Consulta.SetValues()", $key . "=" . $values[$key]);
            $this->{$key} = $values[$key];
        }
    }

    public function GetValues()
    {
        $values = array();
        
        foreach ($this as $propName => $propValue)
            $values[$propName] = $propValue;
        
        return $values;
    }

    //--

    protected function GetCmdListar($where = "")
    {
        if ($where == "")
            foreach ($this as $propName => $propValue)
                if (isset($propValue))
                    $where = $where . ($where != null ? " and " : "") . 
                        $propName . " = '" . $propValue . "'" ;

        $sql =
            'select * from ' . get_class($this) .
            ($where != null ? ' where ' : '') . $where ;

        Logger::Instance()->Info("Consulta.GetSqlListar", "sql: " . $sql);

        return $sql;
    }

    //--

    public function Listar($where = "")
    {
        $class = get_class($this);

        $lista = new ArrayObject();

        $sql = $this->GetCmdListar($where);
        
        $query = $this->GetLista($sql);
        
        foreach ($query as $record) {
            $obj = new $class;
            $obj->SetValues($record);
            $lista->append($obj);
        }

        return $lista;
    }
}
?>