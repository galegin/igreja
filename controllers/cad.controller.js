<script type="text/javascript" language="javascript">

    $(document).ready(function() {

        $('#btnLimpar').click(function() {
            console.log("Limpar");
            location.reload();
            return false;
        });

        $('#txtCodigo').blur(function() {
            $("#btnConsultar").click();
        });

        $('#btnConsultar').click(function() {
            console.log("Consultar");

            var dados = $(name_form).serialize() + "&opcao=Consultar";
            console.log(dados);

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: url_api,
                async: true,
                data: dados,
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

            var dados = $(name_form).serialize() + "&opcao=Salvar";
            console.log(dados);

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: url_api,
                async: true,
                data: dados,
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

            var dados = $(name_form).serialize() + "&opcao=Excluir";
            console.log(dados);

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: url_api,
                async: true,
                data: dados,
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
    });

</script>
