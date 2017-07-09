<?php

require_once("conexao.php");

class Modulo
{
    private static $instance;

    public static function Instance()
    {
        if (!isset(self::$instance))
            self::$instance = new Modulo();

        return self::$instance;
    } 

    public $Hostname;    
    public $Username;
    public $Password;
    public $Database;

    private function Modulo()
    {    	
	    $Hostname = "localhost";
	    $Username = "root";
	    $Password = "";
        $Database = "igreja";
    }

    private $_list_conexao;

    public function GetConexao($nome)
    {
    	$conexao = $this->_list_conexao[$nome];
    	
    	if (!isset($conexao))
    	{
    		$conexao = new ConexaoMySql($this->Hostname, $this->Username, $this->Password, $this->Database);
    		$this->_list_conexao[$nome] = $conexao;
    	}

    	return $conexao;
    }

    public function ConexaoAmbiente()
    {
    	return $this->GetConexao("ambiente");
    }
    
    public function ConexaoGlobal()
    {
    	return $this->GetConexao("global");
    }
    
    public function ConexaoLogin()
    {
    	return $this->GetConexao("global");
    }
}
?>