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
        foreach ($values as $key => $value) {
            $this->{$key} = $value;
        }
    }

    public function GetValues()
    {
        $values = array();
        
        foreach ($this as $propName => $propValue) {
            $values[$propName] = $propValue;
        }
        
        return $values;
    }

    //--

    protected abstract function GetCmdListar();

    //--

    public function ListarObj($class,$sql)
    {
        $lista = new ArrayObject();
        
        $query = $this->GetLista($sql);
        
        foreach ($query as $record) {
            $obj = new $class;
            $obj->SetValues($record);
            $lista->append($obj);
        }

        return $lista;
    }

    //--

    public function Listar()
    {
        return $this->ListarObj(get_class($this), $this->GetCmdListar());
    }
}
?>