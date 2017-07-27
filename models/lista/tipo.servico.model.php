<?php

require_once("../../models/persistencia.php");

class TipoServico extends Persistencia
{
    public $Codigo;
    public $Descricao;
    public $Tipo;
    public $Ordem;

    public function SetRecord($record)
    {
        $this->Codigo = $record["Codigo"];
        $this->Descricao = $record["Descricao"];
        $this->Tipo = $record["Tipo"];
        $this->Ordem = $record["Ordem"];
    }

    protected function GetCmdListar()
    {
        return
            "select * from TipoServico";
    }

    protected function GetCmdConsultar()
    {
        return
            "select * from TipoServico where Codigo = $this->Codigo";
    }

    protected function GetCmdIncluir()
    {
        return 
            "insert into TipoServico (Codigo,Descricao,Tipo,Ordem) " .
            "values ($this->Codigo,'$this->Descricao',$this->Tipo, $this->Ordem)";
    }

    protected function GetCmdAlterar()
    {
        return
            "update TipoServico " .
            "set Descricao = '$this->Descricao' " .
            ", Tipo = $this->Tipo " .
            ", Ordem = $this->Ordem " .
            "where Codigo = $this->Codigo";
    }

    protected function GetCmdExcluir()
    {
        return
            "delete from TipoServico where Codigo = $this->Codigo";
    }
}
?>