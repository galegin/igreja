<script>

    var url_api = "../../controllers/lista/apresentacao.controller.php";

    function GetChave(codigo_apresentacao,codigo_reuniao,tipo_apresentacao)
    {
        var chave = 
            (codigo_apresentacao != null ? codigo_apresentacao : "0" ) + "_" + 
            (codigo_reuniao != null ? codigo_reuniao : "0") + "_" + 
            (tipo_apresentacao != null ? tipo_apresentacao : "0" ) ;
        console.log("chave: " + chave);
        return chave;
    }

    function GetValues(codigo_apresentacao,codigo_reuniao,tipo_apresentacao)
    {
        var chave = GetChave(codigo_apresentacao,codigo_reuniao,tipo_apresentacao);

        var codigoapresentacao = $("#cmbCodigo_Apresentacao_" + chave).val();
        if (codigoapresentacao == null || codigoapresentacao == "")
            codigoapresentacao = codigo_apresentacao;
        var codigoreuniao = $("#cmbCodigo_Reuniao_" + chave).val();
        if (codigoreuniao == null || codigoreuniao == "")
            codigoreuniao = codigo_reuniao;
        var tipoapresentacao = $("#cmbTipo_Apresentacao_" + chave).val();
        if (tipoapresentacao == null || tipoapresentacao == "")
            tipoapresentacao = tipo_apresentacao;

        var codigolocalidade = $("#cmbCodigo_Localidade_" + chave).val();
        var codigotiposervico = $("#cmbCodigo_Tipo_Servico_" + chave).val();
        var funcao = $("#txtFuncao_" + chave).val();
        var nome = $("#txtNome_" + chave).val();

        return {
            Codigo : codigoapresentacao,
            Codigo_Reuniao : codigoreuniao,
            Tipo : tipoapresentacao,
            Codigo_Localidade : codigolocalidade,
            Codigo_Tipo_Servico : codigotiposervico,
            Funcao : funcao,
            Nome : nome,
        };
    }

    function RequisicaoApres(opcao_requisicao,codigo_apresentacao,codigo_reuniao,tipo_apresentacao)
    {
        console.log("RequisicaoServico -> " + 
            "opcao_requisicao: " + opcao_requisicao + " / " + 
            "codigo_apresentacao: " + codigo_apresentacao + " / " + 
            "codigo_reuniao: " + codigo_reuniao + " / " + 
            "tipo_apresentacao: " + tipo_apresentacao );

        var values = GetValues(codigo_apresentacao,codigo_reuniao,tipo_apresentacao);
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

    function IncluirApres(codigo_apresentacao,codigo_reuniao,tipo_apresentacao)
    {
        RequisicaoApres("Incluir",codigo_apresentacao,codigo_reuniao,tipo_apresentacao);
    }

    function AlterarApres(codigo_apresentacao,codigo_reuniao,tipo_apresentacao)
    {
        RequisicaoApres("Alterar",codigo_apresentacao,codigo_reuniao,tipo_apresentacao);
    }

    function ExcluirApres(codigo_apresentacao,codigo_reuniao,tipo_apresentacao)
    {
        RequisicaoApres("Excluir",codigo_apresentacaotipo_apresentacao,codigo_reuniao);
    }

</script>
