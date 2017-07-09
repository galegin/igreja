<!DOCTYPE html>
<html lang="pt-br">

<head>
<?php require_once("include.php"); ?>
</head>

<body>

<?php require_once("../cabecalho.php"); ?>

<h2>Apresentacao</h2>

<?php require_once("lista.botao.php"); ?>

<p>Reuniao
<input type="text" id="txtReuniao">
</p>

<h3>Servico(s) a ser(em) confirmado(s)</h3>

<table>
<tr>
    <td>Tipo Servico</td>
    <td>Localidade</td>
</tr>
<tr>
    <td><input id="txtTipoServico" value="Batismo" /></td>
    <td><input id="txtLocalidade" value="Cianortinho" /></td>
</tr>
</table>

<h3>Servico(s) a ser(em) apresentado(s)</h3>

<table>
<tr>
    <td>Tipo Servico</td>
    <td>Localidade</td>
</tr>
<tr>
    <td><input id="txtTipoServico" value="Culto de evangelizacao" /></td>
    <td><input id="txtLocalidade" value="Cianortinho" /></td>
</tr>
</table>

<h3>Irmao(s) a ser(em) apresentado(s)</h3>

<table>
<tr>
    <td>Localidade</td>
    <td>Funcao</td>
    <td>Nome</td>
</tr>
<tr>
    <td><input id="txtLocalidade" value="Cianortinho" /></td>
    <td><input id="txtFuncao" value="Atendento de Sanitario" /></td>
    <td><input id="txtNome" value="Jose" /></td>
</tr>
</table>

<?php require_once("../rodape.php"); ?>

</body>
</html>