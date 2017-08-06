show create table agendaservico;
show create table apresentacao;
show create table atendente;
show create table localidade;
show create table observacao;
show create table reuniao;
show create table servico;
show create table tiposervico;

create if not exists table reuniao (
 Codigo int(11) auto_increment,
 Descricao varchar(100) not null,
 Data date not null,
 Data_Proxima date not null,
 Hora_Inicio varchar(5) null,
 Nome_Atende varchar(100) null,
 Palavra varchar(100) null,
 constraint reuniaop1 primary key on (Codigo)
);
 
create if not exists table localidade (
 Codigo int(11) auto_increment,
 Nome varchar(1000) not null,
 Tipo int(11) not null default 0,
 Anciao varchar(100) null,
 Diacono varchar(100) null,
 Cooperador varchar(100) null,
 Cooperador_Jovem varchar(100) null,
 Encarregado varchar(100) null,
 Dias_Culto varchar(100) null,
 Dias_Culto_Jovem varchar(100) null,
 constraint localidadep1 primary key on (Codigo)
);
 
create if not exists table tiposervico (
 Codigo int(11) auto_increment,
 Descricao varchar(4000) not null,
 Tipo int(11) not null default 0,
 Ordem int(11) null,
 constraint tiposervicop1 primary key on (Codigo)
);

create if not exists table atendente (
 Codigo int(11) auto_increment,
 Nome varchar(100) not null,
 Ministerio int(11) not null default 0,
 Administracao int(11) not null default 0,
 Codigo_Localidade int(11) null,
 Telefone_Pessoal varchar(20) null,
 Telefone_Trabalho varchar(20) null,
 Telefone_Recado varchar(20) null,
 Data_Apresentacao date null,
 constraint atendentep1 primary key on (Codigo)
 constraint atendente_localidade foreign key (Codigo_Localidade) references Localidade (Codigo)
);

create if not exists table agendaservico (
 Codigo int(11) auto_increment,
 Codigo_Tipo_Servico int(11) not null,
 Codigo_Localidade int(11) not null,
 Dia_Semana int(11) not null,
 Semana_Mes int(11) not null,
 Hora varchar(5) null,
 Complemento varchar(4000) null,
 Atendente varchar(1000) null,
 constraint agendaservicop1 primary key on (Codigo),
 constraint agendaservico_tiposervico foreign key (Codigo_Tipo_Servico) references TipoServico (Codigo),
 constraint agendaservico_localidade foreign key (Codigo_Localidade) references Localidade (Codigo)
);

create if not exists table apresentacao (
 Codigo int(11) auto_increment,
 Codigo_Reuniao int(11) not null,
 Codigo_Localidade int(11) not null,
 Tipo int(11) not null,
 Codigo_Tipo_Servico int(11) null,
 Funcao varchar(100) null,
 Nome varchar(100) null,
 constraint apresentacaop1 primary key on (Codigo),
 constraint apresentacao_reuniao foreign key (Codigo_Reuniao) references Reuniao (Codigo),
 constraint apresentacao_tiposervico foreign key (Codigo_Tipo_Servico) references TipoServico (Codigo),
 constraint apresentacao_localidade foreign key (Codigo_Localidade) references Localidade (Codigo)
);

create if not exists table observacao (
 Codigo int(11) auto_increment,
 Codigo_Reuniao int(11) not null,
 Descricao varchar(4000) not null,
 constraint agendaservicop1 primary key on (Codigo),
 constraint agendaservico_reuniao foreign key (Codigo_Reuniao) references Reuniao (Codigo),
);

create if not exists table servico (
 Codigo int(11) auto_increment,
 Codigo_Reuniao int(11) not null,
 Codigo_Tipo_Servico int(11) not null,
 Codigo_Localidade int(11) not null,
 Data_Inicio date not null,
 Data_Termino date null,
 Hora_Inicio varchar(5) not null,
 Hora_Termino varchar(5) null,
 Complemento varchar(4000) null,
 Atendente varchar(1000) null,
 Qtde_Irmao int(11) null,
 Qtde_Irma int(11) null,
 constraint servicop1 primary key on (Codigo),
 constraint servico_reuniao foreign key (Codigo_Reuniao) references Reuniao (Codigo),
 constraint servico_tiposervico foreign key (Codigo_Tipo_Servico) references TipoServico (Codigo),
 constraint servico_localidade foreign key (Codigo_Localidade) references Localidade (Codigo)
);