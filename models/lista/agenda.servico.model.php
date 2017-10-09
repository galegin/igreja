<?php

require_once("../../models/mapping.php");

class AgendaServico extends Mapping
{
    public $Codigo;
    public $Codigo_Tipo_Servico;
    public $Codigo_Localidade;
    public $Dia_Semana;
    public $Semana_Mes;
    public $Hora;
    public $Complemento;
    public $Atendente;
}
?>