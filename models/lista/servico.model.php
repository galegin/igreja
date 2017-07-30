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
}
?>