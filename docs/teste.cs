[Tabela("PES_PESSOA")]
public class Pessoa
{
    [Campo("CD_PESSOA", TipoField.Key)]
    public int Codigo;

    [Campo("NM_PESSOA", TipoField.Req)]
    public string Nome;

    [Campo("TP_PESSOA", TipoField.Req)]
    public string Tipo;
}

/*
select * from (
    select CD_PESSOA as Codigo
    , NM_PESSOA as Nome
    , TP_PESSOA as Tipo
    form PES_PESSOA
)
*/

var pessoas = contexto.Set<Pessoa>.GetLista();
var pessoas = contexto.Set<Pessoa>.GetLista("TP_PESSOA = 'F'");
var pessoas = contexto.Set<Pessoa>.GetLista("Codigo = 1");
var pessoas = contexto.Set<Pessoa>.GetLista(nameof(Pessoa.Codigo) + " = 1");
var pessoas = contexto.Set<Pessoa>.GetLista($"{nameof(Pessoa.Codigo)} = 1");