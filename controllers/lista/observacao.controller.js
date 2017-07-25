<script type="text/javascript" language="javascript">

    var url_api = '../../controllers/lista/observacao.controller.php';
    var name_form = '#frmCadObservacao';

    function getValues()
    {
        var values =
        {
            Codigo :  $("#txtCodigo").val(),
            Codigo_Reuniao : $("#cmbCodigo_Reuniao").val(),
            Descricao : $("#txtDescricao").val(),
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
            $("#cmbCodigo_Reuniao").val(dados["Codigo_Reuniao"]);
            $("#txtDescricao").val(dados["Descricao"]);
        }
    }

</script>
