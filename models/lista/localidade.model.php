<?php

require_once("../../models/persistencia.php");

define("TL_LOCAL", 0);
define("TL_IGREJA", 1);

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
}
?>