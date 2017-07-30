<!DOCTYPE html>
<html lang="pt-br">

<head>
<?php require_once("include.php"); ?>
</head>

<?php require_once("../../controllers/lista/lista.servico.controller.js"); ?>

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
                <th width="100px"></th>
            </tr>
            <?php
                require_once("../../services/lista/tipo.servico.service.php");
                require_once("../../services/lista/servico.service.php");

                //--

                class GerarDocumento
                {
                    public static function GerarLinha($servico,$reuniao,$tiposervico)
                    {
                        echo '<tr>' . "\n";
                        echo '<td>' . $servico->Nome_Localidade . '</td>' . "\n";

                        $chave = ServicoService::GetChave($servico,$reuniao,$tiposervico);
                        $chavecomp = ServicoService::GetChaveComp($servico,$reuniao,$tiposervico);

                        echo '<td><input class="form-control" type="date" id="txtData_Inicio_' . $chavecomp . '" value="' . $servico->Data_Inicio . '" style="width: 150px" /></td>' . "\n";
                        echo '<td><input class="form-control" type="text" id="txtHora_Inicio_' . $chavecomp . '" value="' . ($servico->Hora_Inicio ?: "19:30") . '" style="width: 65px" /></td>' . "\n";
                        echo '<td><input class="form-control" type="text" id="txtAtendente_1_' . $chavecomp . '" value="' . $servico->GetAtendente(1) . '" /></td>' . "\n";
                        echo '<td><input class="form-control" type="text" id="txtAtendente_2_' . $chavecomp . '" value="' . $servico->GetAtendente(2) . '" /></td>' . "\n";
                        echo '<td><input class="form-control" type="number" id="txtQtde_Irmao_' . $chavecomp . '" value="' . $servico->Qtde_Irmao . '" style="width: 50px" /></td>' . "\n";
                        echo '<td><input class="form-control" type="number" id="txtQtde_Irma_' . $chavecomp . '" value="' . $servico->Qtde_Irma . '" style="width: 50px" /></td>' . "\n";

                        if (isset($servico->Codigo_Servico))
                        {
                            echo '<td>' . "\n";
                            echo '<button class="btn btn-default" type="button" onclick="AlterarServico(' . $chave . ')" >'. "\n";
                            echo '<span class="glyphicon glyphicon-pencil"></span>'. "\n";
                            echo '</button>'. "\n";
                            echo '<button class="btn btn-default" type="button" onclick="ExcluirServico(' . $chave . ')" >'. "\n";
                            echo '<span class="glyphicon glyphicon-trash"></span>'. "\n";
                            echo '</button>'. "\n";
                            echo '</td>' . "\n";
                        }
                        else
                        {
                            echo '<td>' . "\n";
                            echo '<button class="btn btn-default" type="button" onclick="IncluirServico(' . $chave . ')" >'. "\n";
                            echo '<span class="glyphicon glyphicon-ok"></span>'. "\n";
                            echo '</button>'. "\n";
                            echo '</td>' . "\n";
                        }

                        echo '</tr>' . "\n";
                    }
                }

                //--

                $tiposervico = TipoServicoService::BuscarTipoServicoTipo(TS_SANTACEIA);

                //--

                $servicos = ServicoService::ListarSantaCeiaReuniao($reuniao);
                foreach ($servicos as $servico)
                    GerarDocumento::GerarLinha($servico,$reuniao,$tiposervico);
            ?>
        </tbody>
    </table>
</div>

<?php require_once("../rodape.php"); ?>

</body>
</html>