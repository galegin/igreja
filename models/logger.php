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
		$log = 
<<<<<<< HEAD
<<<<<<< HEAD
            "<log>\n" .
            "<data>$data<data/>\n" . 
            "<tipo>$tipo</tipo>\n" . 
            "<mensagem>$message</mensagem>\n" . 
            "<metodo>$method</metodo>\n" . 
            "</log>\n\n" ;
=======
=======
>>>>>>> 2f06a0a7c25700b2d65efd5924e69f94469c4ada
			"<log>\n" .
			"<data>$data</data>\n" .
			"<tipo>$tipo</tipo>\n" .
			"<message>$message</message>\n" .
			"<metodo>$method</metodo>\n" . 
			"</log>\n\n";
<<<<<<< HEAD
>>>>>>> 2f06a0a7c25700b2d65efd5924e69f94469c4ada
=======
>>>>>>> 2f06a0a7c25700b2d65efd5924e69f94469c4ada
		$path = LOG_PATH . date("Y.m.d") . ".audit.xml";
		error_log($log, 3, $path);
	}

	public function Debug($method, $message)
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