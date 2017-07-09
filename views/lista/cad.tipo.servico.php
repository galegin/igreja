<!DOCTYPE html>
<html lang="pt-br">

<head>

<?php require_once("include.php"); ?>

</head>

<body>

<?php require_once("../cabecalho.php"); ?>

<h2>Tipo Servico</h2>

<?php require_once("cad.botao.php"); ?>

<form id="frmCadTipoServico" action="" method="post">
    <div class="form-group">
        <label for="txtCodigo">Codigo</label>
        <input class="form-control" type="text" id="txtCodigo" name="Codigo" value="" />
    </div>

    <div class="form-group">
        <label for="txtDescricao">Descricao</label>
        <input class="form-control" type="text" id="txtDescricao" name="Descricao" value="" />
    </div>

    <div class="form-group">
        <label for="cmbTipo">Tipo</label>
        <select class="form-control" id="cmbTipo" name="Tipo">
        <option value="0">Servico</option>
        <option value="1">Batismo</option>
        <option value="2">Culto Ensinamento</option>
        <option value="3">Santa Ceia</option>
        <option value="4">Coleta</option>
        <option value="5">Reunia Mocidade</option>
        </select>
    </div>
</form>

<?php require_once("../../controllers/lista/tipo.servico.controller.js"); ?>

<?php require_once("../rodape.php"); ?>

</body>
</html>