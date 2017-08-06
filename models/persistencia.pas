unit Perstencia;

//require_once('modulo.php');
//require_once('consulta.php');

interface

type
    TPersistencia = class(TConsulta)
    public
    end;    

implementation

constructor TPesistencia.Create();
begin
end;

//--

function TPersistencia.get_class(obj : object) : string;
begin
    result := obj.ClassName;
end;

//--

function TPersistencia.get_codigo(obj : object) : string;
begin
    result := GetPropValue(self, 'Codigo');
end;

function TPersistencia.set_codigo(obj : object; val : object) : string;
begin
    SetPropValue(self, 'Codigo', val);
end;

//--

function TPersistencia.GetConsulta(sql : string) : object;
begin
    result := self.GetConexao().GetConsulta(sql);
end;

function TPersistencia.ExecComando(cmd : string) : boolean;
begin
    result := self.GetConexao().ExecComando(cmd);
end;

//--

function TPersistencia.GetCmdConsultar(where : string = '') : string;
var
    sql : string;
begin
    if (where <> '') then
        where := ' where ' + where ;
    else
        where := ' where Codigo = ' + get_codigo(self) + '' ;

    sql := 
        'select * from ' + get_class(self) +
        where ;

    Logger.Instance.Info('Pesistencia.GetCmdConsultar', 'sql: ' + sql);

    result := sql;
end;

function TPersistencia.GetCmdIncluir() : string;
var
    names, values, sql : string;
begin
    names := '';
    values := '';

    for (self as propName => propValue) do begin
        names := names + IfThen(names <> '', ',', '') + propName;
        values := values + IfThen(values <> '', ',', '') + 
            IfThen(propValue <> '', '''' + propValue + '''', 'null') ;
    end;

    sql := 
        'insert into ' + get_class(self) +
        ' (' + names + ') values (' + values + ') ' ;

    Logger.Instance.Info('Pesistencia.GetCmdIncluir', 'sql: ' + sql);

    result := sql;        
end;

function TPersistencia.GetCmdAlterar() : string;
var 
    sets, sql : string;
begin
    sets := '';

    for (self as propName => propValue) do
        if (propName <> 'Codigo')
            sets := sets + IfThen(sets <> '', ', ', '') +
                propName + ' = ' + IfThen(propValue <> '', '''' + propValue + '''', 'null') ;

    sql := 
        'update ' + get_class(self) +
        ' set ' + sets +
        ' where Codigo = ' + get_codigo(self) + '' ;

    Logger.Instance.Info('Pesistencia.GetCmdAlterar', 'sql: ' + sql);

    result := sql;        
end;

function TPersistencia.GetCmdExcluir() : string;
var
    sql : string;
begin
    sql := 
        'delete from ' + get_class(self) +
        ' where Codigo = ' + get_codigo(self) + '' ;

    Logger.Instance.Info('Pesistencia.GetCmdExcluir', 'sql: ' + sql);

    result := sql;
end;

//--

function TPersistencia.Consultar(where : string = '') : object;
var
    _record : object;
begin
    _record := self.GetConsulta(self.GetCmdConsultar(where));
    
    self.SetValues(_record);

    result := self;
end;

//--

function TPersistencia.Incluir() : boolean;
var
    retorno : boolean;
begin
    retorno = self.ExecComando(self.GetCmdIncluir());

    set_codigo(self, self.GetConexao().lastInsertId());

    result := retorno;
end;

function TPersistencia.Alterar() : boolean;
begin
    result := self.ExecComando(self.GetCmdAlterar());
end;

function TPersistencia.Excluir() : boolean;
begin
    result := self.ExecComando(self.GetCmdExcluir());
end;

//--

function TPersistencia.Salvar() : boolean;
var
    codigo : object;
begin
    codigo := get_codigo(self);

    if assigned(codigo) then begin
        _record = self.GetConsulta(self.GetCmdConsultar());
        codigo = _record['Codigo'];
    end;
    
    if not assigned(codigo) then
        result := self.Incluir();
    else
        result := self.Alterar();
end;

end.