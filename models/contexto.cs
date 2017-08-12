public class DbDataReader
{
	public int Count { get; set; }
	
	public bool Read()
	{
		return true;
	}
	
	public void Close()
	{
	}

	public string GetName(int i)
	{
		return string.Empty;
	}
	
	public object GetValue(int i)
	{
		return null;
	}
}

public class Conexao
{
	public DbDataReader Listar(string sql)
	{		
		return new DbDataReader();
	}
	
	public void ExecComando(string cmd)
	{
	}
}

public class Database
{
	public Conexao Conexao { get; set; }
}

public static class Comando
{
	public static void AddString(ref string str, string val, string sep, string ini = "")
	{
		str += (!string.IsNullOrWhiteSpace(str) ? ini : sep) + val;
	}
	
	public static bool IsKey(this PropertyInfo atr)
	{
		return false;
	}
	
	public static bool IsCampo(this PropertyInfo atr)
	{
		return false;
	}

	public static string GetValueStr(this object value)
	{
		if (value == null) return "null";
		else if (value.GetType() == typeof(DateTime)) return "'" + ((DateTime)value).ToString("dd/MM/yyyy hh:mm:ss") + "'";
		else if (value.GetType() == typeof(double)) return ((double)value).ToString();
		else if (value.GetType() == typeof(int)) return ((int)value).ToString();
		else return "'" + value.ToString().Replace("'", "''") + "'";
	}
	
	public static string GetSelect<TObject>(string where = "")
	{
		var tabela = typeof(TObject).Name;
		var fieldsAtr = string.Empty;
		var fields = string.Empty;
		
		foreach (var atr in typeof(TObject).GetProperties())
		{
			if (atr.IsCampo())
			{
				AddString(ref fieldsAtr, atr.Name, ", ");
				AddString(ref fields, atr.Name, ", ");
			}
		}
		
		return 
			$"select {fieldsAtr} from (select {fields} from {tabela})" + 
				(!string.IsNullOrWhiteSpace(where) ? " where " + where : "");
	}

	public static string GetConsulta<TObject>(this TObject obj)
	{
		var where = string.Empty;

		foreach (var atr in typeof(TObject).GetProperties())
		{
			if (atr.IsKey())
			{
				var valueStr = atr.Name + " = " + atr.GetValue(obj).GetValueStr();
				AddString(ref where, valueStr, " and ");
			}
		}
		
		return GetSelect<TObject>(where);
	}

	public static string GetInsert<TObject>(this TObject obj)
	{
		var tabela = typeof(TObject).Name;
		var fields = string.Empty;
		var values = string.Empty;
		
		foreach (var atr in typeof(TObject).GetProperties())
		{
			if (atr.IsCampo())
			{
				AddString(ref fields, atr.Name, ", ");
				AddString(ref values, atr.GetValue(obj).GetValueStr(), ", ");
			}
		}

		return
			$"insert into {tabela} ({fields}) values ({values})";
	}
	
	public static string GetUpdate<TObject>(this TObject obj)
	{
		var tabela = typeof(TObject).Name;
		var sets = string.Empty;
		var where = string.Empty;
		
		foreach (var atr in typeof(TObject).GetProperties())
		{
			if (atr.IsCampo())
			{
				var valueStr = atr.Name + " = " + atr.GetValue(obj).GetValueStr();
				if (atr.IsKey())
					AddString(ref where, valueStr, " and ");
				else	
					AddString(ref sets, valueStr, " and ");
			}
		}

		return
			$"update {tabela} set {sets}) where {where}";
	}
	
	public static string GetDelete<TObject>(this TObject obj)
	{
		var tabela = typeof(TObject).Name;
		var where = string.Empty;
		
		foreach (var atr in typeof(TObject).GetProperties())
		{
			if (atr.IsKey())
			{			
				var valueStr = atr.Name + " = " + atr.GetValue(obj).GetValueStr();
				AddString(ref where, valueStr, " and ");
			}
		}

		return
			$"delete from {tabela} where {where}";
	}	
}

public class Contexto
{
	public Database Database { get; set; }

	public List<TObject> GetLista(string where = "")
	{
		var retorno = new List<TObject>();
		
		var sql = Comando.GetSelect<TObject>(where);
		
		var reader = Database.Conexao.Listar(sql);
		
		while (reader.Read())
		{
			TObject obj = Activator.CreateInstance(TObject);
			retorno.Add(obj);
			
			for (int i = 0; i < reader.Count; i++)
			{
				var cod = reader.GetName(i);
				var val = reader.GetValue(i);
				var atr = typeof(TObject).GetProperties().FirstOrDefault(x => x.Name == cod);
				if (atr != null)
					atr.SetValue(obj, val);			
			}
		}
		
		reader.Close();
		
		return retorno;
	}
	
	public void SetLista<TObject>(List<TObject> objs)
	{
		foreach (var obj in objs)
		{
			var sql = Comando.GetConsulta(obj);
			var reader = Database.Conexao.Listar(sql);
			var existe = reader.Read();
			reader.Close();
			var cmd = (existe ? Comando.GetUpdate(obj) : Comando.GetInsert(obj));
			Database.Conexao.ExecComando(cmd);
		}
	}
	
	public void RemLista<TObject>(List<TObject> objs)
	{
		foreach (var obj in objs)
		{
			var cmd = Comando.GetDelete(obj)
			Database.Conexao.ExecComando(cmd);
		}
	}
}