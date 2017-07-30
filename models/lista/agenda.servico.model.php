<?php

require_once("../../models/persistencia.php");

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

    /* protected function GetCmdListar()
    {
        return
            "select * from AgendaServico";
    }

    protected function GetCmdConsultar()
    {
        return
            "select * from AgendaServico where Codigo = $this->Codigo";
    }

    protected function GetCmdIncluir()
    {
        return
            "insert into AgendaServico (Codigo,Codigo_Tipo_Servico,Codigo_Localidade," .
                "Dia_Semana,Semana_Mes,Hora,Complemento,Atendente) " . 
            "values ($this->Codigo,$this->Codigo_Tipo_Servico,$this->Codigo_Localidade," . 
                "$this->Dia_Semana,$this->Semana_Mes,'$this->Hora','$this->Complemento','$this->Atendente')";
    }

    protected function GetCmdAlterar()
    {
        return
            "update AgendaServico " .
            "set Codigo_Tipo_Servico = $this->Codigo_Tipo_Servico " .
            ", Codigo_Localidade = $this->Codigo_Localidade " .
            ", Dia_Semana = $this->Dia_Semana " .
            ", Semana_Mes = $this->Semana_Mes' " .
            ", Hora = '$this->Hora' " .
            ", Complemento = '$this->Complemento' " .
            ", Atendente = '$this->Atendente' " .
            "where Codigo = $this->Codigo";
    }

    protected function GetCmdExcluir()
    {
        return
            "delete from AgendaServico where Codigo = $this->Codigo";
    } */
}
?>