<!DOCTYPE html>
<html lang="pt-br">

<head>
<?php require_once("include.php"); ?>
</head>

<body>

<?php require_once("../cabecalho.php"); ?>

<h2>Lista Batismo</h2>

<?php require_once("lista.botao.php"); ?>

<form id="frmFiltro">
    <div class="form-group">
        <label for="cmbCodigo_Reuniao">Reuniao</label>
        <select class="form-control" id="cmbCodigo_Reuniao" name="Codigo_Reuniao" >
        <?php 
            require_once("../../services/lista/reuniao.service.php");
            $reuniao = ReuniaoService::ReuniaoAtual();
            echo '<option value="' . $reuniao->Codigo . '">' . $reuniao->Descricao . '</option>' . "\n";
        ?>
        </select>
    </div>
</form>

<div class="table-responsive">
    <table class="table">
        <tbody>
            <tr>
                <td>Localidade</td>
                <td>Data</td>
                <td>Horario</td>
                <td>Anciao</td>
                <td>Irmao</td>
                <td>Irma</td>
            </tr>
            <tr>
                <td>Cianortinho</td>
                <td>01/01/1900</td>
                <td>19:30</td>
                <td>Teste</td>
                <td>0</td>
                <td>0</td>
            </tr>
        </tbody>
    </table>
</div>

<?php require_once("../rodape.php"); ?>

</body>
</html>