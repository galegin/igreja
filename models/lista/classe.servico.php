<?php

require_once("../persistencia.php");

class Servico extends Persistencia
{
    public $Codigo;
    public $Codigo_Reuniao;
    public $Codigo_Tipo_Servico;
    public $Codigo_Localidade;
    public $Data_Inicio;
    public $Data_Termino;
    public $Hora_Inicio;
    public $Hora_Termino;
    public $Complemento;
    public $Atendente;
    public $Qtde_Irmao;
    public $Qtde_Irma;

    function SetRecord($record)
    {
        $Codigo = $record["Codigo"];
        $Codigo_Reuniao = $record["Codigo_Reuniao"];
        $Codigo_Tipo_Servico = $record["Codigo_Tipo_Servico"];
        $Codigo_Localidade = $record["Codigo_Localidade"];
        $Data_Inicio = $record["Data_Inicio"];
        $Data_Termino = $record["Data_Termino"];
        $Hora_Inicio = $record["Hora_Inicio"];
        $Hora_Termino = $record["Hora_Termino"];
        $Complemento = $record["Complemento"];
        $Atendente = $record["Atendente"];
        $Qtde_Irmao = $record["Qtde_Irmao"];
        $Qtde_Irma = $record["Qtde_Irma"];
    }

    function GetCmdConsultar()
    {
        return
            "select * from Servico where Codigo = $Codigo";
    }

    function GetCmdIncluir()
    {
        return
            "insert into Servico (Codigo,Codigo_Reuniao,Codigo_Tipo_Servico,Codigo_Localidade" + 
                ",Data_Inicio,Data_Termino,Hora_Inicio,Hora_Termino" + 
                ",Complemento,Atendente,Qtde_Irmao,Qtde_Irma) " + 
            "values ($Codigo,$Codigo_Reuniao,$Codigo_Tipo_Servico,$Codigo_Localidade" + 
                ",'$Data_Inicio','$Data_Termino','$Hora_Inicio','$Hora_Termino'" + 
                ",'$Complemento','$Atendente',$Qtde_Irmao,$Qtde_Irma)";
    }

    function GetCmdAlterar()
    {
        return
            "update Servico " +
            "set Codigo_Reuniao = $Codigo_Reuniao " +
            ", Codigo_Tipo_Servico = $Codigo_Tipo_Servico " +
            ", Codigo_Localidade = $Codigo_Localidade " +
            ", Data_Inicio = '$Data_Inicio' " +
            ", Data_Termino = '$Data_Termino' " +
            ", Hora_Inicio = '$Hora_Inicio' " +
            ", Data_Termino = '$Data_Termino' " +
            ", Complemento = '$Complemento' " +
            ", Atendente = '$Atendente' " +
            ", Qtde_Irmao = $Qtde_Irmao " +
            ", Qtde_Irma = $Qtde_Irma " +
            "where Codigo = $Codigo";
    }

    function GetCmdExcluir()
    {
        return
            "delete from Servico where Codigo = $Codigo";
    }
}
?>