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
        <label for="txtData_Proxima">Data Proxima</label>
        <input class="form-control" type="date" id="txtData_Proxima" value="" />
    <div>

    <div class="form-group">
        <label for="txtHora_Inicio">Hora Inicio</label>
        <input class="form-control" type="text" id="txtHora_Inicio" value="" />
    <div>

    <div class="form-group">
        <label for="txtNome_Atende">Atende</label>
        <input class="form-control" type="text" id="txtNome_Atende" value="" size="50%" />
    <div>

    <div class="form-group">
        <label for="txtPalavra">Palavra</label>
        <input class="form-control" type="text" id="txtPalavra" alue="" size="50%" />
    </div>
</form>

<?php require_once("../../controllers/lista/reuniao.controller.js"); ?>
<?php require_once("../../controllers/cad.controller.js"); ?>

<?php require_once("../rodape.php"); ?>

</body>
</html>