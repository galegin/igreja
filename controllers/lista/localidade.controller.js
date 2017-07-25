<script type="text/javascript" language="javascript">

    var url_api = '../../controllers/lista/localidade.controller.php';
    var name_form = '#frmCadLocalidade';

    function getValues()
    {
        //-- dias culto

        var cmbCultoOficialDom = $("#cmbCultoOficialDom").val();
        var cmbCultoOficialSeg = $("#cmbCultoOficialSeg").val();
        var cmbCultoOficialTer = $("#cmbCultoOficialTer").val();
        var cmbCultoOficialQua = $("#cmbCultoOficialQua").val();
        var cmbCultoOficialQui = $("#cmbCultoOficialQui").val();
        var cmbCultoOficialSex = $("#cmbCultoOficialSex").val();
        var cmbCultoOficialSab = $("#cmbCultoOficialSab").val();

        var diasCulto = 
            (cmbCultoOficialDom != "" ? cmbCultoOficialDom + " " : "") +
            (cmbCultoOficialSeg != "" ? cmbCultoOficialSeg + " " : "") +
            (cmbCultoOficialTer != "" ? cmbCultoOficialTer + " " : "") +
            (cmbCultoOficialQua != "" ? cmbCultoOficialQua + " " : "") +
            (cmbCultoOficialQui != "" ? cmbCultoOficialQui + " " : "") +
            (cmbCultoOficialSex != "" ? cmbCultoOficialSex + " " : "") +
            (cmbCultoOficialSab != "" ? cmbCultoOficialSab + " " : "") ;

        //-- dias culto jovem

        var diasCultoJovem =
            ($("#chkCultoJovem1Dom").prop("checked") ? "1D " : "") +
            ($("#chkCultoJovem2Dom").prop("checked") ? "2D " : "") +
            ($("#chkCultoJovem3Dom").prop("checked") ? "3D " : "") +
            ($("#chkCultoJovem4Dom").prop("checked") ? "4D " : "") +
            ($("#chkCultoJovem5Dom").prop("checked") ? "5D " : "") ;

        //--

        var values =
        {
            Codigo :  $("#txtCodigo").val(),
            Nome : $("#txtNome").val(),
            Tipo : $("#cmbTipo").val(),
            Anciao : $("#txtAnciao").val(),
            Diacono : $("#txtDiacono").val(),
            Cooperador : $("#txtCooperador").val(),
            Cooperador_Jovem : $("#txtCooperador_Jovem").val(),
            Encarregado : $("#txtEncarregado").val(),
            Dias_Culto : diasCulto.trim(), // $("#txtDias_Culto").val(),
            Dias_Culto_Jovem : diasCultoJovem.trim(), // $("#txtDias_Culto_Jovem").val(),
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
            $("#cmbTipo").val(dados["Tipo"]);
            $("#txtAnciao").val(dados["Anciao"]);
            $("#txtDiacono").val(dados["Diacono"]);
            $("#txtCooperador").val(dados["Cooperador"]);
            $("#txtCooperador_Jovem").val(dados["Cooperador_Jovem"]);
            $("#txtEncarregado").val(dados["Encarregado"]);
            //$("#txtDias_Culto").val(dados["Dias_Culto"]);
            //$("#txtDias_Culto_Jovem").val(dados["Dias_Culto_Jovem"]);

            //-- dias culto

            $("#cmbCultoOficialDom").val("");
            $("#cmbCultoOficialSeg").val("");
            $("#cmbCultoOficialTer").val("");
            $("#cmbCultoOficialQua").val("");
            $("#cmbCultoOficialQui").val("");
            $("#cmbCultoOficialSex").val("");
            $("#cmbCultoOficialSab").val("");

            var diasCulto = dados["Dias_Culto"];

            var listaCulto = diasCulto.split(" ");

            /* for (var i = 0; i < listaCulto.length; i++)
            {
                console.log(listaCulto[i]);
            } */

            listaCulto.forEach(function(current_value) {

                console.log(current_value);

                if ("DM,DT,DN".indexOf(current_value) > -1)
                    $("#cmbCultoOficialDom").val(current_value);
                else if ("2M,2T,2N".indexOf(current_value) > -1)
                    $("#cmbCultoOficialSeg").val(current_value);
                else if ("3M,3T,3N".indexOf(current_value) > -1)
                    $("#cmbCultoOficialTer").val(current_value);
                else if ("4M,4T,4N".indexOf(current_value) > -1)
                    $("#cmbCultoOficialQua").val(current_value);
                else if ("5M,5T,5N".indexOf(current_value) > -1)
                    $("#cmbCultoOficialQui").val(current_value);
                else if ("6M,6T,6N".indexOf(current_value) > -1)
                    $("#cmbCultoOficialSex").val(current_value);
                else if ("SM,ST,SN".indexOf(current_value) > -1)
                    $("#cmbCultoOficialSab").val(current_value);
            });

            //-- dias culto jovem

            var diasCultoJovem = dados["Dias_Culto_Jovem"];

            $("#chkCultoJovem1Dom").prop("checked", diasCultoJovem.indexOf("1D") > -1);
            $("#chkCultoJovem2Dom").prop("checked", diasCultoJovem.indexOf("2D") > -1);
            $("#chkCultoJovem3Dom").prop("checked", diasCultoJovem.indexOf("3D") > -1);
            $("#chkCultoJovem4Dom").prop("checked", diasCultoJovem.indexOf("4D") > -1);
            $("#chkCultoJovem5Dom").prop("checked", diasCultoJovem.indexOf("5D") > -1);
       }        
    }

</script>
