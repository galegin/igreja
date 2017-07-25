<script type="text/javascript" language="javascript">

    var url_api = '../../controllers/lista/atendente.controller.php';
    var name_form = '#frmCadAtendente';

    function setValues(dados)
    {
        console.log("dados" + dados);

        if (dados["Codigo"] > 0)
        {
            console.log("Codigo " + dados[""]);
            $("#txtCodigo").val(dados["Codigo"]);
            console.log("Nome " + dados["Nome"]);
            $("#txtNome").val(dados["Nome"]);
            console.log("Ministerio " + dados["Ministerio"]);
            $("#cmbMinisterio").val(dados["Ministerio"]);
            console.log("Administracao " + dados["Administracao"]);
            $("#cmbAdministracao").val(dados["Administracao"]);
            console.log("Codigo_Localidade " + dados["Codigo_Localidade"]);
            $("#cmbCodigo_Localidade").val(dados["Codigo_Localidade"]);
            console.log("Telefone_Pessoal " + dados["Telefone_Pessoal"]);
            $("#txtTelefone_Pessoal").val(dados["Telefone_Pessoal"]);
            console.log("Telefone_Trabalho " + dados["Telefone_Trabalho"]);
            $("#txtTelefone_Trabalho").val(dados["Telefone_Trabalho"]);
            console.log("Telefone_Recado " + dados["Telefone_Recado"]);
            $("#txtTelefone_Recado").val(dados["Telefone_Recado"]);
            console.log("Data_Apresentacao " + dados["Data_Apresentacao"]);
            $("#txtData_Apresentacao").val(dados["Data_Apresentacao"]);
        }        
    }

</script>
