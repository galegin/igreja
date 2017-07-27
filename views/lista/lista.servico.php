<!DOCTYPE html>
<html lang="pt-br">

<head>
<?php require_once("include.php"); ?>
</head>

<script>
function AlterarServico(codigo)
{
    alert("AlterarServico -> codigo: " + codigo);
}

function ExcluirServico(codigo)
{
    alert("ExcluirServico -> codigo: " + codigo);
}
</script>

<body>

<?php require_once("../cabecalho.php"); ?>

<h2>Lista Servico</h2>

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

<div class="table-responsive">
    <table class="table">
        <tr>
            <td>Localidade</td>
            <td>Data</td>
            <td>Horario</td>
            <td>Atende</td>
            <td>Complemento</td>
            <td></td>
        </tr>
        <?php
            require_once("../../services/lista/servico.service.php");
            $lista = ServicoService::ListaServicoReuniao($reuniao->Codigo);
            foreach ($lista as $servicolista) {
                echo '<tr>' . "\n";
                echo '<td>' . $servicolista->Nome_Localidade . '</td>' . "\n";
                echo '<td>' . $servicolista->Data_Inicio . '</td>' . "\n";
                echo '<td>' . $servicolista->Hora_Inicio . '</td>' . "\n";
                echo '<td>' . $servicolista->Atendente . '</td>' . "\n";
                echo '<td>' . $servicolista->Complemento . '</td>' . "\n";
                
                echo '<td>' . "\n";
                echo '<button class="btn btn-default" type="button" onclick="AlterarServico(' . $servicolista->Codigo . ')" >'. "\n";
                echo '<span class="glyphicon glyphicon-pencil"></span>'. "\n";
                echo '</button>'. "\n";
                echo '<button class="btn btn-default" type="button" onclick="ExcluirServico(' . $servicolista->Codigo . ')" >'. "\n";
                echo '<span class="glyphicon glyphicon-trash"></span>'. "\n";
                echo '</button>'. "\n";
                echo '</td>' . "\n";
                
                echo '</tr>' . "\n";
            }
        ?>
    </table>
</div>

<?php require_once("../rodape.php"); ?>

</body>
</html>