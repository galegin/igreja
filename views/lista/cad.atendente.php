<!DOCTYPE html>
<html lang="pt-br">

<head>
<?php require_once("include.php"); ?>
</head>

<body>

<?php require_once("../cabecalho.php"); ?>

<h2>Atendente</h2>

<?php require_once("cad.botao.php"); ?>

<form id="frmCadAtendente">
    <div class="form-group">
        <label for="">Codigo</label>
        <input class="form-control" type="text" id="txtCodigo" value="" />
    </div>

    <div class="form-group">
        <label for="">Nome</label>
        <input class="form-control" type="text" id="txtNome" value="" />
    </div>

    <div class="form-group">
        <label for="">Ministerio</label>
        <select class="form-control" id="cmbMinisterio">
        <option value="0">Anciao</option>
        <option value="1">Diacono</option>
        <option value="2">Cooperador</option>
        <option value="3">Cooperador de Jovem</option>
        <option value="4">Encarregado Regional</option>
        <option value="5">Encarregado Local</option>
        <option value="6">Examinadora</option>    
        <option value="7">Instrutora</option>
        <option value="8">Organista</option>
        <option value="9">Administrador</option>
        </select>
    </div>

    <div class="form-group">
        <label for="">Administracao</label>
        <select class="form-control" id="cmbAdministracao">
        <option value="0">Presidente</option>
        <option value="1">Vice-Presidente</option>
        <option value="2">Secretario</option>
        <option value="3">Vice-Secretario</option>
        <option value="4">Tesoureiro</option>
        <option value="5">Vice-Tesoureiro</option>
        <option value="6">Contador</option>
        <option value="7">Conselho Fiscal</option>
        <option value="8">Aux. Secretaria</option>
        <option value="9">Aux. Livro</option>
        </select>
    </div>
</form>

<?php require_once("../rodape.php"); ?>

</body>
</html>