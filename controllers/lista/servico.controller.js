<script type="text/javascript" language="javascript">

    var url_api = '../../controllers/lista/servico.controller.php';
    var name_form = '#frmCadServico';

    function getValues()
    {
        var values =
        {
            Codigo : $("#txtCodigo").val(),
            Codigo_Reuniao : $("#cmbCodigo_Reuniao").val(),
            Codigo_Tipo_Servico : $("#cmbCodigo_Tipo_Servico").val(),
            Codigo_Localidade : $("#cmbCodigo_Localidade").val(),
            Data_Inicio : $("#txtData_Inicio").val(),
            Data_Termino : $("#txtData_Termino").val(),
            Hora_Inicio : $("#txtHora_Inicio").val(),
            Hora_Termino : $("#txtHora_Termino").val(),
            Complemento : $("#txtComplemento").val(),
            Atendente : $("#txtAtendente").val(),
            Qtde_Irmao : $("#txtQtde_Irmao").val(),
            Qtde_Irma : $("#txtQtde_Irma").val(),
        };

        return values;
    }

    function setValues(dados)
    {
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
