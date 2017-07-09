<?php

require_once("../../models/persistencia.php");

class TipoServico extends Persistencia
{
    public $Codigo;
    public $Descricao;
    public $Tipo;

    protected function SetRecord($record)
    {
        $this->Codigo = $record["Codigo"];
        $this->Descricao = $record["Descricao"];
        $this->Tipo = $record["Tipo"];
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
            "insert into TipoServico (Codigo,Descricao,Tipo) " + 
            "values ($this->Codigo,'$this->Descricao',$this->Tipo)";
    }

    protected function GetCmdAlterar()
    {
        return
            "update TipoServico " +
            "set Descricao = '$this->Descricao' " +
            ", Tipo = $this->Tipo " +
            "where Codigo = $this->Codigo";
    }

    protected function GetCmdExcluir()
    {
        return
            "delete from TipoServico where Codigo = $this->Codigo";
    }
}
?>