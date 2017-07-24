<?php

require_once("../../models/persistencia.php");

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

    protected function SetRecord($record)
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

    protected function GetCmdListar()
    {
        return
            "select * from Atendente";
    }

    protected function GetCmdConsultar()
    {
        return
            "select * from Atendente where Codigo = $this->Codigo";
    }

    protected function GetCmdIncluir()
    {
        return
            "insert into Atendente (Codigo,Nome,Ministerio,Administracao,Codigo_Localidade," .
                "Telefone_Pessoal,Telefone_Trabalho,Telefone_Recado,Data_Apresentacao) " . 
            "values ($this->Codigo,'$this->Nome',$this->Ministerio,$this->Administracao,$this->Codigo_Localidade," .
                "'$this->Telefone_Pessoal','$this->Telefone_Trabalho','$this->Telefone_Recado','$this->Data_Apresentacao')";
    }

    protected function GetCmdAlterar()
    {
        return
            "update Atendente " .
            "set Nome = '$this->Nome' " .
            ", Ministerio = $this->Ministerio " .
            ", Administracao = $this->Administracao " .
            ", Codigo_Localidade = $this->Codigo_Localidade " .
            ", Telefone_Pessoal = '$this->Telefone_Pessoal' " .
            ", Telefone_Trabalho = '$this->Telefone_Trabalho' " .
            ", Telefone_Recado = '$this->Telefone_Recado' " .
            ", Data_Apresentacao = '$this->Data_Apresentacao' " .
            "where Codigo = $this->Codigo";
    }

    protected function GetCmdExcluir()
    {
        return
            "delete from Atendente where Codigo = $this->Codigo";
    }
}
?>