<?php

class Contexto
{
    public $Database;
    public $Username;
    public $Password;
    public $Hostname;
    public $Conexao;

    function __construct($database, $username, $password, $hostname)
    {
        $METHOD = "Contexto.__construct()";
        Logger::Instance()->Info($METHOD, "");
        $this->Database = $database;
        $this->Username = $username;
        $this->Password = $password;
        $this->Hostname = $hostname;
        $this->SetConexao();
    }

    //-- lista

    public function GetLista($class, $where)
    {
        $lista = new ArrayObject();

        $sql = Select::GetSelect($class, $where);
        $query = $this->$Conexao->GetConsulta($sql);

        foreach ($query as $record)
        {
            $obj = new $class;
            Objeto::SetValues($obj, $record);
            $lista->append($obj);
        }

        return $lista;
    }
    
    public function SetLista($lista)
    {
        foreach ($lista as $obj)
        {
            $sql = Select::GetSelectObj($obj);
            $query = $this->$Conexao->GetConsulta($sql);
            $cmd = "";
            if (isset($query))
                $cmd = Comando::GetUpdate($obj);
            else
                $cmd = Comando::GetInsert($obj);
            $this->$Conexao->ExecComando($cmd);
        }
    }

    public function RemLista($lista)
    {
        foreach ($lista as $obj)
        {
            $cmd = Comando::GetDelete($obj);
            $this->$Conexao->ExecComando($cmd);
        }
    }

    //-- objeto
    
    public function GetObjeto($class, $where)
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