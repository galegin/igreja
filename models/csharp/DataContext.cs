﻿using System.Data.Entity;
using System.Diagnostics;

namespace RetailApp.Repositorio.Context
{
    //-- miguel - 8/4/2017 10:30:12 AM ; ???

    public class DataContext : DbContext
    {
        static DataContext()
        {
            //Database.DefaultConnectionFactory. = new OracleConnectionFactory();
        }

        public DataContext()
            : base("OracleDbContext")
        {
            Hostname = "ORAWEB";
            Username = "loginp";
            Password = "loginp";

            //Database.Log = x => Debug.WriteLine(x);
        }

        public DataContext(string hostname, string username, string password)
            : base(OracleHelper.GetConnection(hostname, username, password), true)
        {
            Hostname = hostname;
            Username = username;
            Password = password;

            //Database.Log = x => Debug.WriteLine(x);
        }

        public string Hostname { get; private set; }
        public string Username { get; private set; }
        public string Password { get; private set; }
    }
}
