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
}
?>