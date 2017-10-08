<?php

require_once("logger.php");

class ConexaoMySql
{
    public $Hostname;
    public $Username;
    public $Password;
    public $Database;
    public $Conexao;

    function __construct($hostname,$username,$password,$database)
    {
        $METHOD = "ConexaoMySql.__construct()";
        Logger::Instance()->Info($METHOD, "");
        $this->Hostname = $hostname;
        $this->Username = $username;
        $this->Password = $password;
        $this->Database = $database;
        $this->SetConexao();
    }

    private function SetConexao()
    {
        if (!isset($this->$Conexao))
        {
            $this->$Conexao = new PDO("mysql:host=$this->Hostname;dbname=$this->Database", $this->Username, $this->Password);
            $this->$Conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if (!$this->$Conexao)
                throw new Exception("Erro ao connectar", 1);
        }
    }

    //--

    /*
    $conn = new ConexaoMySql("localhost", "root", "", "igreja");
    $result = $conn->GetConsulta("select Codigo, Nome from Pessoa");
    while($row = $result->fetch_assoc())
    {
        echo $row["Codigo"];
        echo $row["Nome"];
    }
    */
    public function GetConsulta($sql)
    {
        $METHOD = "ConexaoMySql.GetConsulta()";
        Logger::Instance()->Info($METHOD, "sql: " . $sql);
        
        if (is_null($sql))
            throw new Exception("Consulta deve ser informada", 1);

        try 
        {
            return $this->$Conexao->query($sql);
        }
        catch (Exception $e)
        {
            Logger::Instance()->Erro($METHOD, $e->getMessage());
            throw new Exception("Error " . $e->getMessage(), 1);
        }
    }

    /*
    $conn = new ConexaoMySql("localhost", "root", "", "igreja");
    $conn->ExecComando("insert into Pessoa(Codigo, Nome) values ('$Codigo', '$Nome')");
    */
    public function ExecComando($cmd)
    {
        $METHOD = "ConexaoMySql.ExecComando()";
        Logger::Instance()->Info($METHOD, "cmd: " . $cmd);
        
        if (is_null($cmd))
            throw new Exception("Comando deve ser informado", 1);

        try 
        {
            $this->$Conexao->exec($cmd);            
        }
        catch (Exception $e)
        {
            Logger::Instance()->Erro($METHOD, $e->getMessage());
            throw new Exception("Error " . $e->getMessage(), 1);
        }
    }
}
?>