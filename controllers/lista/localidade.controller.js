<script type="text/javascript" language="javascript">

    var url_api = '../../controllers/lista/localidade.controller.php';
    var name_form = '#frmCadLocalidade';

    function setValues(dados)
    {
        console.log("dados" + dados);

        if (dados["Codigo"] > 0)
        {
            $("#txtCodigo").val(dados["Codigo"]);
            $("#txtNome").val(dados["Nome"]);
            $("#txtTipo").val(dados["Tipo"]);
            $("#txtAnciao").val(dados["Anciao"]);
            $("#txtCooperador").val(dados["Cooperador"]);
            $("#txtCooperador_Jovem").val(dados["Cooperador_Jovem"]);
            $("#txtEncarregado").val(dados["Encarregado"]);
            $("#txtDias_Culto").val(dados["Dias_Culto"]);
            $("#txtDias_Culto_Jovem").val(dados["Dias_Culto_Jovem"]);
        }        
    }

</script>
