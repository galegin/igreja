<?php

require_once("../../models/persistencia.php");

class Reuniao extends Persistencia
{
    public $Codigo;
    public $Descricao;
    public $Data;
    public $Data_Proxima;
    public $Hora_Inicio;
    public $Nome_Atende;
    public $Palavra;

    protected function SetRecord($record)
    {
        $this->Codigo = $record["Codigo"];
        $this->Descricao = $record["Descricao"];
        $this->Data = $record["Data"];
        $this->Data_Proxima = $record["Data_Proxima"];
        $this->Hora_Inicio = $record["Hora_Inicio"];
        $this->Nome_Atende = $record["Nome_Atende"];
        $this->Palavra = $record["Palavra"];
    }

    protected function GetCmdListar()
    {
        return
            "select * from Reuniao";
    }

    protected function GetCmdConsultar()
    {
        return
            "select * from Reuniao where Codigo = $this->Codigo";
    }

    protected function GetCmdIncluir()
    {
        return
            "insert into Reuniao (Codigo,Descricao,Data,Data_Proxima,Hora_Inicio,Nome_Atende,Palavra) " . 
            "values ($this->Codigo,'$this->Descricao','$this->Data','$this->Data_Proxima','$this->Hora_Inicio','$this->Nome_Atende','$this->Palavra')";
    }

    protected function GetCmdAlterar()
    {
        return
            "update Reuniao " .
            "set Descricao = '$this->Descricao' " .
            ", Data = '$this->Data' " .
            ", Data_Proxima = '$this->Data_Proxima' " .
            ", Hora_Inicio = '$this->Hora_Inicio' " .
            ", Nome_Atende = '$this->Nome_Atende' " .
            ", Palavra = '$this->Palavra' " .
            "where Codigo = $this->Codigo";
    }

    protected function GetCmdExcluir()
    {
        return
            "delete from Reuniao where Codigo = $this->Codigo";
    }      
}
?>