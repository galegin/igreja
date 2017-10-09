<?php

class public Objeto
{
    public static function SetValues($obj,$values)
    {
        foreach ($obj as $propName => $propValue)
            $obj[$propName] = $values[$propValue];
    }

    public static function GetValues($obj)
    {
        $values = array();
        
        foreach ($obj as $propName => $propValue)
            $values[$propName] = $propValue;
        
        return $values;
    }
}
?>