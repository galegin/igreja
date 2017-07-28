<!DOCTYPE html>
<html lang="pt-br">

<head>
<?php require_once("include.php"); ?>
</head>

<body>

<?php require_once("../cabecalho.php"); ?>

<h2>Lista Reuniao Mocidade</h2>

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
        <tbody>
			<tr>
			    <th>Localidade</th>
			    <th>Data</th>
			    <th>Horario</th>
			    <th>Anciao</th>
                <th></th>
			</tr>
			<!--tr>
			    <td>Cianortinho</td>
			    <td>01/01/1900</td>
			    <td>19:30</td>
			    <td>Teste</td>
			</tr-->
            <?php
                require_once("../../services/lista/tipo.servico.service.php");
                $tiposervico = TipoServicoService::BuscarTipoServicoTipo(TS_REUNIAOMOCIDADE);
                require_once("../../services/lista/servico.service.php");
                $servicos = ServicoService::ListarReuniaoMocidadeReuniao($reuniao->Codigo);
                foreach ($servicos as $servico) {
                    echo '<tr>' . "\n";
                    echo '<td>' . $servico->Nome_Localidade . '</td>' . "\n";
                    echo '<td>' . $servico->Data_Inicio . '</td>' . "\n";
                    echo '<td>' . $servico->Hora_Inicio . '</td>' . "\n";
                    echo '<td>' . $servico->Atendente . '</td>' . "\n";
                    
                    echo '<td>' . "\n";
                    echo '<button class="btn btn-default" type="button" onclick="AlterarServico(' . $servico->Codigo . ')" >'. "\n";
                    echo '<span class="glyphicon glyphicon-pencil"></span>'. "\n";
                    echo '</button>'. "\n";
                    echo '<button class="btn btn-default" type="button" onclick="ExcluirServico(' . $servico->Codigo . ')" >'. "\n";
                    echo '<span class="glyphicon glyphicon-trash"></span>'. "\n";
                    echo '</button>'. "\n";
                    echo '</td>' . "\n";
                    
                    echo '</tr>' . "\n";
                }
            ?>
        </tbody>
	</table>
</div>

<?php require_once("../rodape.php"); ?>

</body>
</html>