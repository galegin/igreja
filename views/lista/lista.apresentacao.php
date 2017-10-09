<!DOCTYPE html>
<html lang="pt-br">

<head>
<?php require_once("include.php"); ?>
</head>

<?php require_once("../../controllers/lista/apresentacao.controller.js"); ?>

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

<?php
    require_once("../../services/lista/tipo.servico.service.php");
    require_once("../../services/lista/localidade.service.php");

    //--

    class DocumentoTipoServico
    {
        public static function GetTipoServicosSelect($chavecomp)
        {
            $tiposervico_select = 
                '<select class="form-control" type="date" id="cmbCodigo_Tipo_Servico_' . $chavecomp . '">' ;
            $tiposervicos = TipoServicoService::ListarTodas();
            foreach ($tiposervicos as $tiposervico)
                $tiposervico_select = $tiposervico_select .
                    '<option value="' . $tiposervico->Codigo . '">' . $tiposervico->Descricao . '</option>';
            $tiposervico_select = $tiposervico_select .
                '</select>' ;
            return $tiposervico_select;
        }
    }

    //--

    class DocumentoLocalidade
    {
        public static function GetLocalidadeSelect($chavecomp)
        {
            $localidade_select = 
                '<select class="form-control" type="date" id="cmbCodigo_Localidade_' . $chavecomp . '">' ;
            $localidades = LocalidadeService::ListarTodas();
            foreach ($localidades as $localidade)
                $localidade_select = $localidade_select .
                    '<option value="' . $localidade->Codigo . '">' . $localidade->Nome . '</option>';
            $localidade_select = $localidade_select .
                '</select>' ;
            return $localidade_select;
        }
    }
?>

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
                    public static function GerarLinha($apresentacao,$reuniao,$tipo)
                    {
                        $chave = ApresentacaoService::GetChave($apresentacao,$reuniao,$tipo);
                        $chavecomp = ApresentacaoService::GetChaveComp($apresentacao,$reuniao,$tipo);

                        if (isset($apresentacao->Codigo_Tipo_Servico))
                        {
                            $tiposervico = Contexto::Instance()->GetObjeto("TipoServico", "Codigo = " . $apresentacao->Codigo_Tipo_Servico);
                            $tiposervico_select = $tiposervico->Descricao;
                        }
                        else
                            $tiposervico_select = DocumentoTipoServico::GetTipoServicosSelect($chavecomp);

                        if (isset($apresentacao->Codigo_Localidade))
                        {
                            $localidade = Contexto::Instance()->GetObjeto("Localidade", "Codigo = " . $apresentacao->Codigo_Localidade);
                            $localidade_select = $localidade->Nome;
                        }
                        else
                            $localidade_select = DocumentoLocalidade::GetLocalidadeSelect($chavecomp);

                        echo '<tr>';
                        echo '<td>' . $tiposervico_select . '</td>';
                        echo '<td>' . $localidade_select . '</td>';

                        if (isset($apresentacao->Codigo))
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
                GerarDocumentoConfServico::GerarLinha($apresentacao, $reuniao, TA_CONF_SERVICO);

                $apresentacoes = ApresentacaoService::ListarConfirmacaoServicoReuniao($reuniao);
                foreach ($apresentacoes as $apresentacao)
                    GerarDocumentoConfServico::GerarLinha($apresentacao, $reuniao, TA_CONF_SERVICO);
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
                    public static function GerarLinha($apresentacao,$reuniao,$tipo)
                    {
                        $chave = ApresentacaoService::GetChave($apresentacao,$reuniao,$tipo);
                        $chavecomp = ApresentacaoService::GetChaveComp($apresentacao,$reuniao,$tipo);

                        if (isset($apresentacao->Codigo_Tipo_Servico))
                        {
                            $tiposervico = Contexto::Instance()->GetObjeto("TipoServico", "Codigo = " . $apresentacao->Codigo_Tipo_Servico);
                            $tiposervico_select = $tiposervico->Descricao;
                        }
                        else
                            $tiposervico_select = DocumentoTipoServico::GetTipoServicosSelect($chavecomp);

                        if (isset($apresentacao->Codigo_Localidade))
                        {
                            $localidade = Contexto::Instance()->GetObjeto("Localidade", "Codigo = " . $apresentacao->Codigo_Localidade);
                            $localidade_select = $localidade->Nome;
                        }
                        else
                            $localidade_select = DocumentoLocalidade::GetLocalidadeSelect($chavecomp);

                        echo '<tr>';
                        echo '<td>' . $tiposervico_select . '</td>';
                        echo '<td>' . $localidade_select . '</td>';

                        if (isset($apresentacao->Codigo))
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
                GerarDocumentoApresServico::GerarLinha($apresentacao, $reuniao, TA_APRES_SERVICO);

                $apresentacoes = ApresentacaoService::ListarApresentacaoServicoReuniao($reuniao);
                foreach ($apresentacoes as $apresentacao)
                    GerarDocumentoApresServico::GerarLinha($apresentacao, $reuniao, TA_APRES_SERVICO);
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
                    public static function GerarLinha($apresentacao,$reuniao,$tipo)
                    {
                        $chave = ApresentacaoService::GetChave($apresentacao,$reuniao,$tipo);
                        $chavecomp = ApresentacaoService::GetChaveComp($apresentacao,$reuniao,$tipo);

                        if (isset($apresentacao->Codigo_Localidade))
                        {
                            $localidade = Contexto::Instance()->GetObjeto("Localidade", "Codigo = " . $apresentacao->Codigo_Localidade);
                            $localidade_select = $localidade->Nome;
                        }
                        else
                            $localidade_select = DocumentoLocalidade::GetLocalidadeSelect($chavecomp);

                        echo '<tr>';
                        echo '<td>' . $localidade_select . '</td>';
                        echo '<td><input class="form-control" id="txtFuncao_' . $chavecomp. '" value="' . $apresentacao->Funcao . '"/></td>';
                        echo '<td><input class="form-control" id="txtNome_' . $chavecomp. '" value="' . $apresentacao->Nome . '"/></td>';

                        if (isset($apresentacao->Codigo))
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
                GerarDocumentoApresServo::GerarLinha($apresentacao, $reuniao, TA_APRES_SERVO);

                $apresentacoes = ApresentacaoService::ListarApresentacaoServoReuniao($reuniao);
                foreach ($apresentacoes as $apresentacao)
                    GerarDocumentoApresServo::GerarLinha($apresentacao, $reuniao, TA_APRES_SERVO);
            ?>
        </tbody>
    </table>
</div>

<?php require_once("../rodape.php"); ?>

</body>
</html>