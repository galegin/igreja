<?php

require_once("logger.php");

class ConexaoMySql
{
    public $Hostname;
    public $Username;
    public $Password;
    public $Database;
    public $Conexao;

<<<<<<< HEAD
    public function __construct($database, $username, $password, $hostname)
    {
        $this->Database = $database;
        $this->Username = $username;
        $this->Password = $password;
        $this->Hostname = $hostname;
=======
    function __construct($hostname,$username,$password,$database)
    {
        $METHOD = "ConexaoMySql.__construct()";
        Logger::Instance()->Info($METHOD, "");
        $this->Hostname = $hostname;
        $this->Username = $username;
        $this->Password = $password;
        $this->Database = $database;
>>>>>>> 2f06a0a7c25700b2d65efd5924e69f94469c4ada
        $this->SetConexao();
    }

    private function SetConexao()
    {
<<<<<<< HEAD
        if (!isset($this->Conexao))
        {
            $this->Conexao = new PDO("mysql:host=$this->Hostname;dbname=$this->Database", $this->Username, $this->Password);
            $this->Conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);            
            if (!$this->Conexao)
=======
        if (!isset($this->$Conexao))
        {
            $this->$Conexao = new PDO("mysql:host=$this->Hostname;dbname=$this->Database", $this->Username, $this->Password);
            $this->$Conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if (!$this->$Conexao)
>>>>>>> 2f06a0a7c25700b2d65efd5924e69f94469c4ada
                throw new Exception("Erro ao connectar", 1);
        }
    }

<<<<<<< HEAD
    /*
    $conn = new ConexaoMySql("localhost", "root", "", "igreja");
    $row = $conn->GetConsulta("select Codigo, Nome from Pessoa");
    echo $row["Codigo"];
    echo $row["Nome"];
    */
    public function GetConsulta($sql)
    {
        $METHOD = "ConexaoMySql.GetConsulta";
        Logger::Instance()->Info($METHOD, "sql: " . $sql);

=======
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
        
>>>>>>> 2f06a0a7c25700b2d65efd5924e69f94469c4ada
        if (is_null($sql))
            throw new Exception("Consulta deve ser informada", 1);

        try 
        {
<<<<<<< HEAD
            return $this->Conexao->query($sql);
=======
            return $this->$Conexao->query($sql);
>>>>>>> 2f06a0a7c25700b2d65efd5924e69f94469c4ada
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
<<<<<<< HEAD
        $METHOD = "ConexaoMySql.ExecComando";
        Logger::Instance()->Info($METHOD, "cmd: " . $cmd);

=======
        $METHOD = "ConexaoMySql.ExecComando()";
        Logger::Instance()->Info($METHOD, "cmd: " . $cmd);
        
>>>>>>> 2f06a0a7c25700b2d65efd5924e69f94469c4ada
        if (is_null($cmd))
            throw new Exception("Comando deve ser informado", 1);

        try 
        {
<<<<<<< HEAD
            $this->Conexao->exec($cmd);
=======
            $this->$Conexao->exec($cmd);            
>>>>>>> 2f06a0a7c25700b2d65efd5924e69f94469c4ada
        }
        catch (Exception $e)
        {
            Logger::Instance()->Erro($METHOD, $e->getMessage());
            throw new Exception("Error " . $e->getMessage(), 1);
        }
    }
}
?>