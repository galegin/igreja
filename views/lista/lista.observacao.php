<!DOCTYPE html>
<html lang="pt-br">

<head>
<?php require_once("include.php"); ?>
</head>

<body>

<?php require_once("../cabecalho.php"); ?>

<h2>Observacao</h2>

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
			    <th>Observacao</th>
                <th width="100px"></th>                
			</tr>
            <?php
                require_once("../../services/lista/observacao.service.php");

                class GerarDocumento
                {
                    public static function GerarLinha($observacao)
                    {
                        $chave = ObservacaoService::GetChave($observacao,$reuniao);
                        $chavecomp = ObservacaoService::GetChaveComp($observacao,$reuniao);

                        echo '<tr>';
                        echo '<td><input class="form-control" id="txtDescricao" value="' . $observacao->Descricao . '" /></td>';

                        if (isset($observacao->Codigo))
                        {
                            echo '<td>' . "\n";
                            echo '<button class="btn btn-default" type="button" onclick="AlterarObs(' . $chave . ')" >'. "\n";
                            echo '<span class="glyphicon glyphicon-pencil"></span>'. "\n";
                            echo '</button>'. "\n";
                            echo '<button class="btn btn-default" type="button" onclick="ExcluirObs(' . $chave . ')" >'. "\n";
                            echo '<span class="glyphicon glyphicon-trash"></span>'. "\n";
                            echo '</button>'. "\n";
                            echo '</td>' . "\n";
                         } 
                         else
                         {
                            echo '<td>' . "\n";
                            echo '<button class="btn btn-default" type="button" onclick="IncluirObs(' . $chave . ')" >'. "\n";
                            echo '<span class="glyphicon glyphicon-ok"></span>'. "\n";
                            echo '</button>'. "\n";
                            echo '</td>' . "\n";
                        }

                        echo '</tr>';
                    }
                }

                $observacao = new Observacao();
                GerarDocumento::GerarLinha($observacao);

                $observacoes = ObservacaoService::ListarObservacaoReuniao($reuniao);
                foreach ($observacoes as $observacao)
                    GerarDocumento::GerarLinha($observacao);
            ?>            
        </tbody>
	</table>
</div>

<?php require_once("../rodape.php"); ?>

</body>
</html>