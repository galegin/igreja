<?php

require_once("../persistencia.php");

class Atendente extends Persistencia
{
    public $Codigo;
    public $Nome;
    public $Ministerio;
    public $Administracao;
    public $Codigo_Localidade;
    public $Telefone_Pessoal;
    public $Telefone_Trabalho;
    public $Telefone_Recado;
    public $Data_Apresentacao;

    function SetRecord($record)
    {
        $Codigo = $record["Codigo"];
        $Nome = $record["Nome"];
        $Ministerio = $record["Ministerio"];
        $Administracao = $record["Administracao"];
        $Codigo_Localidade = $record["Codigo_Localidade"];
        $Telefone_Pessoal = $record["Telefone_Pessoal"];
        $Telefone_Trabalho = $record["Telefone_Trabalho"];
        $Telefone_Recado = $record["Telefone_Recado"];
        $Data_Apresentacao = $record["Data_Apresentacao"];
    }

    function GetCmdConsultar()
    {
        return
            "select * from Atendente where Codigo = $Codigo";
    }

    function GetCmdIncluir()
    {
        return
            "insert into Atendente (Codigo,Nome,Ministerio,Administracao,Codigo_Localidade," +
                "Telefone_Pessoal,Telefone_Trabalho,Telefone_Recado,Data_Apresentacao) " + 
            "values ($Codigo,'$Nome',$Ministerio,$Administracao,$Codigo_Localidade," +
                "'$Telefone_Pessoal','$Telefone_Trabalho','$Telefone_Recado','$Data_Apresentacao')";
    }

    function GetCmdAlterar()
    {
        return
            "update Atendente " +
            "set Nome = '$Nome' " +
            ", Ministerio = $Ministerio " +
            ", Administracao = $Administracao " +
            ", Codigo_Localidade = $Codigo_Localidade " +
            ", Telefone_Pessoal = '$Telefone_Pessoal' " +
            ", Telefone_Trabalho = '$Telefone_Trabalho' " +
            ", Telefone_Recado = '$Telefone_Recado' " +
            ", Data_Apresentacao = '$Data_Apresentacao' " +
            "where Codigo = $Codigo";
    }

    function GetCmdExcluir()
    {
        return
            "delete from Atendente where Codigo = $Codigo";
    }
}
?>