<?php

require_once("conexao.php");

define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "igreja");

class Modulo
{
    private static $instance;

    public static function Instance()
    {
        if (!isset(self::$instance))
            self::$instance = new Modulo();
        return self::$instance;
    } 

    private function Modulo()
    {        
    }

    private $_list_conexao;

    public function GetConexao($nome)
    {
        $conexao = $this->$_list_conexao[$nome];
        
        if (!isset($conexao))
        {
            $conexao = new ConexaoMySql(HOSTNAME, USERNAME, PASSWORD, DATABASE);
            $this->$_list_conexao[$nome] = $conexao;
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