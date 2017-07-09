<script type="text/javascript" language="javascript">
    $(document).ready(function() {
        /// Quando usuário clicar em salvar será feito todos os passo abaixo
        $('#btnSalvar').click(function() {

            console.log("Salvar");

            var dados = $('#frmCadTipoServico').serialize() + "&opcao=Salvar";
            console.log(dados);

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '../../controllers/lista/tipo.servico.controller.php',
                async: true,
                data: dados,
                success: function(response) {
                    console.log("success");
                    location.reload();
                }
            });

            return false;
        });
    });
</script>