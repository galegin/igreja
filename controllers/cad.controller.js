<script type="text/javascript" language="javascript">

    function RequisicaoEvent(requisicao)
    {
        console.log("requisicao: " + requisicao);

        var values = getValues();
        console.log(values);

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: url_api,
            async: true,
            data: { opcao : requisicao, dados : values },
            success: function(response) {
                console.log("success");
                console.log(response);
                var opcao = response["opcao"];
                switch (opcao)
                {
                    case "Consultar":
                    case "Salvar":
                        setValues(response["dados"]);
                        break;
                    case "Excluir":
                        location.reload();
                        break;
                }
            },
            error: function(response) {
                console.log("error");
                console.log(response);
            }
        });
    }

    $(document).ready(function() {

        //-- metodos

        $('#btnLimpar').click(function() {
            console.log("Limpar");
            location.reload();
            return false;
        });

        $('#btnConsultar').click(function() {
            RequisicaoEvent("Consultar");
            return false;
        });

        $('#btnSalvar').click(function() {
            RequisicaoEvent("Salvar");
            return false;
        });
        
        $('#btnExcluir').click(function() {
            if (confirm("Confirma exclusão ?"))
                RequisicaoEvent("Excluir");
            return false;
        });

        //-- consulta chave

        $('#txtCodigo').blur(function() {
            $("#btnConsultar").click();
        });

        //--

    });

</script>
