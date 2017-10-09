<?php

require_once("conexao.php");
require_once("comando.php");

define("DATABASE", "igreja");
define("USERNAME", "root");
define("PASSWORD", "");
define("HOSTNAME", "localhost");

class Contexto
{
    private static $instance;

    public static function Instance()
    {
        if (!isset(self::$instance))
            self::$instance = new Contexto(DATABASE, USERNAME, PASSWORD, HOSTNAME);
        return self::$instance;
    }

    public $Database;
    public $Username;
    public $Password;
    public $Hostname;
    public $Conexao;

    function __construct($database, $username, $password, $hostname)
    {
        $this->Database = $database; 
        $this->Username = $username; 
        $this->Password = $password; 
        $this->Hostname = $hostname;
        $this->Conexao = new ConexaoMySql($database, $username, $password, $hostname);
    }
    
    //-- lista
    
	public function GetLista($class, $where = "")
	{
		$lista = new ArrayObject();
		$sql = Comando::GetSelect($class, $where);
		$query = $this->Conexao->GetConsulta($sql);
		foreach ($query as $row)
		{
			$obj = new $class();
			$lista->append($obj);
			foreach ($obj as $name => $value) 
				$obj->{$name} = $row[$name];
		}
        return $lista;
	}

	public function SetLista($lista)
	{
		foreach ($lista as $obj) 
		{
			$sql = Comando::GetSelectObj($obj);
			$query = $this->Conexao->GetConsulta($sql);
			$row = $query->fetch();
			$cmd = "";
			if (isset($query))
				$cmd = Comando::GetUpdate($obj);
			else
				$cmd = Comando::GetInsert($obj);
			$this->Conexao->ExecComando($cmd);
		}
	}
	
	public function RemLista($lista)
	{
		foreach ($lista as $obj) 
		{
			$cmd = Comando::GetDelete($obj);
			$this->Conexao->ExecComando($cmd);
		}
	}
    
    //-- objeto
    
    public function GetObjeto($class, $where = "")
    {
        $lista = $this->GetLista($class, $where);
        return $lista[0];
    }

    public function SetObjeto($obj)
    {
		$lista = new ArrayObject();
        $lista->append($obj);
        $this->SetLista($lista);
    }

    public function RemObjeto($obj)
    {
		$lista = new ArrayObject();
        $lista->append($obj);
        $this->RemLista($lista);
    }
}
?>