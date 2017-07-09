<!DOCTYPE html>
<html lang="pt-br">

<head>
<?php require_once("../include.php"); ?>
</head>

<body>

<?php require_once("../cabecalho.php"); ?>

<h2>Servico</h2>

<?php require_once("cad.botao.php"); ?>

<form id="frmCadBase">
    <div class="form-group">
        <label for="txtCodigo">Codigo</label>
        <input class="form-control" type="text" id="txtCodigo" value="" />
    <div>

    <div class="form-group">
        <label for="txtDescricao">Descricao</label>
        <input class="form-control" type="text" id="txtDescricao" value="" />
    <div>
</form>

<form id="frmBase">
<table>
<th>
    <td>Localidade</td>
    <td>Data</td>
    <td>Horario</td>
    <td>Atende</td>
    <td>Complemento</td>
</th>
<tr>
    <td><input id="txtLocalidade" value="Cianortinho" /></td>
    <td><input id="txtData" value="01/01/1900" /></td>
    <td><input id="txtHorario" value="19:30" /></td>
    <td><input id="txtAtende" value="Teste"/></td>
    <td><input id="txtComplemento" value="Rua" /></td>
</tr>
</table>
</form>

<?php require_once("../rodape.php"); ?>

</body>
</html>