<script type="text/javascript" language="javascript">

    var url_api = '../../controllers/lista/localidade.controller.php';
    var name_form = '#frmCadLocalidade';

    function setValues(dados)
    {
        console.log("dados" + dados);

        if (dados["Codigo"] > 0)
        {
            $("#txtCodigo").val(dados["Codigo"]);
            $("#txtDescricao").val(dados["Descricao"]);
            $("#cmbTipo").val(dados["Tipo"]);
        }        
    }

</script>
