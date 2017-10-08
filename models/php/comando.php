<?php 

class Commando
{
	public static function GetSelect($class, $where = "")
	{
		$table = "";
		$fieldsAtr = "";
		$fields = "";

		return "select " . $fieldsAtr . " from (select " . $fields . " from " . $table . ")" .
			($where != "" ? " where " . $where : "") ;
	}

	public static function GetSelect($obj)
	{
		var $where = "";
		var $class = "";

		return self::GetSelect($class, $where);
	}

	public static function GetInsert($obj)	
	{
		$table = "";
		$fields = "";
		$values = "";

		return "insert into " . $table . " (" . $fields . ") values (" . $values . ")" ;
	}
	
	public static function GetUpdate($obj)	
	{
		$table = "";
		$sets = "";
		$where = "";

		return "update " . $table . " sets " . $sets . " where " . $where ;
	}

	public static function GetDelete($obj)	
	{
		$table = "";
		$where = "";

		return "delete from " . $table . " where " . $where ;
	}	
}

?>