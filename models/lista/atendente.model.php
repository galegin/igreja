<?php

require_once("../../models/persistencia.php");

class Atendente extends Persistencia
{
    public $Codigo;
    public $Nome;
    public $Ministerio;
    public $Administracao;
    public $Codigo_Localidade;
    public $Telefone_Pessoal;
    public $Telefone_Trabalho;
    public $Telefone_Recado;
    public $Data_Apresentacao;
}
?>