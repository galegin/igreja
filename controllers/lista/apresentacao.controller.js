<script type="text/javascript" language="javascript">

    var url_api = '../../controllers/lista/apresentacao.controller.php';
    var name_form = '#frmCadApresentacao';

    function setValues(dados)
    {
        console.log("dados" + dados);

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
