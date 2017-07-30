<?php

require_once("../../models/persistencia.php");

class Apresentacao extends Persistencia
{
    public $Codigo;
    public $Codigo_Reuniao;
    public $Codigo_Localidade;
    public $Tipo;
    public $Codigo_Tipo_Servico;
    public $Funcao;
    public $Nome;

    /* protected function GetCmdListar()
    {
        return
            "select * from Apresentacao";
    }

    protected function GetCmdConsultar()
    {
        return
            "select * from Apresentacao where Codigo = $this->Codigo";
    }

    protected function GetCmdIncluir()
    {
        return
            "insert into Apresentacao (Codigo,Codigo_Reuniao,Codigo_Localidade,Tipo,Codigo_Tipo_Servico,Funcao,Nome) " . 
            "values ($this->Codigo,$this->Codigo_Reuniao,$this->Codigo_Localidade,$this->Tipo,$this->Codigo_Tipo_Servico,'$this->Funcao','$this->Nome')";
    }

    protected function GetCmdAlterar()
    {
        return
            "update Apresentacao " .
            "set Codigo_Reuniao = $this->Codigo_Reuniao " .
            ", Codigo_Localidade = $this->Codigo_Localidade " .
            ", Tipo = $this->Tipo " .
            ", Codigo_Tipo_Servico = $this->Codigo_Tipo_Servico " .
            ", Funcao = '$this->Funcao' " .
            ", Nome = '$this->Nome' " .
            "where Codigo = $this->Codigo";
    }

    protected function GetCmdExcluir()
    {
        return
            "delete from Apresentacao where Codigo = $this->Codigo";
    } */
}
?>