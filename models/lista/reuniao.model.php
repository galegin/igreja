<?php

require_once("../persistencia.php");

class Reuniao extends Persistencia
{
    public $Codigo;
    public $Descricao;
    public $Data;
    public $Data_Proxima;
    public $Hora_Inicio;
    public $Nome_Atende;
    public $Palavra;

    function SetRecord($record)
    {
        $Codigo = $record["Codigo"];
        $Descricao = $record["Descricao"];
        $Data = $record["Data"];
        $Data_Proxima = $record["Data_Proxima"];
        $Hora_Inicio = $record["Hora_Inicio"];
        $Nome_Atende = $record["Nome_Atende"];
        $Palavra = $record["Palavra"];
    }

    function GetCmdConsultar()
    {
        return
            "select * from Reuniao where Codigo = $Codigo";
    }

    function GetCmdIncluir()
    {
        return
            "insert into Reuniao (Codigo,Descricao,Data,Data_Proxima,Hora_Inicio,Nome_Atende,Palavra) " + 
            "values ($Codigo,'$Descricao','$Data','$Data_Proxima','$Hora_Inicio','$Nome_Atende','$Palavra')";
    }

    function GetCmdAlterar()
    {
        return
            "update Reuniao " +
            "set Descricao = '$Descricao' " +
            ", Data = '$Data' " +
            ", Data_Proxima = '$Data_Proxima' " +
            ", Hora_Inicio = '$Hora_Inicio' " +
            ", Nome_Atende = '$Nome_Atende' " +
            ", Palavra = '$Palavra' " +
            "where Codigo = $Codigo";
    }

    function GetCmdExcluir()
    {
        return
            "delete from Reuniao where Codigo = $Codigo";
    }      
}
?>