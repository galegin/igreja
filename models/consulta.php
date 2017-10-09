<?php 

require_once("modulo.php");

abstract class Consulta
{
    protected $Conexao;

    function __construct()
    {
        $METHOD = "Consulta.__construct()";
        Logger::Instance()->Info($METHOD, "");
        $this->$Conexao = Modulo::Instance()->ConexaoAmbiente();
    }

    //--

    public function SetValues($values)
    {
        $METHOD = "Consulta.SetValues()";
        
        $keys = array_keys($values);

        foreach ($keys as $key)
        {
            Logger::Instance()->Info($METHOD, $key . "=" . $values[$key]);
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

    //-- "Codigo_Tipo_Servico = 1 and Codigo_Localidade = 2"

    protected function GetCmdListar($where = "")
    {
        $METHOD = "Consulta.GetCmdListar()";

        if ($where == "")
            foreach ($this as $propName => $propValue)
                if (isset($propValue))
                    $where = $where . ($where != null ? " and " : "") . 
                        $propName . " = '" . $propValue . "'" ;

        $sql =
            'select * from ' . get_class($this) .
            ($where != null ? ' where ' : '') . $where ;

        Logger::Instance()->Info($METHOD, "sql: " . $sql);

        return $sql;
    }

    //--

    public function Listar($where = "")
    {
        $class = get_class($this);
        $lista = new ArrayObject();
        $sql = $this->GetCmdListar($where);        
        $query = $this->$Conexao->GetConsulta($sql);

        foreach ($query as $record) {
            $obj = new $class;
            $obj->SetValues($record);
            $lista->append($obj);
        }

        return $lista;
    }
}
?>