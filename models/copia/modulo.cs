
require_once("conexao.php");

define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "igreja");

public class Modulo
{
    private static instance;

    public static Modulo Instance()
    {
        if (instance == null)
            instance = new Modulo();

        return self.instance;
    } 

    private Modulo()
    {        
    }

    private List<Conexao> _list_conexao = 
        new List<Conexao>();

    public Conexao GetConexao(string nome)
    {
        var conexao = this._list_conexao[nome];
        
        if (conexao == null)
        {
            conexao = new ConexaoMySql(HOSTNAME, USERNAME, PASSWORD, DATABASE);
            this._list_conexao[nome] = conexao;
        }

        return conexao;
    }

    public Conexao ConexaoAmbiente()
    {
        return this.GetConexao("ambiente");
    }
    
    public Conexao ConexaoGlobal()
    {
        return this.GetConexao("global");
    }
    
    public Conexao ConexaoLogin()
    {
        return this.GetConexao("global");
    }
}