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
}
?>