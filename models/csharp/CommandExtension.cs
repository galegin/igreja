using RetailApp.Dominio.Atributos;
using RetailApp.Dominio.Extensions;
using System;

namespace RetailApp.Repositorio.Extensions
{
    //-- miguel - 8/11/2017 8:24:29 AM ; ???

    public static class CommandExtension
    {
        //-- table

        private static string GetTable<TObject>()
        {
            return typeof(TObject).GetAttributeType<TabelaAttribute>().Nome;
        }

        //-- value

        private static string GetValueStr(this object value)
        {
            if (value == null) return "null";
            else if (value.GetType() == typeof(bool)) return "'" + ((bool)value ? "T" : "F");
            else if (value.GetType() == typeof(DateTime)) return "to_date('" + ((DateTime)value).ToString("dd/MM/yyyy hh:mm:ss") + "', 'DD/MM/YYYY HH24:MI:SS')";
            //else if (value.GetType() == typeof(DateTime)) return "'" + ((DateTime)value).ToString("yyyy-MM-dd hh:mm:ss") + "'";
            else if (value.GetType() == typeof(decimal)) return value.ToString().Replace(",", ".");
            else if (value.GetType() == typeof(double)) return value.ToString().Replace(",", ".");
            else if (value.GetType() == typeof(int)) return value.ToString();
            else if (value.GetType() == typeof(string)) return "'" + value.ToString().Replace("'", "''") + "'";
            else return value.ToString();
        }

        //-- add

        public static void AddString(ref string str, string val, string ini, string sep = "")
        {
            str += (!string.IsNullOrWhiteSpace(str) ? ini : sep) + val;
        }

        //-- select

        public static string GetSelect<TObject>(string where = "")
        {
            var table = GetTable<TObject>();
            var fieldsAtr = string.Empty;
            var fields = string.Empty;

            foreach (var prop in typeof(TObject).GetProperties())
            {
                var campo = prop.GetAttributeProp<CampoAttribute>();
                if (campo != null)
                {
                    AddString(ref fieldsAtr, prop.Name + " as \"" + prop.Name + "\"", ", ");
                    AddString(ref fields, campo.Nome + " as " + prop.Name, ", ");
                }
            }

            return $"select {fieldsAtr} from (select {fields} from {table})" +
                (!string.IsNullOrWhiteSpace(where) ? " where " + where : "");
        }

        public static string GetSelect<TObject>(this TObject obj)
        {
            var where = string.Empty;

            foreach (var prop in typeof(TObject).GetProperties())
            {
                var campo = prop.GetAttributeProp<CampoAttribute>();
                if (campo != null && campo.IsKey)
                    AddString(ref where, prop.Name + " = " + prop.GetValue(obj).GetValueStr(), " and ");
            }

            return GetSelect<TObject>(where);
        }

        //-- insert

        public static string GetInsert<TObject>(this TObject obj)
        {
            var table = GetTable<TObject>();
            var campos = string.Empty;
            var values = string.Empty;

            foreach (var prop in typeof(TObject).GetProperties())
            {
                var campo = prop.GetAttributeProp<CampoAttribute>();
                if (campo != null)
                {
                    AddString(ref campos, campo.Nome, ", ");
                    AddString(ref values, prop.GetValue(obj).GetValueStr(), ", ");
                }
            }

            return $"insert into {table} ({campos}) values ({values})";
        }

        //-- update

        public static string GetUpdate<TObject>(this TObject obj)
        {
            var table = GetTable<TObject>();
            var sets = string.Empty;
            var where = string.Empty;

            foreach (var prop in typeof(TObject).GetProperties())
            {
                var campo = prop.GetAttributeProp<CampoAttribute>();
                if (campo != null)
                {
                    if (campo.IsKey)
                        AddString(ref where, campo.Nome + " = " + prop.GetValue(obj).GetValueStr(), " and ");
                    else
                        AddString(ref sets, campo.Nome + " = " + prop.GetValue(obj).GetValueStr(), ", ");
                }
            }

            return $"update {table} set {sets} where {where}";
        }

        //-- delete

        public static string GetDelete<TObject>(this TObject obj)
        {
            var table = GetTable<TObject>();
            var where = string.Empty;

            foreach (var prop in typeof(TObject).GetProperties())
            {
                var campo = prop.GetAttributeProp<CampoAttribute>();
                if (campo != null && campo.IsKey)
                    AddString(ref where, campo.Nome + " = " + prop.GetValue(obj).GetValueStr(), " and ");
            }

            return $"delete from {table} where {where}";
        }
    }
}
