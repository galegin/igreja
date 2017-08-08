
require_once("logger.php");

public class ConexaoMySql
{
    public string Hostname { get; set; }
    public string Username { get; set; }
    public string Password { get; set; }
    public string Database { get; set; }

    private Conexao _conexao;

    public ConexaoMySql(string hostname, string username, string password, string database)
    {
        this.Hostname = hostname;
        this.Username = username;
        this.Password = password;
        this.Database = database;
    }

    private Conexao GetConexao()
    {
        if (this._conexao == null)
        {
            this._conexao = new PDO("mysql:host=this.Hostname;dbname=this.Database", this.Username, this.Password);

            this._conexao.setAttribute(PDO.ATTR_ERRMODE, PDO.ERRMODE_EXCEPTION);
            
            if (this._conexao == null)
                throw new Exception("Erro ao connectar", 1);
        }

        return this._conexao;
    }

    //--

    private DbDataReader GetQuery(sql)
    {
        Logger.Instance().Info("ConexaoMySql.GetQuery", "sql: " . sql);

        if (is_null(sql))
            throw new Exception("Consulta deve ser informada", 1);

        var query = this.GetConexao().query(sql);

        if (!query) 
            throw new Exception("Erro ao efetuar consulta / sql: " . sql, 1);

        return query;
    }

    private bool ExecQuery(cmd)
    {
        Logger.Instance().Info("ConexaoMySql.ExecQuery", "cmd: " . cmd);

        if (is_null(cmd))
            throw new Exception("Comando deve ser informado", 1);

        var query = this.GetConexao().exec(cmd);

        return query;
    }

    /*
    conn = new ConexaoMySql("localhost", "root", "", "igreja");
    result = conn.GetLista("select Codigo, Nome from Pessoa");
    while(row = result.fetch_assoc())
    {
        echo row["Codigo"];
        echo row["Nome"];
    }
    */
    public DbDataReader GetLista(sql)
    {
        try 
        {
            return this.GetQuery(sql).fetchAll();
        }
        catch (Exception e)
        {
            Logger.Instance().Erro("ConexaoMySql.GetLista", e.getMessage());
            throw new Exception("Error " . e.getMessage(), 1);
        }
    }

    /*
    conn = new ConexaoMySql("localhost", "root", "", "igreja");
    row = conn.GetConsulta("select Codigo, Nome from Pessoa");
    echo row["Codigo"];
    echo row["Nome"];
    */
    public DbDataReader GetConsulta(sql)
    {
        try 
        {
            return this.GetQuery(sql).fetch(PDO.FETCH_ASSOC);
        }
        catch (Exception e)
        {
            Logger.Instance().Erro("ConexaoMySql.GetConsulta", e.getMessage());
            throw new Exception("Error " . e.getMessage(), 1);
        }
    }    

    /*
    conn = new ConexaoMySql("localhost", "root", "", "igreja");
    conn.ExecComando("insert into Pessoa(Codigo, Nome) values ('Codigo', 'Nome')");
    */
    public bool ExecComando(cmd)
    {
        try 
        {
            return this.ExecQuery(cmd);
        }
        catch (Exception e)
        {
            Logger.Instance().Erro("ConexaoMySql.ExecComando", e.getMessage());
            throw new Exception("Error " . e.getMessage(), 1);
        }
    }
}