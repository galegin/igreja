<?php 

require_once("logger.php");

class Comando
{
    public static function GetTabela($class)
    {
        return $class; // $obj->GetTabela();
    }
    
    public static function GetTabelaObj($obj)
    {
        return get_class($obj); // $obj->GetTabela();
    }

    public static function GetCampo($obj, $atr)
    {
        return $atr; // $obj->GetCampo($atr);
    }

    //-- string
    
    public static function AddString(&$str, $sub, $sep, $ini = "")
    {
        $str = $str . ($str != "" ? $sep : $ini) . $sub;
    }
    
    //-- value
    
    public static function GetValueStr($value)
    {
        return (isset($value) ? "'" . $value . "'" : "null");
    }
    
    //-- select
    
	public static function GetSelect($class, $where = "")
	{
        $METHOD = "Comando.GetSelect";
        Logger::Instance()->Info($METHOD, "class: " . $class);

		$tabela = self::GetTabela($class);
		$fieldsAtr = "";
		$fields = "";
        
        $obj = new $class;
        foreach ($obj as $name => $value)
        {
            self::AddString($fieldsAtr, $name . ' as "' . $name . '"', ", ");
            self::AddString($fields, self::GetCampo($obj, $name) . " as " . $name, ", ");
        }
        
        $sql = 
            "select " . $fieldsAtr . 
            " from (select " . $fields . " from " . $tabela . ") a " .
			($where != "" ? " where " . $where : "");

		return $sql;
	}

	public static function GetSelectObj($obj)
	{
        $METHOD = "Comando.GetSelectObj";
        Logger::Instance()->Info($METHOD, "class: " . get_class($obj));

		$where = "";
        
        foreach ($obj as $name => $value)
            if ($name == "Codigo")
                self::AddString($where, $name . " = " . self::GetValueStr($value), ", ");

		return self::GetSelect(get_class($obj), $where);
	}
    
    //-- insert / update / delete

	public static function GetInsert($obj)	
	{
        $METHOD = "Comando.GetInsert";
        Logger::Instance()->Info($METHOD, "class: " . get_class($obj));

		$tabela = self::GetTabelaObj($obj);
		$fields = "";
		$values = "";
        
        foreach ($obj as $name => $value)
        {
            self::AddString($fields, self::GetCampo($obj, $name), ", ");
            self::AddString($values, self::GetValueStr($value), ", ");
        }

		return "insert into " . $tabela . " (" . $fields . ") values (" . $values . ")";
	}
	
	public static function GetUpdate($obj)	
	{
        $METHOD = "Comando.GetUpdate";
        Logger::Instance()->Info($METHOD, "class: " . get_class($obj));

		$tabela = self::GetTabelaObj($obj);
		$sets = "";
		$where = "";
        
        foreach ($obj as $name => $value)
            if ($name != "Codigo")
                self::AddString($sets, self::GetCampo($obj, $name) . " = " . self::GetValueStr($value), ", ");
            else
                self::AddString($where, self::GetCampo($obj, $name) . " = " . self::GetValueStr($value), " and ");

		return "update " . $tabela . " sets " . $sets . " where " . $where;
	}

	public static function GetDelete($obj)	
	{
        $METHOD = "Comando.GetDelete";
        Logger::Instance()->Info($METHOD, "class: " . get_class($obj));

		$tabela = self::GetTabelaObj($obj);
		$where = "";
        
        foreach ($obj as $name => $value)
            if ($name == "Codigo")
                self::AddString($where, self::GetCampo($obj, $name) . " = " . self::GetValueStr($value), " and ");

		return "delete from " . $tabela . " where " . $where;
	}	
}
?>