<!DOCTYPE html>
<html lang="pt-br">

<head>
<?php require_once("include.php"); ?>
</head>

<script>
    function IncluirServico(codigo_reuniao,codigo_Localidade,codigo_tipo_servico)
    {
        alert("IncluirServico -> codigo_reuniao: " + codigo_reuniao + " / codigo_Localidade: " + codigo_Localidade + " / codigo_tipo_servico: " + codigo_tipo_servico);
    }

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

<h2>Lista Santa Ceia</h2>

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
                <th>Localidade</th>
                <th>Data</th>
                <th>Horario</th>
                <th>Anciao</th>
                <th>Diacono</th>
                <th>Irmao</th>
                <th>Irma</th>
                <th></th>
            </tr>
            <!--tr>
                <td>Cianortinho</td>
                <td>01/01/1900</td>
                <td>19:30</td>
                <td>Teste</td>
                <td>Teste</td>
                <td>0</td>
                <td>0</td>
            </tr-->
            <?php
                require_once("../../services/lista/tipo.servico.service.php");
                $tiposervico = TipoServicoService::BuscarTipoServicoTipo(TS_SANTACEIA);
                require_once("../../services/lista/servico.service.php");
                $servicos = ServicoService::ListarSantaCeiaReuniao($reuniao->Codigo);
                foreach ($servicos as $servico) {
                    echo '<tr>' . "\n";
                    echo '<td>' . $servico->Nome_Localidade . '</td>' . "\n";

                    if (isset($servico->Codigo_Servico))
                    {
                        echo '<td>' . $servico->Data_Inicio . '</td>' . "\n";
                        echo '<td>' . $servico->Hora_Inicio . '</td>' . "\n";
                        echo '<td>' . $servico->GetAtendente(1) . '</td>' . "\n";
                        echo '<td>' . $servico->GetAtendente(2) . '</td>' . "\n";
                        echo '<td>' . $servico->Qtde_Irmao . '</td>' . "\n";
                        echo '<td>' . $servico->Qtde_Irma . '</td>' . "\n";
                        
                        echo '<td>' . "\n";
                        echo '<button class="btn btn-default" type="button" onclick="AlterarServico(' . $servico->Codigo_Servico . ')" >'. "\n";
                        echo '<span class="glyphicon glyphicon-pencil"></span>'. "\n";
                        echo '</button>'. "\n";
                        echo '<button class="btn btn-default" type="button" onclick="ExcluirServico(' . $servico->Codigo_Servico . ')" >'. "\n";
                        echo '<span class="glyphicon glyphicon-trash"></span>'. "\n";
                        echo '</button>'. "\n";
                        echo '</td>' . "\n";
                    }
                    else
                    {
                        echo '<td><input type="date" id="txtData_Inicio_' . $servico->Codigo_Localidade . '" value=""/></td>' . "\n";
                        echo '<td><input type="text" id="txtHora_Inicio_' . $servico->Codigo_Localidade . '" value="19:30"/></td>' . "\n";
                        echo '<td><input type="text" id="txtAtendente_1_' . $servico->Codigo_Localidade . '" value=""/></td>' . "\n";
                        echo '<td><input type="text" id="txtAtendente_2_' . $servico->Codigo_Localidade . '" value=""/></td>' . "\n";
                        echo '<td><input type="number" id="txtQtde_Irmao_' . $servico->Codigo_Localidade . '" value=""/></td>' . "\n";
                        echo '<td><input type="number" id="txtQtde_Irma_' . $servico->Codigo_Localidade . '" value=""/></td>' . "\n";

                        echo '<td>' . "\n";
                        echo '<button class="btn btn-default" type="button" onclick="IncluirServico(' . $reuniao->Codigo . ',' . $servico->Codigo_Localidade . ',' . $tiposervico->Codigo . ')" >'. "\n";
                        echo '<span class="glyphicon glyphicon-ok"></span>'. "\n";
                        echo '</button>'. "\n";
                        echo '</td>' . "\n";
                    }

                    echo '</tr>' . "\n";
                }
            ?>
        </tbody>
    </table>
</div>

<?php require_once("../rodape.php"); ?>

</body>
</html>