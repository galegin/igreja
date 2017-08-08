<?php

define ("LOG_PATH", "D:/xampp/apache/logs/");

class Logger
{
	private static $instance;

    public static function Instance()
    {
        if (!isset(self::$instance))
            self::$instance = new Logger();

        return self::$instance;
    } 

	protected function Log($tipo, $method, $message)
	{
		$data = date('d.m.Y h:i:s');
		$log = "[$data] [$tipo] $message / $method \n\n";
		$path = LOG_PATH . date("Y.m.d") . ".audit.log";
		error_log($log, 3, $path);
		//error_log($log, 0);
	}

	public  function Debug($method, $message)
	{
		$this->Log("DEBUG", $method, $message);
	}

	public function Erro($method, $message)
	{
		$this->Log("ERRO", $method, $message);
	}

	public function Info($method, $message)
	{
		$this->Log("INFO", $method, $message);
	}

	public function Warning($method, $message)
	{
		$this->Log("WARNING", $method, $message);
	}	
}
?>