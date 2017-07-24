<script type="text/javascript" language="javascript">

    var url_api = '../../controllers/lista/agenda.servico.controller.php';
    var name_form = '#frmCadAgendaServico';

    function setValues(dados)
    {
        console.log("dados" + dados);

        if (dados["Codigo"] > 0)
        {
            $("#txtCodigo").val(dados["Codigo"]);
            $("#cmbCodigo_Tipo_Servico").val(dados["Codigo_Tipo_Servico"]);
            $("#cmbCodigo_Localidade").val(dados["Codigo_Localidade"]);
            $("#cmbDia_Semana").val(dados["Dia_Semana"]);
            $("#cmbSemana_Mes").val(dados["Semana_Mes"]);
            $("#txtHora").val(dados["Hora"]);
            $("#txtComplemento").val(dados["Complemento"]);
            $("#txtAtendente").val(dados["Atendente"]);
        }        
    }

</script>
