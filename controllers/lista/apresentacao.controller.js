<script type="text/javascript" language="javascript">

    var url_api = '../../controllers/lista/apresentacao.controller.php';
    var name_form = '#frmCadApresentacao';

    function getValues()
    {
        var values =
        {
            Codigo :  $("#txtCodigo").val(),
            Codigo_Reuniao : $("#cmbCodigo_Reuniao").val(),
            Codigo_Localidade : $("#cmbCodigo_Localidade").val(),
            Tipo : $("#cmbTipo").val(),
            Codigo_Tipo_Servico : $("#cmbCodigo_Tipo_Servico").val(),
            Funcao : $("#txtFuncao").val(),
            Nome : $("#txtNome").val(),
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
            $("#cmbCodigo_Localidade").val(dados["Codigo_Localidade"]);
            $("#cmbTipo").val(dados["Tipo"]);
            $("#cmbCodigo_Tipo_Servico").val(dados["Codigo_Tipo_Servico"]);
            $("#txtFuncao").val(dados["Funcao"]);
            $("#txtNome").val(dados["Nome"]);
        }        
    }

</script>
