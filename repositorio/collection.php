<?php

require_once("modulo.php");

class public Collection
{
    public $Conexao;
    public $Class;
    public $Items;

    function __construct($class)
    {
        $this->$Conexao = Modulo::Instance()->ConexaoAmbiente();
        $this->$Class = $class;
        $this->$Items = new ArrayObject();
    }

    //--

    public function Clear()
    {
        $this->$Items = null;
        $this->$Items = new ArrayObject();
    }

    public function Add()
    {
        $obj = new $Class;
        $Items->append($obj);
        return $obj;
    }

    //--

    public function Listar($where = "")
    {
        $sql = $this->GetSelect($where);        
        $query = $this->$Conexao->GetConsulta($sql);
        foreach ($query as $record)
            $this->Add()->SetValues($record);
    }
}
?>