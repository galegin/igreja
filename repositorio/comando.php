<?php

require_once("select.php");

class public Comando extends Select
{
    //-- insert

    protected static function GetCampos($obj)
    {
        $campos = "";

        foreach ($obj as $propName => $propValue)
            $this::AddString($campos, $propName, ", ");

        return $campos;
    }

    protected static function GetValues($obj)
    {
        $values = "";

        foreach ($obj as $propName => $propValue)
            $this::AddString($values, $this::GetValueStr($propValue), ", ");

        return $values;
    }

    //-- update

    protected static function GetSets($obj)
    {
        $sets = "";

        foreach ($obj as $propName => $propValue)
            if ($propName != "Codigo")
                $this::AddString($sets, $propName . " = " . $this::GetValueStr($propValue), ", ");

        return $sets;
    }

    //- where

    protected static function GetWheres($obj)
    {
        $wheres = "";
        
        foreach ($obj as $propName => $propValue)
            if ($propName == "Codigo")
                $this::AddString($wheres, $propName . " = " . $this::GetValueStr($propValue), ", ");

        return $wheres;
    }

    //-- comando

    public static function GetInsert($obj)
    {
        $METHOD = "Comando.GetInsert";

        $names = $this::GetCampos($obj);
        $values = $this::GetValues($obj);

        $cmd = 
            "insert into " . $this::GetTabela($obj) .
            " (" . $names . ") values (" . $values . ") " ;

        Logger::Instance()->Info($METHOD, "cmd: " . $cmd);

        return $cmd;
    }
    
    public static function GetUpdate($obj)
    {
        $METHOD = "Comando.GetUpdate";

        $sets = $this::GetSets($obj);
        $wheres = $this::GetWheres($obj);
        
        $cmd = 
            "update " . $this::GetTabela($obj) .
            " set " . $sets . 
            " where " . $wheres ;

        Logger::Instance()->Info($METHOD, "cmd: " . $cmd);

        return $cmd;
    }

    public static function GetDelete($obj)
    {
        $METHOD = "Comando.GetDelete";
        
        $wheres = $this::GetWheres($obj);
        
        $cmd = 
            "delete from " . $this::GetTabela($obj) .
            " where " . $wheres ;

        Logger::Instance()->Info($METHOD, "cmd: " . $cmd);

        return $cmd;
    }    
}
?>