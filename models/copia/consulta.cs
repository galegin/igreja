<?php 

require_once("modulo.php");

abstract class Consulta
{
    private Conexao _conexao;

    public Consulta()
    {
    }

    protected Conexao GetConexao()
    {
        if (this._conexao == null)
            this._conexao = Modulo.Instance().ConexaoAmbiente();

        return this._conexao;
    }

    //--

    public function GetLista(sql)
    {
        return this.GetConexao().GetLista(sql);
    }

    //--

    public void SetValues(values)
    {
        var keys = array_keys(values);

        foreach (keys as key)
        {
            //Logger.Instance().Info("Consulta.SetValues()", key . "=" . values[key]);
            this.{key} = values[key];
        }
    }

    public function GetValues()
    {
        var values = array();
        
        foreach (this as propName => propValue)
            values[propName] = propValue;
        
        return values;
    }

    //--

    protected string GetCmdListar(string where = "")
    {
        if (where == "")
            foreach (this as propName => propValue)
                if (isset(propValue))
                    where = where . (where != null ? " and " : "") . 
                        propName . " = '" . propValue . "'" ;

        var sql =
            'select * from ' . get_class(this) .
            (where != null ? ' where ' : '') . where ;

        Logger.Instance().Info("Consulta.GetSqlListar", "sql: " . sql);

        return sql;
    }

    //--

    public string Listar(string where = "")
    {
        class = get_class(this);

        var lista = new ArrayObject();

        var sql = this.GetCmdListar(where);
        
        var query = this.GetLista(sql);
        
        foreach (query as record) {
            obj = new class;
            obj.SetValues(record);
            lista.append(obj);
        }

        return lista;
    }
}