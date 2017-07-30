<?php

require_once("../../models/persistencia.php");

define("TS_SERVICO", 0);
define("TS_BATISMO", 1);
define("TS_SANTACEIA", 2);
define("TS_CULTOENSINAMENTO", 3);
define("TS_REUNIAOMOCIDADE", 4);
define("TS_COLETA", 5);

class TipoServico extends Persistencia
{
    public $Codigo;
    public $Descricao;
    public $Tipo;
    public $Ordem;

    /* protected function GetCmdListar()
    {
        return
            "select * from TipoServico";
    }

    protected function GetCmdConsultar()
    {
        return
            "select * from TipoServico where Codigo = $this->Codigo";
    }

    protected function GetCmdIncluir()
    {
        return 
            "insert into TipoServico (Codigo,Descricao,Tipo,Ordem) " .
            "values ($this->Codigo,'$this->Descricao',$this->Tipo,$this->Ordem)";
    }

    protected function GetCmdAlterar()
    {
        return
            "update TipoServico " .
            "set Descricao = '$this->Descricao' " .
            ", Tipo = $this->Tipo " .
            ", Ordem = $this->Ordem " .
            "where Codigo = $this->Codigo";
    }

    protected function GetCmdExcluir()
    {
        return
            "delete from TipoServico where Codigo = $this->Codigo";
    } */
}
?>