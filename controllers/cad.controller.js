<script type="text/javascript" language="javascript">

    $(document).ready(function() {

        //-- metodos

        $('#btnLimpar').click(function() {
            console.log("Limpar");
            location.reload();
            return false;
        });

        $('#btnConsultar').click(function() {
            console.log("Consultar");

            var values = getValues();
            console.log(values);

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: url_api,
                async: true,
                data: { opcao : "Consultar", dados: values },
                success: function(response) {
                    console.log("success " + response);
                    setValues(response["dados"]);
                },
                error: function(response) {
                    console.log("error " + response);
                }
            });

            return false;
        });

        $('#btnSalvar').click(function() {
            console.log("Salvar");

            var values = getValues();
            console.log(values);

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: url_api,
                async: true,
                data: { opcao : "Salvar", dados: values },
                success: function(response) {
                    console.log("success " + response);
                },
                error: function(response) {
                    console.log("error " + response);
                }
            });

            return false;
        });
        
        $('#btnExcluir').click(function() {
            console.log("Excluir");

            if (!confirm("Confirma exclusão ?")) {
                return false;
            }            

            var values = getValues();
            console.log(values);

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: url_api,
                async: true,
                data: { opcao : "Excluir", dados: values },
                success: function(response) {
                    console.log("success " + response);
                    location.reload();
                },
                error: function(response) {
                    console.log("error " + response);
                }
            });

            return false;
        });

        //-- consulta chave

        $('#txtCodigo').blur(function() {
            $("#btnConsultar").click();
        });

        //--

    });

</script>
