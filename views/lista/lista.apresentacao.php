<!DOCTYPE html>
<html lang="pt-br">

<head>
<?php require_once("include.php"); ?>
</head>

<body>

<?php require_once("../cabecalho.php"); ?>

<h2>Apresentacao</h2>

<?php require_once("lista.botao.php"); ?>

<form id="frmFiltro">
    <div class="form-group">
        <label for="txtReuniao">Reuniao</label>
        <select class="form-control" id="cmbCodigo_Reuniao" name="Codigo_Reuniao" >
        <?php 
            require_once("../../services/lista/reuniao.service.php");
            $reuniao = ReuniaoService::ReuniaoAtual();
            echo '<option value="' . $reuniao->Codigo . '">' . $reuniao->Descricao . '</option>' . "\n";
        ?>
        </select>
    </div>
</form>

<h3>Servico(s) a ser(em) confirmado(s)</h3>

<div class="table-responsive">
    <table class="table">
        <tbody>
            <tr>
                <th>Tipo Servico</th>
                <th>Localidade</th>
            </tr>
            <tr>
                <td>Batismo</td>
                <td>Cianortinho</td>
            </tr>
        </tbody>
    </table>
</div>

<h3>Servico(s) a ser(em) apresentado(s)</h3>

<div class="table-responsive">
    <table class="table">
        <tbody>
            <tr>
                <th>Tipo Servico</th>
                <th>Localidade</th>
            </tr>
            <tr>
                <td>Culto de evangelizacao</td>
                <td>Cianortinho</td>
            </tr>
        </tbody>
    </table>
</div>

<h3>Irmao(s) a ser(em) apresentado(s)</h3>

<div class="table-responsive">
    <table class="table">
        <tbody>
            <tr>
                <th>Localidade</th>
                <th>Funcao</th>
                <th>Nome</th>
            </tr>
            <tr>
                <td>Cianortinho</td>
                <td>Atendento de Sanitario</td>
                <td>Jose</td>
            </tr>
        </tbody>
    </table>
</div>

<?php require_once("../rodape.php"); ?>

</body>
</html>