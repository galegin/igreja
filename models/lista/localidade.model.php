<?php

require_once("../../models/persistencia.php");

class Localidade extends Persistencia
{
    public $Codigo;
    public $Nome;
    public $Tipo;
    public $Anciao;
    public $Diacono;
    public $Cooperador;
    public $Cooperador_Jovem;
    public $Encarregado;
    public $Dias_Culto;
    public $Dias_Culto_Jovem;

    protected function SetRecord($record)
    {
        $this->Codigo = $record["Codigo"];
        $this->Nome = $record["Nome"];
        $this->Tipo = $record["Tipo"];
        $this->Anciao = $record["Anciao"];
        $this->Diacono = $record["Diacono"];
        $this->Cooperador = $record["Cooperador"];
        $this->Cooperador_Jovem = $record["Cooperador_Jovem"];
        $this->Encarregado = $record["Encarregado"];
        $this->Dias_Culto = $record["Dias_Culto"];
        $this->Dias_Culto_Jovem = $record["Dias_Culto_Jovem"];
    }

    protected function GetCmdListar()
    {
        return
            "select * from Localidade";
    }

    protected function GetCmdConsultar()
    {
        return
            "select * from Localidade where Codigo = $this->Codigo";
    }

    protected function GetCmdIncluir()
    {
        return
            "insert into Localidade (Codigo,Nome,Tipo,Anciao,Cooperador,Cooperador_Jovem,Encarregado," .
                "Dias_Culto,Dias_Culto_Jovem) " . 
            "values ($this->Codigo,'$this->Nome',$this->Tipo,'$this->Anciao','$this->Cooperador','$this->Cooperador_Jovem','$this->Encarregado'," .
                "'$this->Dias_Culto','$this->Dias_Culto_Jovem')";
    }

    protected function GetCmdAlterar()
    {
        return
            "update Localidade " .
            "set Nome = '$this->Nome' " .
            ", Tipo = $this->Tipo " .
            ", Anciao = '$this->Anciao' " .
            ", Diacono = '$this->Diacono' " .
            ", Cooperador = '$this->Cooperador' " .
            ", Cooperador_Jovem = '$this->Cooperador_Jovem' " .
            ", Encarregado = '$this->Encarregado' " .
            ", Dias_Culto = '$this->Dias_Culto' " .
            ", Dias_Culto_Jovem = '$this->Dias_Culto_Jovem' " .
            "where Codigo = $this->Codigo";
    }

    protected function GetCmdExcluir()
    {
        return
            "delete from Localidade where Codigo = $this->Codigo";
    }
}
?>