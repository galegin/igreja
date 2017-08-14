unit mContexto;

(* mContexto *)

interface

uses
  Classes, SysUtils, StrUtils, DB, TypInfo, Math,
  mDatabase, mMapping, mParametro;

type
  TmContexto = class(TComponent)
  private
    FParametro: TmParametro;
    FDatabase: TmDatabase;
  protected
  public
    constructor Create(AOwner : TComponent); override;
    destructor Destroy; override;

    function GetLista(AClass : TClass; AWhere : String = '') : TList;
    procedure SetLista(AList : TList);
    procedure RemLista(AList : TList);
  published
    property Parametro : TmParametro read FParametro write FParametro;
    property Database : TmDatabase read FDatabase write FDatabase;
  end;

implementation

uses
  mComando;

(* mContexto *)

constructor TmContexto.Create(AOwner : TComponent);
begin
  inherited;

  FParametro := TmParametro.Create;

  FDatabase := TmDatabase.Create(Self);
  FDatabase.Conexao.Parametro := FParametro;
end;

destructor TmContexto.Destroy;
begin

  inherited;
end;

function TmContexto.GetLista(AClass: TClass; AWhere: String): TList;
var
  vPropInfo : PPropInfo;
  vTipoBase : String;
  vDataSet : TDataSet;
  vObject : TObject;
  vSql : String;
  I : Integer;
begin
  Result := TList.Create;

  vSql := TmComando.GetSelect(AClass, AWhere);

  vDataSet := FDatabase.Conexao.GetConsulta(vSql);
  with vDataSet do begin
    while not EOF do begin
      vObject := TComponentClass(AClass).Create(nil);
      Result.Add(vObject);

      for I := 0 to FieldCount - 1 do
        with Fields[I] do begin
          vPropInfo := GetPropInfo(vObject, FieldName);
          vTipoBase := vPropInfo^.PropType^.Name;
          if vTipoBase = 'Boolean' then // mObjeto
            SetOrdProp(vObject, FieldName, IfThen(AsString = 'T', 1, 0))
          else if vTipoBase = 'TDateTime' then
            SetFloatProp(vObject, FieldName, AsDateTime)
          else if vTipoBase = 'Real' then
            SetFloatProp(vObject, FieldName, AsFloat)
          else if vTipoBase = 'Integer' then
            SetOrdProp(vObject, FieldName, AsInteger)
          else if vTipoBase = 'String' then
            SetStrProp(vObject, FieldName, AsString);
        end;

      Next;
    end;
  end;
end;

procedure TmContexto.SetLista(AList: TList);
var
  vDataSet : TDataSet;
  vSql, vCmd : String;
  I : Integer;
begin
  for I := 0 to AList.Count - 1 do begin
    vSql := TmComando.GetSelect(AList[I]);
    vDataSet := FDatabase.Conexao.GetConsulta(vSql);
    if not vDataSet.IsEmpty then
      vCmd := TmComando.GetUpdate(AList[I])
    else
      vCmd := TmComando.GetInsert(AList[I]);
    FDatabase.Conexao.ExecComando(vCmd);
  end;
end;

procedure TmContexto.RemLista(AList: TList);
var
  vCmd : String;
  I : Integer;
begin
  for I := 0 to AList.Count - 1 do begin
    vCmd := TmComando.GetDelete(AList[I]);
    FDatabase.Conexao.ExecComando(vCmd);
  end;
end;

end.