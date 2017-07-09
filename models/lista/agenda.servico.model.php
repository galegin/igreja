<?php

require_once("../persistencia.php");

class AgendaServico extends Persistencia
{
    public $Codigo;
    public $Codigo_Tipo_Servico;
    public $Codigo_Localidade;
    public $Dia_Semana;
    public $Semana_Mes;
    public $Hora;
    public $Complemento;
    public $Atendente;

    function SetRecord($record)
    {
        $Codigo = $record["Codigo"];
        $Codigo_Tipo_Servico = $record["Codigo_Tipo_Servico"];
        $Codigo_Localidade = $record["Codigo_Localidade"];
        $Dia_Semana = $record["Dia_Semana"];
        $Semana_Mes = $record["Semana_Mes"];
        $Hora = $record["Hora"];
        $Complemento = $record["Complemento"];
        $Atendente = $record["Atendente"];
    }

    function GetCmdConsultar()
    {
        return
            "select * from AgendaServico where Codigo = $Codigo";
    }

    function GetCmdIncluir()
    {
        return
            "insert into AgendaServico (Codigo,Codigo_Tipo_Servico,Codigo_Localidade," +
                "Dia_Semana,Semana_Mes,Hora,Complemento,Atendente) " + 
            "values ($Codigo,$Codigo_Tipo_Servico,$Codigo_Localidade," + 
                "$Dia_Semana,$Semana_Mes,'$Hora','$Complemento','$Atendente')";
    }

    function GetCmdAlterar()
    {
        return
            "update AgendaServico " +
            "set Codigo_Tipo_Servico = $Codigo_Tipo_Servico " +
            ", Codigo_Localidade = $Codigo_Localidade " +
            ", Dia_Semana = $Dia_Semana " +
            ", Semana_Mes = $Semana_Mes' " +
            ", Hora = '$Hora' " +
            ", Complemento = '$Complemento' " +
            ", Atendente = '$Atendente' " +
            "where Codigo = $Codigo";
    }

    function GetCmdExcluir()
    {
        return
            "delete from AgendaServico where Codigo = $Codigo";
    }
}
?>