<!DOCTYPE html>
<html lang="pt-br">

<head>
<?php require_once("include.php"); ?>
</head>

<?php require_once("../../controllers/lista/servico.controller.js"); ?>

<body>

<?php require_once("../cabecalho.php"); ?>

<h2>Lista</h2>

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
            <!--tr>
                <th width="150px">Data / Horario</th>
                <th width="200px">Localidade</th>
                <th>Atende</th>
            </tr-->
            <?php
                require_once("../../services/lista/tipo.servico.service.php");
                require_once("../../services/lista/servico.service.php");

                //--

                class GerarDocumento
                {
                    public static function GerarQuebra($servico,$reuniao,$tiposervico)
                    {
                        /* echo '<tr>' . "\n";
                        echo '<td><b><h3>' . $servico->Descricao_Tipo_Servico . '</h3></b></td>' . "\n";
                        echo '</tr>' . "\n"; */

                        echo '</tbody>' . "\n";
                        echo '</table>' . "\n";
                        echo '<spaw><b><h3>' . $servico->Descricao_Tipo_Servico . '</h3></b></spaw>' . "\n";
                        echo '<table class="table">' . "\n"; 
                        echo '<tbody>' . "\n";
                        echo '<tr>' . "\n";
                        echo '    <th width="150px">Data / Horario</th>' . "\n";
                        echo '    <th width="200px">Localidade</th>' . "\n";
                        echo '    <th>Atende</th>' . "\n";
                        echo '</tr>' . "\n";
                    }

                    public static function GerarLinha($servico,$reuniao,$tiposervico)
                    {
                        $datahorario = "";
                        if (isset($servico->Data_Inicio) && $servico->Data_Inicio != "")
                        {
                            $ano = explode("-", $servico->Data_Inicio)[0];
                            $mes = explode("-", $servico->Data_Inicio)[1];
                            $dia = explode("-", $servico->Data_Inicio)[2];
                            $datahorario = $datahorario . ($datahorario != "" ? ' ' : '') . $dia . '/' . $mes;

                            $days = array('DOM', 'SEQ', 'TER', 'QUA', 'QUI', 'SEX', 'SAB');

                            $dayofweek = date('w', strtotime($servico->Data_Inicio));
                            $datahorario = $datahorario . ($datahorario != "" ? ' ' : '') . $days[$dayofweek];
                        }
                        if (isset($servico->Hora_Inicio) && $servico->Hora_Inicio != "")
                            $datahorario = $datahorario . ($datahorario != "" ? ' ' : '') . $servico->Hora_Inicio;

                        $complemento = "";
                        if (isset($servico->Nome_Localidade) && $servico->Nome_Localidade != "")
                            $complemento = $complemento . ($complemento != "" ? ' - ': '') . $servico->Nome_Localidade;
                        if (isset($servico->Complemento) && $servico->Complemento != "")
                            $complemento = $complemento . ($complemento != "" ? ' - ': '') . $servico->Complemento;
                        
                        $atendente = "";
                        if (isset($servico->Atendente) && $servico->Atendente != "")
                            $atendente = $atendente . ($atendente != "" ? ' - ': '') . $servico->Atendente;

                        echo '<tr>' . "\n";
                        echo '<td width="150px">' . $datahorario . '</td>' . "\n";
                        echo '<td width="200px">' . $complemento . '</td>' . "\n";
                        echo '<td>' . $atendente . '</td>' . "\n";
                        echo '</tr>' . "\n";
                    }
                }

                //--

                $tiposervico = TipoServicoService::BuscarTipoServicoTipo(TS_SERVICO);

                //--

                $servicos = ServicoService::ListarServicoReuniao($reuniao);
                $codigotiposervico = null;
                foreach ($servicos as $servico) {
                    if ($codigotiposervico == null || $servico->Codigo_Tipo_Servico != $codigotiposervico)
                    {
                        GerarDocumento::GerarQuebra($servico,$reuniao,$tiposervico);
                        $codigotiposervico = $servico->Codigo_Tipo_Servico;
                    }

                    GerarDocumento::GerarLinha($servico,$reuniao,$tiposervico);
                }
            ?>
        </tbody>
    </table>
</div>

<?php require_once("../rodape.php"); ?>

</body>
</html>