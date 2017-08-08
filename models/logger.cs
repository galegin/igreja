
define ("LOG_PATH", "D:/xampp/apache/logs/");

public class Logger
{
	private static Logger instance;

    public static Logger Instance()
    {
        if (instance == null)
            instance = new Logger();

        return instance;
    } 

	protected void Log(string tipo, string method, string message)
	{
		var data = date('d.m.Y h:i:s');
		var log = "[data] [tipo] message / method \n\n";
		var path = LOG_PATH . date("Y.m.d") . ".audit.log";
		error_log(log, 3, path);
		//error_log(log, 0);
	}

	public void Debug(string method, string message)
	{
		this.Log("DEBUG", method, message);
	}

	public void Erro(string method, string message)
	{
		this.Log("ERRO", method, message);
	}

	public void Info(string method, string message)
	{
		this.Log("INFO", method, message);
	}

	public void Warning(string method, string message)
	{
		this.Log("WARNING", method, message);
	}	
}