<!DOCTYPE html>
<html lang="pt-br">

<head>
<?php require_once("include.php"); ?>
</head>

<body>

<?php require_once("../cabecalho.php"); ?>

<h2>Reuniao</h2>

<?php require_once("cad.botao.php"); ?>

<form id="frmCadReuniao">
    <div class="form-group">
        <label for="txtCodigo">Codigo</label>
        <input class="form-control" type="text" id="txtCodigo" value="" />
    <div>

    <div class="form-group">
        <label for="txtDescricao">Descricao</label>
        <input class="form-control" type="text" id="txtDescricao" value="" />
    <div>

    <div class="form-group">
        <label for="txtData">Data</label>
        <input class="form-control" type="date" id="txtData" value="" />
    <div>

    <div class="form-group">
        <label for="txtDataProxima">Data Proxima</label>
        <input class="form-control" type="date" id="txtDataProxima" value="" />
    <div>

    <div class="form-group">
        <label for="txtHoraInicio">Hora Inicio</label>
        <input class="form-control" type="text" id="txtHoraInicio" value="" />
    <div>

    <div class="form-group">
        <label for="txtAtende">Atende</label>
        <input class="form-control" type="text" id="txtAtende" value="" size="50%" />
    <div>

    <div class="form-group">
        <label for="txtPalavra">Palavra</label>
        <input class="form-control" type="text" id="txtPalavra" value="" size="50%" />
    </div>
</form>

<?php require_once("../rodape.php"); ?>

</body>
</html>