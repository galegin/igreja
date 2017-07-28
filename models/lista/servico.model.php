<?php

require_once("../../models/persistencia.php");

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

    protected function GetCmdListar()
    {
        return
            "select * from Servico";
    }

    protected function GetCmdConsultar()
    {
        return
            "select * from Servico where Codigo = $this->Codigo";
    }

    protected function GetCmdIncluir()
    {
        return
            "insert into Servico (/*Codigo,*/Codigo_Reuniao,Codigo_Tipo_Servico,Codigo_Localidade" . 
                ",Data_Inicio,Data_Termino,Hora_Inicio,Hora_Termino" . 
                ",Complemento,Atendente,Qtde_Irmao,Qtde_Irma) " .
            "values (/*$this->Codigo,*/$this->Codigo_Reuniao,$this->Codigo_Tipo_Servico,$this->Codigo_Localidade" .
                ",'$this->Data_Inicio','$this->Data_Termino','$this->Hora_Inicio','$this->Hora_Termino'" .
                ",'$this->Complemento','$this->Atendente',$this->Qtde_Irmao,$this->Qtde_Irma)";
    }

    protected function GetCmdAlterar()
    {
        return
            "update Servico " .
            "set Codigo_Reuniao = $this->Codigo_Reuniao " .
            ", Codigo_Tipo_Servico = $this->Codigo_Tipo_Servico " .
            ", Codigo_Localidade = $this->Codigo_Localidade " .
            ", Data_Inicio = '$this->Data_Inicio' " .
            ", Data_Termino = '$this->Data_Termino' " .
            ", Hora_Inicio = '$this->Hora_Inicio' " .
            ", Data_Termino = '$this->Data_Termino' " .
            ", Complemento = '$this->Complemento' " .
            ", Atendente = '$this->Atendente' " .
            ", Qtde_Irmao = $this->Qtde_Irmao " .
            ", Qtde_Irma = $this->Qtde_Irma " .
            "where Codigo = $this->Codigo";
    }

    protected function GetCmdExcluir()
    {
        return
            "delete from Servico where Codigo = $this->Codigo";
    }
}
?>