create or replace view ServicoConsulta as
select s.Codigo as Codigo_Servico
, s.Codigo_Reuniao
, r.Descricao as Descricao_Reuniao
, s.Codigo_Tipo_Servico
, t.Descricao as Descricao_Tipo_Servico
, t.Tipo as Tipo_Servico
, t.Ordem as Ordem_Servico
, s.Codigo_Localidade
, l.Nome as Nome_Localidade
, s.Data_Inicio
, s.Data_Termino
, s.Hora_Inicio
, s.Hora_Termino
, s.Complemento
, s.Atendente
, s.Qtde_Irmao
, s.Qtde_Irma
from Servico s
inner join Reuniao r on (r.Codigo = s.Codigo_Reuniao)
inner join TipoServico t on (t.Codigo = s.Codigo_Tipo_Servico)
inner join Localidade l on (l.Codigo = s.Codigo_Localidade)
order by t.Ordem, t.Descricao, s.Data_Inicio, s.Hora_Inicio, l.Nome
;

create or replace view IgrejaServicoConsulta as
select l.Codigo as Codigo_Localidade
, l.Nome as Nome_Localidade
, l.Tipo as Tipo_Localidade
, s.Codigo_Servico
, s.Codigo_Reuniao
, s.Descricao_Reuniao
, t.Codigo as Codigo_Tipo_Servico
, t.Descricao as Descricao_Tipo_Servico
, t.Tipo as Tipo_Servico
, t.Ordem as Ordem_Servico
, s.Data_Inicio
, s.Data_Termino
, s.Hora_Inicio
, s.Hora_Termino
, s.Complemento
, s.Atendente
, s.Qtde_Irmao
, s.Qtde_Irma
from Localidade l
inner join TipoServico t
left outer join ServicoConsulta s on (s.Codigo_Localidade = l.Codigo and s.Tipo_Servico = t.Tipo)
order by l.Nome
;