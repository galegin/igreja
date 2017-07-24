<?php

require_once("../persistencia.php");

class Observacao extends Persistencia
{
    public $Codigo;
    public $Codigo_Reuniao;
    public $Descricao;

    protected function SetRecord($record)
    {
        $Codigo = $record["Codigo"];
        $Codigo_Reuniao = $record["Codigo_Reuniao"];
        $Descricao = $record["Descricao"];
    }

    protected function GetCmdConsultar()
    {
        return
            "select * from Observacao where Codigo = $Codigo";
    }

    protected function GetCmdIncluir()
    {
        return
            "insert into Observacao (Codigo,Codigo_Reuniao,Descricao) " . 
            "values ($Codigo,$Codigo_Reuniao,'$Descricao')";
    }

    protected function GetCmdAlterar()
    {
        return
            "update Observacao " .
            "set Codigo_Reuniao = $Codigo_Reuniao " .
            ", Descricao = '$Descricao' " .
            "where Codigo = $Codigo";
    }

    protected function GetCmdExcluir()
    {
        return
            "delete from Observacao where Codigo = $Codigo";
    } 
}
?>