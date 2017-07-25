<script type="text/javascript" language="javascript">

    var url_api = '../../controllers/lista/atendente.controller.php';
    var name_form = '#frmCadAtendente';

    function getValues()
    {
        var values =
        {
            Codigo :  $("#txtCodigo").val(),
            Nome : $("#txtNome").val(),
            Ministerio : $("#cmbMinisterio").val(),
            Administracao : $("#cmbAdministracao").val(),
            Codigo_Localidade : $("#cmbCodigo_Localidade").val(),
            Telefone_Pessoal : $("#txtTelefone_Pessoal").val(),
            Telefone_Trabalho : $("#txtTelefone_Trabalho").val(),
            Telefone_Recado : $("#txtTelefone_Recado").val(),
            Data_Apresentacao : $("#txtData_Apresentacao").val(),
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
            $("#txtNome").val(dados["Nome"]);
            $("#cmbMinisterio").val(dados["Ministerio"]);
            $("#cmbAdministracao").val(dados["Administracao"]);
            $("#cmbCodigo_Localidade").val(dados["Codigo_Localidade"]);
            $("#txtTelefone_Pessoal").val(dados["Telefone_Pessoal"]);
            $("#txtTelefone_Trabalho").val(dados["Telefone_Trabalho"]);
            $("#txtTelefone_Recado").val(dados["Telefone_Recado"]);
            $("#txtData_Apresentacao").val(dados["Data_Apresentacao"]);
        }        
    }

</script>
