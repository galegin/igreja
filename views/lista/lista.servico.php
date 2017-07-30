<!DOCTYPE html>
<html lang="pt-br">

<head>
<?php require_once("include.php"); ?>
</head>

<?php require_once("../../controllers/lista/lista.servico.controller.js"); ?>

<body>

<?php require_once("../cabecalho.php"); ?>

<h2>Lista Servico</h2>

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
                <th>Tipo Servico</th>
                <th>Localidade</th>
                <th>Data</th>
                <th>Horario</th>
                <th>Atende</th>
                <th>Complemento</th>
                <th width="100px"></th>
            </tr>
            <?php
                require_once("../../services/lista/tipo.servico.service.php");
                require_once("../../services/lista/servico.service.php");
                require_once("../../services/lista/localidade.service.php");

                //--

                class GerarDocumento
                {
                    public static function GerarLinha($servico,$reuniao,$tiposervico)
                    {
                        $chave = ServicoService::GetChave($servico,$reuniao,$tiposervico);
                        $chavecomp = ServicoService::GetChaveComp($servico,$reuniao,$tiposervico);

                        $tiposervico_select = $servico->Descricao_Tipo_Servico;
                        if (!isset($servico->Codigo_Tipo_Servico))
                        {
                            $tiposervico_select = 
                                '<select class="form-control" type="date" id="cmbCodigo_Tipo_Servico_' . $chavecomp . '">' ;
                            $tiposervicos = TipoServicoService::ListarTodas();
                            foreach ($tiposervicos as $tiposervico)
                                $tiposervico_select = $tiposervico_select .
                                    '<option value="' . $tiposervico->Codigo . '">' . $tiposervico->Descricao . '</option>';
                            $tiposervico_select = $tiposervico_select .
                                '</select>' ;
                        }

                        $localidade_select = $servico->Nome_Localidade;
                        if (!isset($servico->Codigo_Localidade))
                        {
                            $localidade_select = 
                                '<select class="form-control" type="date" id="cmbCodigo_Localidade_' . $chavecomp . '">' ;
                            $localidades = LocalidadeService::ListarTodas();
                            foreach ($localidades as $localidade)
                                $localidade_select = $localidade_select .
                                    '<option value="' . $localidade->Codigo . '">' . $localidade->Nome . '</option>';
                            $localidade_select = $localidade_select .
                                '</select>' ;
                        }

                        echo '<tr>' . "\n";
                        echo '<td>' . $tiposervico_select . '</td>' . "\n";
                        echo '<td>' . $localidade_select . '</td>' . "\n";

                        echo '<td><input class="form-control" type="date" id="txtData_Inicio_' . $chavecomp . '" value="' . $servico->Data_Inicio . '" style="width: 150px" /></td>' . "\n";
                        echo '<td><input class="form-control" type="text" id="txtHora_Inicio_' . $chavecomp . '" value="' . ($servico->Hora_Inicio ?: "19:30") . '" style="width: 65px" /></td>' . "\n";
                        echo '<td><input class="form-control" type="text" id="txtAtendente_1_' . $chavecomp . '" value="' . $servico->Atendente . '" style="width: 100px" /></td>' . "\n";
                        echo '<td><input class="form-control" type="text" id="txtComplemento_' . $chavecomp . '" value="' . $servico->Complemento . '" style="width: 100px" /></td>' . "\n";

                        if (isset($servico->Codigo_Localidade))
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

                $tiposervico = TipoServicoService::BuscarTipoServicoTipo(TS_SERVICO);

                //--

                $servico = new ServicoConsulta();
                GerarDocumento::GerarLinha($servico,$reuniao,$tiposervico);

                //--

                $servicos = ServicoService::ListarServicoReuniao($reuniao);
                foreach ($servicos as $servico)
                    GerarDocumento::GerarLinha($servico,$reuniao,$tiposervico);
            ?>
        </tbody>
    </table>
</div>

<?php require_once("../rodape.php"); ?>

</body>
</html>