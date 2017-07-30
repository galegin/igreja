<script>

    var url_api = "../../controllers/lista/servico.controller.php";

    function GetChave(codigo_servico,codigo_reuniao,codigo_tipo_servico,codigo_localidade)
    {
        var chave = 
            (codigo_servico != null ? codigo_servico : "0" ) + "_" + 
            (codigo_reuniao != null ? codigo_reuniao : "0") + "_" + 
            (codigo_tipo_servico != null ? codigo_tipo_servico : "0") + "_" + 
            (codigo_localidade != null ? codigo_localidade : "0") ;
        console.log("chave -> " + chave);
        return chave;
    }

    function GetValues(codigo_servico,codigo_reuniao,codigo_tipo_servico,codigo_localidade)
    {
        var chave = GetChave(codigo_servico,codigo_reuniao,codigo_tipo_servico,codigo_localidade);

        var codigoservico = $("#txtCodigo_Servico_" + chave).val();
        if (codigoservico == null || codigoservico == "")
            codigoservico = codigo_servico;
        var codigoreuniao = $("#cmbCodigo_Reuniao_" + chave).val();
        if (codigoreuniao == null || codigoreuniao == "")
            codigoreuniao = codigo_reuniao;
        var codigotiposervico = $("#cmbCodigo_Tipo_Servico_" + chave).val();
        if (codigotiposervico == null || codigotiposervico == "")
            codigotiposervico = codigo_tipo_servico;
        var codigolocalidade  = $("#cmbCodigo_Localidade_" + chave).val();
        if (codigolocalidade == null || codigolocalidade == "")
            codigolocalidade = codigo_localidade;
        
        var datainicio = $("#txtData_Inicio_" + chave).val();
        var horainicio = $("#txtHora_Inicio_" + chave).val();

        var complemento = $("#txtComplemento_" + chave).val();

        var atendente = "";
        var atendente1 = $("#txtAtendente_1_" + chave).val();
        if (atendente1 != null && atendente1 != "")
            atendente += (atendente != "" ? " / " : "") + atendente1;
        var atendente2 = $("#txtAtendente_2_" + chave).val();
        if (atendente2 != null && atendente2 != "")
            atendente += (atendente != "" ? " / " : "") + atendente2;

        var qtdeirmao = $("#txtQtde_Irmao_" + chave).val();
        if (qtdeirmao == null || qtdeirmao == "")
            qtdeirmao = 0;
        var qtdeirma = $("#txtQtde_Irma_" + chave).val();
        if (qtdeirma == null || qtdeirma == "")
            qtdeirma = 0;

        return {
            Codigo : codigoservico,
            Codigo_Reuniao : codigoreuniao,
            Codigo_Localidade : codigolocalidade,
            Codigo_Tipo_Servico : codigotiposervico,
            Data_Inicio : datainicio,
            Data_Termino : datainicio,
            Hora_Inicio : horainicio,
            Hora_Termino : horainicio,
            Complemento : complemento,
            Atendente : atendente,
            Qtde_Irmao : qtdeirmao,
            Qtde_Irma : qtdeirma,
        };
    }

    function RequisicaoServico(opcao_requisicao,codigo_servico,codigo_reuniao,codigo_tipo_servico,codigo_localidade)
    {
        console.log("RequisicaoServico -> " + 
            "opcao_requisicao: " + opcao_requisicao + " / " + 
            "codigo_servico: " + codigo_servico + " / " + 
            "codigo_reuniao: " + codigo_reuniao + " / " + 
            "codigo_tipo_servico: " + codigo_tipo_servico + " / " + 
            "codigo_localidade: " + codigo_localidade);

        var values = GetValues(codigo_servico,codigo_reuniao,codigo_tipo_servico,codigo_localidade);
        console.log(values);

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: url_api,
            async: true,
            data: { opcao : opcao_requisicao, dados: values },
            success: function(response) {
                console.log("success " + response);
                //setValues(response["dados"]);
            },
            error: function(response) {
                console.log("error " + response);
            }
        });
    }

    function IncluirServico(codigo_servico,codigo_reuniao,codigo_tipo_servico,codigo_localidade)
    {
        RequisicaoServico("Incluir",codigo_servico,codigo_reuniao,codigo_tipo_servico,codigo_localidade);
    }

    function AlterarServico(codigo_servico,codigo_reuniao,codigo_tipo_servico,codigo_localidade)
    {
        RequisicaoServico("Alterar",codigo_servico,codigo_reuniao,codigo_tipo_servico,codigo_localidade);
    }

    function ExcluirServico(codigo_servico,codigo_reuniao,codigo_tipo_servico,codigo_localidade)
    {
        RequisicaoServico("Excluir",codigo_servico,codigo_reuniao,codigo_tipo_servico,codigo_localidade);
    }

</script>
