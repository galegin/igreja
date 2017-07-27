<script type="text/javascript" language="javascript">

    var url_api = '../../controllers/lista/tipo.servico.controller.php';
    var name_form = '#frmCadTipoServico';

    function getValues()
    {
        var values =
        {
            Codigo : $("#txtCodigo").val(),
            Descricao : $("#txtDescricao").val(),
            Tipo : $("#cmbTipo").val(),
            Ordem : $("#txtOrdem").val(),
        };

        console.log("values " + values);

        return values;
    }

    function setValues(dados)
    {
        console.log("dados " + dados);

        if (dados["Codigo"] > 0)
        {
            $("#txtCodigo").val(dados["Codigo"]);
            $("#txtDescricao").val(dados["Descricao"]);
            $("#cmbTipo").val(dados["Tipo"]);
            $("#txtOrdem").val(dados["Ordem"]);
        }
    }

</script>
