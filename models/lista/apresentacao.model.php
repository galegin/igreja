<?php

require_once("../persistencia.php");

class Apresentacao extends Persistencia
{
    public $Codigo;
    public $Codigo_Reuniao;
    public $Codigo_Localidade;
    public $Tipo;
    public $Funcao;
    public $Nome;

    function SetRecord($record)
    {
        $Codigo = $record["Codigo"];
        $Codigo_Reuniao = $record["Codigo_Reuniao"];
        $Codigo_Localidade = $record["Codigo_Localidade"];
        $Tipo = $record["Tipo"];
        $Funcao = $record["Funcao"];
        $Nome = $record["Nome"];
    }

    function GetCmdConsultar()
    {
        return
            "select * from Apresentacao where Codigo = $Codigo";
    }

    function GetCmdIncluir()
    {
        return
            "insert into Apresentacao (Codigo,Codigo_Reuniao,Codigo_Localidade,Tipo,Funcao,Nome) " + 
            "values ($Codigo,$Codigo_Reuniao,$Codigo_Localidade,$Tipo,'$Funcao','$Nome')";
    }

    function GetCmdAlterar()
    {
        return
            "update Apresentacao " +
            "set Codigo_Reuniao = $Codigo_Reuniao " +
            ", Codigo_Localidade = $Codigo_Localidade " +
            ", Tipo = $Tipo " +
            ", Funcao = '$Funcao' " +
            ", Nome = '$Nome' " +
            "where Codigo = $Codigo";
    }

    function GetCmdExcluir()
    {
        return
            "delete from Apresentacao where Codigo = $Codigo";
    }
}
?>