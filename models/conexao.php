<?php

require_once("logger.php");

class ConexaoMySql
{
    public $Hostname;
    public $Username;
    public $Password;
    public $Database;

    private $_conexao;

    public function ConexaoMySql($hostname,$username,$password,$database)
    {
        $this->Hostname = $hostname;
        $this->Username = $username;
        $this->Password = $password;
        $this->Database = $database;
    }

    private function GetConexao()
    {
        if (!isset($this->_conexao))
        {
            $this->_conexao = new PDO("mysql:host=$this->Hostname;dbname=$this->Database", $this->Username, $this->Password);

            $this->_conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            if (!$this->_conexao)
                throw new Exception("Erro ao connectar", 1);
        }

        return $this->_conexao;
    }

    //--

    private function GetQuery($sql)
    {
        Logger::Instance()->Info("ConexaoMySql.GetQuery", "sql: " . $sql);

        if (is_null($sql))
            throw new Exception("Consulta deve ser informada", 1);

        $query = $this->GetConexao()->query($sql);

        if (!$query) 
            throw new Exception("Erro ao efetuar consulta / sql: " . $sql, 1);

        return $query;
    }

    private function ExecQuery($cmd)
    {
        Logger::Instance()->Info("ConexaoMySql.ExecQuery", "cmd: " . $cmd);

        if (is_null($cmd))
            throw new Exception("Comando deve ser informado", 1);

        $query = $this->GetConexao()->exec($cmd);

        if (!$query)
            throw new Exception("Erro ao executar comando / cmd: " . $cmd, 1);

        return $query;
    }

    /*
    $conn = new ConexaoMySql("localhost", "root", "", "igreja");
    $result = $conn->GetLista("select Codigo, Nome from Pessoa");
    while($row = $result->fetch_assoc())
    {
        echo $row["Codigo"];
        echo $row["Nome"];
    }
    */
    public function GetLista($sql)
    {
        try 
        {
            return $this->GetQuery($sql)->fetchAll();
        }
        catch (Exception $e)
        {
            Logger::Instance()->Erro("ConexaoMySql.GetLista", $e->getMessage());
            throw new Exception("Error " . $e->getMessage(), 1);
        }
    }

    /*
    $conn = new ConexaoMySql("localhost", "root", "", "igreja");
    $row = $conn->GetConsulta("select Codigo, Nome from Pessoa");
    echo $row["Codigo"];
    echo $row["Nome"];
    */
    public function GetConsulta($sql)
    {
        try 
        {
            return $this->GetQuery($sql)->fetch();
        }
        catch (Exception $e)
        {
            Logger::Instance()->Erro("ConexaoMySql.GetConsulta", $e->getMessage());
            throw new Exception("Error " . $e->getMessage(), 1);
        }
    }    

    /*
    $conn = new ConexaoMySql("localhost", "root", "", "igreja");
    $conn->ExecComando("insert into Pessoa(Codigo, Nome) values ('$Codigo', '$Nome')");
    */
    public function ExecComando($cmd)
    {
        try 
        {
            return $this->ExecQuery($cmd);
        }
        catch (Exception $e)
        {
            Logger::Instance()->Erro("ConexaoMySql.ExecComando", $e->getMessage());
            throw new Exception("Error " . $e->getMessage(), 1);
        }

        //$this->GetConexao()->lastInsertId();

        //return true;
    }
}
?>