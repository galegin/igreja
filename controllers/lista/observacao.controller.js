<script type="text/javascript" language="javascript">

    var url_api = '../../controllers/lista/observacao.controller.php';
    var name_form = '#frmCadObservacao';

    function setValues(dados)
    {
        console.log("dados" + dados);

        if (dados["Codigo"] > 0)
        {
            $("#txtCodigo").val(dados["Codigo"]);
            $("#txtCodigo_Reuniao").val(dados["Codigo_Reuniao"]);
            $("#txtDescricao").val(dados["Descricao"]);
        }
    }

</script>
