<?php

class public CollectionItem
{
    protected function GetTabela()
    {
        return get_class($this);
    }

    protected function GetCampo($campo)
    {
        return $campo;
    }

    //--

    public function Limpar()
    {

    }

    //--

    public function Listar($where = "")
    {
        $where = "";
        $collection = new Collection($this);
        $collection->Listar($where);
        return $collection->$Items;
    }

    public function Consultar($where = "")
    {
        
    }

    //--

    public function Incluir()
    {

    }

    public function Alterar()
    {

    }

    public function Excluir()
    {

    }

    //--
    
    public function Salvar()
    {

    }
}
?>