<?php

require_once("../../models/persistencia.php");

class Observacao extends Persistencia
{
    public $Codigo;
    public $Codigo_Reuniao;
    public $Descricao;

    /* protected function GetCmdListar()
    {
        return
            "select * from Observacao";
    }

    protected function GetCmdConsultar()
    {
        return
            "select * from Observacao where Codigo = $this->Codigo";
    }

    protected function GetCmdIncluir()
    {
        return
            "insert into Observacao (Codigo,Codigo_Reuniao,Descricao) " . 
            "values ($this->Codigo,$this->Codigo_Reuniao,'$this->Descricao')";
    }

    protected function GetCmdAlterar()
    {
        return
            "update Observacao " .
            "set Codigo_Reuniao = $this->Codigo_Reuniao " .
            ", Descricao = '$this->Descricao' " .
            "where Codigo = $this->Codigo";
    }

    protected function GetCmdExcluir()
    {
        return
            "delete from Observacao where Codigo = $this->Codigo";
    } */
}
?>