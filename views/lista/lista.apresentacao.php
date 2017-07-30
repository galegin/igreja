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

<h3>Servico(s) a ser(em) confirmado(s)</h3>

<div class="table-responsive">
    <table class="table">
        <tbody>
            <tr>
                <th>Tipo Servico</th>
                <th>Localidade</th>
                <th width="100px"></th>
            </tr>
            <?php
                require_once("../../services/lista/apresentacao.service.php");

                class GerarDocumentoConfServico
                {
                    public static function GerarLinha($apresentacao)
                    {
                        $chave = ApresentacaoService::GetChave($apresentacao,$reuniao);
                        $chavecomp = ApresentacaoService::GetChaveComp($apresentacao,$reuniao);

                        echo '<tr>';
                        echo '<td>' . $apresentacao->Descricao_Tipo_Servico . '"/></td>';
                        echo '<td>' . $apresentacao->Nome_Localidade . '</td>';

                        if (isset($apresentacao->Codigo_Apresentacao))
                        {
                            echo '<td>' . "\n";
                            echo '<button class="btn btn-default" type="button" onclick="AlterarApres(' . $chave . ')" >'. "\n";
                            echo '<span class="glyphicon glyphicon-pencil"></span>'. "\n";
                            echo '</button>'. "\n";
                            echo '<button class="btn btn-default" type="button" onclick="ExcluirApres(' . $chave . ')" >'. "\n";
                            echo '<span class="glyphicon glyphicon-trash"></span>'. "\n";
                            echo '</button>'. "\n";
                            echo '</td>' . "\n";
                         } 
                         else
                         {
                            echo '<td>' . "\n";
                            echo '<button class="btn btn-default" type="button" onclick="IncluirApres(' . $chave . ')" >'. "\n";
                            echo '<span class="glyphicon glyphicon-ok"></span>'. "\n";
                            echo '</button>'. "\n";
                            echo '</td>' . "\n";
                        }

                        echo '</tr>';
                    }
                }

                $apresentacao = new Apresentacao();
                GerarDocumentoConfServico::GerarLinha($apresentacao);

                $apresentacoes = ApresentacaoService::ListarConfirmacaoServicoReuniao($reuniao);
                foreach ($apresentacoes as $apresentacao)
                    GerarDocumentoConfServico::GerarLinha($apresentacao);
            ?>
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
                <th width="100px"></th>
            </tr>
            <?php
                //require_once("../../services/lista/apresentacao.service.php");

                class GerarDocumentoApresServico
                {
                    public static function GerarLinha($apresentacao)
                    {
                        $chave = ApresentacaoService::GetChave($apresentacao,$reuniao);
                        $chavecomp = ApresentacaoService::GetChaveComp($apresentacao,$reuniao);

                        echo '<tr>';
                        echo '<td>' . $apresentacao->Descricao_Tipo_Servico . '</td>';
                        echo '<td>' . $apresentacao->Nome_Localidade . '</td>';

                        if (isset($apresentacao->Codigo_Apresentacao))
                        {
                            echo '<td>' . "\n";
                            echo '<button class="btn btn-default" type="button" onclick="AlterarApres(' . $chave . ')" >'. "\n";
                            echo '<span class="glyphicon glyphicon-pencil"></span>'. "\n";
                            echo '</button>'. "\n";
                            echo '<button class="btn btn-default" type="button" onclick="ExcluirApres(' . $chave . ')" >'. "\n";
                            echo '<span class="glyphicon glyphicon-trash"></span>'. "\n";
                            echo '</button>'. "\n";
                            echo '</td>' . "\n";
                         } 
                         else
                         {
                            echo '<td>' . "\n";
                            echo '<button class="btn btn-default" type="button" onclick="IncluirApres(' . $chave . ')" >'. "\n";
                            echo '<span class="glyphicon glyphicon-ok"></span>'. "\n";
                            echo '</button>'. "\n";
                            echo '</td>' . "\n";
                        }

                        echo '</tr>';
                    }
                }

                $apresentacao = new Apresentacao();
                GerarDocumentoApresServico::GerarLinha($apresentacao);

                $apresentacoes = ApresentacaoService::ListarApresentacaoServicoReuniao($reuniao);
                foreach ($apresentacoes as $apresentacao)
                    GerarDocumentoApresServico::GerarLinha($apresentacao);
            ?>
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
                <th width="100px"></th>
            </tr>
            <?php
                //require_once("../../services/lista/apresentacao.service.php");

                class GerarDocumentoApresServo
                {
                    public static function GerarLinha($apresentacao)
                    {
                        $chave = ApresentacaoService::GetChave($apresentacao,$reuniao);
                        $chavecomp = ApresentacaoService::GetChaveComp($apresentacao,$reuniao);

                        echo '<tr>';
                        echo '<td>' . $apresentacao->Nome_Localidade . '</td>';
                        echo '<td>' . $apresentacao->Funcao . '</td>';
                        echo '<td>' . $apresentacao->Servo . '</td>';

                        if (isset($apresentacao->Codigo_Apresentacao))
                        {
                            echo '<td>' . "\n";
                            echo '<button class="btn btn-default" type="button" onclick="AlterarApres(' . $chave . ')" >'. "\n";
                            echo '<span class="glyphicon glyphicon-pencil"></span>'. "\n";
                            echo '</button>'. "\n";
                            echo '<button class="btn btn-default" type="button" onclick="ExcluirApres(' . $chave . ')" >'. "\n";
                            echo '<span class="glyphicon glyphicon-trash"></span>'. "\n";
                            echo '</button>'. "\n";
                            echo '</td>' . "\n";
                         } 
                         else
                         {
                            echo '<td>' . "\n";
                            echo '<button class="btn btn-default" type="button" onclick="IncluirApres(' . $chave . ')" >'. "\n";
                            echo '<span class="glyphicon glyphicon-ok"></span>'. "\n";
                            echo '</button>'. "\n";
                            echo '</td>' . "\n";
                        }

                        echo '</tr>';
                    }
                }

                $apresentacao = new Apresentacao();
                GerarDocumentoApresServo::GerarLinha($apresentacao);

                $apresentacoes = ApresentacaoService::ListarApresentacaoServoReuniao($reuniao);
                foreach ($apresentacoes as $apresentacao)
                    GerarDocumentoApresServo::GerarLinha($apresentacao);
        </tbody>
    </table>
</div>

<?php require_once("../rodape.php"); ?>

</body>
</html>