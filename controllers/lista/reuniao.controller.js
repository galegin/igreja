<script type="text/javascript" language="javascript">

    var url_api = '../../controllers/lista/reuniao.controller.php';
    var name_form = '#frmCadReuniao';

    function getValues()
    {
        var values =
        {
            Codigo :  $("#txtCodigo").val(),
            Descricao : $("#txtDescricao").val(),
            Data : $("#txtData").val(),
            Data_Proxima : $("#txtData_Proxima").val(),
            Hora_Inicio : $("#txtHora_Inicio").val(),
            Nome_Atende : $("#txtNome_Atende").val(),
            Palavra : $("#txtPalavra").val(),
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
            $("#txtDescricao").val(dados["Descricao"]);
            $("#txtData").val(dados["Data"]);
            $("#txtData_Proxima").val(dados["Data_Proxima"]);
            $("#txtHora_Inicio").val(dados["Hora_Inicio"]);
            $("#txtNome_Atende").val(dados["Nome_Atende"]);
            $("#txtPalavra").val(dados["Palavra"]);
        }        
    }

</script>
