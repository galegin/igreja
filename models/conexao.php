<?php
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
            $this->_conexao = new PDO("mysql:host=$this->Hostname;dbname=$this->Database;charset=utf8mb4", $this->Username, $this->Password);
            
            if (!$this->_conexao)
            {
                die("Erro ao connectar");
            }
        }

        return $this->_conexao;
    }

    //--

    private function GetQuery($sql)
    {
        if (is_null($sql))
        {
            die("Consulta deve ser informada");
        }

        $query = $this->GetConexao()->query($sql);

        if ($query->numRows() = 0) 
        {
            die("Erro ao efetuar consultar");
        }

        return $query;
    }

    private function ExecQuery($cmd)
    {
        if (is_null($cmd))
        {
            die("Comando deve ser informado");
        }

        $query = $this->GetConexao()->exec($cmd);

        if (!$query)
        {
            die("Erro ao eExecutar comando");
        }

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
        catch (PDOException $ex)
        {
            return null;
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
        catch (PDOException $ex)
        {
            return null;
        }
    }    

    /*
    $conn = new ConexaoMySql("localhost", "root", "", "igreja");
    $conn->ExecComando("insert into Pessoa(Codigo, Nome) values ('Codigo', '$Nome')");
    */
    public function ExecComando($cmd)
    {
        try 
        {
            return $this->ExecQuery($cmd);
        }
        catch (PDOException $ex)
        {
            return null;
        }

        //$this->GetConexao()->lastInsertId();

        return true;
    }
}
?>