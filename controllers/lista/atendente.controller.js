<script type="text/javascript" language="javascript">

    var url_api = '../../controllers/lista/atendente.controller.php';
    var name_form = '#frmCadAtendente';

    function setValues(dados)
    {
        console.log("dados" + dados);

        if (dados["Codigo"] > 0)
        {
            $("#txtCodigo").val(dados["Codigo"]);
            $("#txtDescricao").val(dados["Nome"]);
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
