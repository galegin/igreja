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
            $("#txtTipo_Logradouro").val(dados["Tipo_Logradouro"]);
            $("#txtLogradouro").val(dados["Logradouro"]);
            $("#txtNumero_Logradouro").val(dados["Numero_Logradouro"]);
            $("#txtBairro").val(dados["Bairro"]);
            $("#txtCidade").val(dados["Cidade"]);
            $("#cmbTipo_Imovel").val(dados["Tipo_Imovel"]);
            $("#txtAcomodacao").val(dados["Acomodacao"]);
            $("#txtComodatario").val(dados["Comodatario"]);
            $("#txtMetragem").val(dados["Metragem"]);
        }        
    }

</script>
