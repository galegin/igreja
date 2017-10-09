<?php

abstract class Mapping
{
    public function GetTabela()
    {
        return get_class($this);
    }
    
    public function GetCampo($atr)
    {
        return strtoupper($atr);
    }
}
?>