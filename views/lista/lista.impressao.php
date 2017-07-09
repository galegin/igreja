<!DOCTYPE html>
<html lang="pt-br">

<head>
<?php require_once("include.php"); ?>
</head>

<body>

<?php require_once("../cabecalho.php"); ?>

<h2>Lista</h2>

<?php require_once("lista.botao.php"); ?>

<p>Reuniao
<input type="text" id="txtReuniao">
</p>

<table>
<tr>
    <td>Localidade</td>
    <td>Data</td>
    <td>Horario</td>
    <td>Atende</td>
    <td>Complemento</td>
</tr>
<tr>
    <td><input id="txtLocalidade" value="Cianortinho" size="30" /></td>
    <td><input id="txtData" value="01/01/1900" size="10" /></td>
    <td><input id="txtHorario" value="19:30" size="5" /></td>
    <td><input id="txtAtende" value="Teste" size="30" /></td>
    <td><input id="txtComplemento" value="Rua" size="30" /></td>
</tr>
</table>

<?php require_once("../rodape.php"); ?>

</body>
</html>