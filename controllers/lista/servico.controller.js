<script type="text/javascript" language="javascript">

    var url_api = '../../controllers/lista/servico.controller.php';
    var name_form = '#frmCadServico';

    function setValues(dados)
    {
        console.log("dados" + dados);

        if (dados["Codigo"] > 0)
        {
            $("#txtCodigo").val(dados["Codigo"]);
            $("#cmbCodigo_Reuniao").val(dados["Codigo_Reuniao"]);
            $("#cmbCodigo_Tipo_Servico").val(dados["Codigo_Tipo_Servico"]);
            $("#cmbCodigo_Localidade").val(dados["Codigo_Localidade"]);
            $("#txtData_Inicio").val(dados["Data_Inicio"]);
            $("#txtData_Termino").val(dados["Data_Termino"]);
            $("#txtHora_Inicio").val(dados["Hora_Inicio"]);
            $("#txtHora_Termino").val(dados["Hora_Termino"]);
            $("#txtComplemento").val(dados["Complemento"]);
            $("#txtAtendente").val(dados["Atendente"]);
            $("#txtQtde_Irmao").val(dados["Qtde_Irmao"]);
            $("#txtQtde_Irma").val(dados["Qtde_Irma"]);
        }        
    }

</script>
