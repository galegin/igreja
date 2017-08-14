﻿using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Entity;
using System.Linq;

namespace RetailApp.Repositorio.Extensions
{
    //-- miguel - 8/10/2017 1:37:45 PM ; ???

    public static class DataContextExtension
    {
        public static int QtdeRegistro(this DbContext context, string sql)
        {
            var connection = context.Database.Connection;            
            var state = connection.State;
            if (state == ConnectionState.Closed)
                connn.Open();
            
            var retorno = -1;

            try
            {
                var command = connection.CreateCommand();
                command.CommandText = $"select count(*) from ({sql})";
                retorno = Convert.ToInt32(command.ExecuteScalar());
            }
            finally
            {
                if (state == connectionState.Closed)
                    connection.Close();
            }
            
            return retorno;
        }

        public static int CreateTable(this DbContext context, string table, string cmd)
        {
            var retorno = -1;
            
            try
            {
                retorno = context.QtdeRegistro($"select * from {table}");
            }
            catch {}
            
            if (retorno == -1)
                context.ExecComando(cmd);
        }
        
        public static void ExecComando(this DbContext context, string cmd)
        {
            var connection = context.Database.Connection;
            var state = connection.State;
            if (state == ConnectionState.Closed)
                connection.Open();

            try
            {
                var command = connection.CreateCommand();
                command.CommandText = cmd;
                command.ExecuteNonQuery();
            }
            finally
            {
                if (state == ConnectionState.Closed)
                    connection.Close();
            }
        }

        public static List<TObject> GetLista<TObject>(this DbContext context, string where = "")
        {
            var connection = context.Database.Connection;
            var state = connection.State;
            if (state == ConnectionState.Closed)
                connection.Open();

            var lista = new List<TObject>();

            try
            {
                var command = connection.CreateCommand();
                command.CommandText = CommandExtension.GetSelect<TObject>(where);
                var reader = command.ExecuteReader();
                while (reader.Read())
                {
                    TObject obj = Activator.CreateInstance<TObject>();

                    for (int i = 0; i < reader.FieldCount; i++)
                    {
                        var prop = obj.GetType().GetProperties()
                            .FirstOrDefault(x => x.Name == reader.GetName(i));
                        if (prop != null)
                        {
                            var value = (
                                reader.IsDBNull(i) ? null :
                                prop.PropertyType == typeof(bool) ? ".1.S.SIM.T.TRUE.".Contains(Convert.ToString(reader.GetValue(i))) :
                                prop.PropertyType == typeof(DateTime) ? Convert.ToDateTime(reader.GetValue(i)) :
                                prop.PropertyType == typeof(decimal) ? Convert.ToDecimal(reader.GetValue(i)) :
                                prop.PropertyType == typeof(double) ? Convert.ToDouble(reader.GetValue(i)) :
                                prop.PropertyType == typeof(int) ? Convert.ToInt32(reader.GetValue(i)) :
                                prop.PropertyType == typeof(string) ? Convert.ToString(reader.GetValue(i)) : reader.GetValue(i));
                            prop.SetValue(obj, value);
                        }
                    }

                    lista.Add(obj);
                }
                reader.Close();
            }
            finally
            {
                if (state == ConnectionState.Closed)
                    connection.Close();
            }

            return lista;
        }

        public static void SetLista<TObject>(this DbContext context, List<TObject> objs)
        {
            var connection = context.Database.Connection;
            var state = connection.State;
            if (state == ConnectionState.Closed)
                connection.Open();

            try
            {
                var command = connection.CreateCommand();
                foreach (var obj in objs)
                {
                    command.CommandText = obj.GetSelect();
                    var reader = command.ExecuteReader();
                    var existe = reader.Read();
                    reader.Close();
                    if (existe)
                        command.CommandText = obj.GetUpdate();
                    else
                        command.CommandText = obj.GetInsert();
                    command.ExecuteNonQuery();
                }
            }
            finally
            {
                if (state == ConnectionState.Closed)
                    connection.Close();
            }
        }

        public static void RemLista<TObject>(this DbContext context, List<TObject> objs)
        {
            var connection = context.Database.Connection;
            var state = connection.State;
            if (state == ConnectionState.Closed)
                connection.Open();

            try
            {
                var command = connection.CreateCommand();
                foreach (var obj in objs)
                {
                    command.CommandText = obj.GetDelete();
                    command.ExecuteNonQuery();
                }
            }
            finally
            {
                if (state == ConnectionState.Closed)
                    connection.Close();
            }
        }
    }
}