<script>

    var url_api = "../../controllers/lista/observacao.controller.php";

    function GetChave(codigo_observacao,codigo_reuniao)
    {
        var chave = 
            (codigo_observacao != null ? codigo_observacao : "0" ) + "_" + 
            (codigo_reuniao != null ? codigo_reuniao : "0") ;
        console.log("chave: " + chave);
        return chave;
    }

    function GetValues(codigo_observacao,codigo_reuniao)
    {
        var chave = GetChave(codigo_observacao,codigo_reuniao);

        var codigoobservacao = $("#cmbCodigo_Observacao_" + chave).val();
        if (codigoobservacao == null || codigoobservacao == "")
            codigoobservacao = codigo_observacao;
        var codigoreuniao = $("#cmbCodigo_Reuniao_" + chave).val();
        if (codigoreuniao == null || codigoreuniao == "")
            codigoreuniao = codigo_reuniao;
        
        var descricao = $("#txtDescricao_" + chave).val();

        return {
            Codigo : codigoobservacao,
            Codigo_Reuniao : codigoreuniao,
            Descricao : descricao,
        };
    }

    function RequisicaoObs(opcao_requisicao,codigo_observacao,codigo_reuniao)
    {
        console.log("RequisicaoServico -> " + 
            "opcao_requisicao: " + opcao_requisicao + " / " + 
            "codigo_observacao: " + codigo_observacao + " / " + 
            "codigo_reuniao: " + codigo_reuniao);

        var values = GetValues(codigo_observacao,codigo_reuniao);
        console.log(values);

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: url_api,
            async: true,
            data: { opcao : opcao_requisicao, dados: values },
            success: function(response) {
                console.log("success");
                console.log(response);
                //setValues(response["dados"]);
            },
            error: function(response) {
                console.log("error");
                console.log(response);
            }
        });
    }

    function IncluirObs(codigo_observacao,codigo_reuniao)
    {
        RequisicaoObs("Incluir",codigo_observacao,codigo_reuniao);
    }

    function AlterarObs(codigo_observacao,codigo_reuniao)
    {
        RequisicaoObs("Alterar",codigo_observacao,codigo_reuniao);
    }

    function ExcluirObs(codigo_observacao,codigo_reuniao)
    {
        RequisicaoObs("Excluir",codigo_observacao,codigo_reuniao);
    }

</script>
