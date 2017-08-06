
require_once("modulo.php");
require_once("consulta.php");

public class abstract Persistencia : Consulta
{
    public Pesistencia()
    {
    }

    //--

    public string get_class(object obj)
    {
        return obj.GetType().Name;
    }

    //--

    public string get_codigo(object obj)
    {
        var prop in obj.GetType().GetProperties().FirstOrDefault(x => x.Name == "Codigo");
        return prop.GetValue(obj, null);
    }

    public string set_codigo(object obj, object val)
    {
        var prop in obj.GetType().GetProperties().FirstOrDefault(x => x.Name == "Codigo");
        return prop.SetValue(obj, val);
    }

    //--

    public string GetConsulta(string sql)
    {
        return this.GetConexao().GetConsulta(sql);
    }

    public string ExecComando(string cmd)
    {
        return this.GetConexao().ExecComando(cmd);
    }

    //--

    protected string GetCmdConsultar(string where = "")
    {

        if (where != "")
            where = " where " + where ;
        else
            where = " where Codigo = " + get_codigo(this) + "" ;

        var sql = 
            "select * from " + get_class(this) +
            where ;

        Logger.Instance.Info("Pesistencia.GetCmdConsultar", "sql: " + sql);

        return sql;
    }

    protected string GetCmdIncluir()
    {
        var names = "";
        var values = "";

        foreach (var prop in GetType().GetProperties())
        {
            names += (names != "" ? "," : "") + prop.ame;
            var val = prop.GetValue(obj, null); 
            values += (values != "" ? "," : "") +
                (!string.IsNullOrEmpty(val) ? "'" + val + "'" : "null") ;
        }

        var sql = 
            "insert into " + get_class(this) +
            " (" + names + ") values (" + values + ") " ;

        Logger.Instance.Info("Pesistencia.GetCmdIncluir", "sql: " + sql);

        return sql;
    }

    protected string GetCmdAlterar()
    {
        var sets = "";

        foreach (var prop in GetType().GetProperties())
            if (prop.Name != "Codigo")
            {
                var val = prop.GetValue(obj, null); 
                sets += (sets != "" ? ", " : "") +
                    prop.Name + " = " + (!string.IsNullOrEmpty(val) ? "'" + val + "'" : "null") ;
            }

        var sql = 
            "update " + get_class(this) +
            " set " + sets +
            " where Codigo = " + get_codigo(this) + "" ;

        Logger.Instance.Info("Pesistencia.GetCmdAlterar", "sql: " + sql);

        return sql;        
    }

    protected string GetCmdExcluir()
    {
        var sql = 
            "delete from " + get_class(this) +
            " where Codigo = " + get_codigo(this) + "" ;

        Logger.Instance.Info("Pesistencia.GetCmdExcluir", "sql: " + sql);

        return sql;
    }

    //--

    public string Consultar(string where = "")
    {
        var record = this.GetConsulta(this.GetCmdConsultar(where));
        
        this.SetValues(record);

        return this;
    }

    //--

    public bool Incluir()
    {
        var retorno = this.ExecComando(this.GetCmdIncluir());

        set_codigo(this, this.GetConexao().lastInsertId());

        return retorno;
    }

    public bool Alterar()
    {
        return this.ExecComando(this.GetCmdAlterar());
    }

    public bool Excluir()
    {
        return this.ExecComando(this.GetCmdExcluir());
    }

    //--

    public bool Salvar()
    {
        var codigo = prop.GetValue(this, null);

        if (codigo != null)
        {
            var record = this.GetConsulta(this.GetCmdConsultar());
            codigo = record["Codigo"];
        }
        
        if (codigo == null)
            return this.Incluir();
        else
            return this.Alterar();
    }
}