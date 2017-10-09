<?php

class public Select
{
    //-- tabela

    protected static function GetTabela($obj)
    {
        return get_class($obj);
    }

    //-- campo
    
    protected static function GetCampo($obj, $atr)
    {
        return $atr;
    }

    //-- string

    protected static function AddString(&$str, $sub, $sep, $ini = "")
    {
        $str = $str . ($str != "" ? $sep : $ini) . $str;
    }

    //- value

    protected static function GetValueStr($value)
    {
        return (isset($value) && $value != "" ? "'" . $value . "'" : "null");
    }

    //-- classe

    public static function GetSelect($class, $where = "")
    {
        $METHOD = "Select.GetSelect";

        $sql = 
            "select * from " . $this::GetTabela($class);

        if ($where != "")
            $sql = $sql . " where " . $where ;

        Logger::Instance()->Info($METHOD, "sql: " . $sql);

        return $sql;
    }

    //-- objeto

    public static function GetSelectObj($obj, $where = "")
    {
        $wheres = "";
        
        foreach ($obj as $propName => $propValue)
            if ($propName == "Codigo")
                $this::AddString($wheres, $propName . " = " . $this::GetValueStr($propValue), ", ");

        return $this::GetSelect(get_class($obj), $where);
    }    
}
?>