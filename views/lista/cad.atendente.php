<!DOCTYPE html>
<html lang="pt-br">

<head>
<?php require_once("include.php"); ?>
</head>

<body>

<?php require_once("../cabecalho.php"); ?>

<h2>Atendente</h2>

<?php require_once("cad.botao.php"); ?>

<form id="frmCadAtendente">
    <div class="form-group">
        <label for="txtCodigo">Codigo</label>
        <input class="form-control" type="text" id="txtCodigo" name="Codigo" value="" />
    </div>

    <div class="form-group">
        <label for="txtNome">Nome</label>
        <input class="form-control" type="text" id="txtNome" name="Nome" value="" />
    </div>

    <div class="form-group">
        <label for="cmbMinisterio">Ministerio</label>
        <select class="form-control" id="cmbMinisterio" name="Ministerio" >
        <option value="0">Anciao</option>
        <option value="1">Diacono</option>
        <option value="2">Cooperador</option>
        <option value="3">Cooperador de Jovem</option>
        <option value="4">Encarregado Regional</option>
        <option value="5">Encarregado Local</option>
        <option value="6">Examinadora</option>    
        <option value="7">Instrutora</option>
        <option value="8">Organista</option>
        <option value="9">Administrador</option>
        </select>
    </div>

    <div class="form-group">
        <label for="cmbAdministracao">Administracao</label>
        <select class="form-control" id="cmbAdministracao" name="Administracao" >
        <option value="0">Presidente</option>
        <option value="1">Vice-Presidente</option>
        <option value="2">Secretario</option>
        <option value="3">Vice-Secretario</option>
        <option value="4">Tesoureiro</option>
        <option value="5">Vice-Tesoureiro</option>
        <option value="6">Contador</option>
        <option value="7">Conselho Fiscal</option>
        <option value="8">Aux. Secretaria</option>
        <option value="9">Aux. Livro</option>
        </select>
    </div>

    <div class="form-group">
        <label for="cmbCodigo_Localidade">Localidade</label>
        <select class="form-control" id="cmbCodigo_Localidade" name="Codigo_Localidade" >
        <?php 
            require_once("../../services/lista/localidade.service.php");
            $localidades = LocalidadeService::ListarTodas();
            foreach ($localidades as $localidade) {
                echo '<option value="' . $localidade->Codigo . '">' . $localidade->Nome . '</option>';
            }
        ?>
        </select>
    </div>

    <div class="form-group">
        <label for="txtTelefone_Pessoal">Telefone Pessoal</label>
        <input class="form-control" type="text" id="txtTelefone_Pessoal" name="Telefone_Pessoal" value="" />
    </div>

    <div class="form-group">
        <label for="txtTelefone_Trabalho">Telefone Trabalho</label>
        <input class="form-control" type="text" id="txtTelefone_Trabalho" name="Telefone_Trabalho" value="" />
    </div>

    <div class="form-group">
        <label for="txtTelefone_Recado">Telefone Recado</label>
        <input class="form-control" type="text" id="txtTelefone_Recado" name="Telefone_Recado" value="" />
    </div>

    <div class="form-group">
        <label for="txtData_Apresentacao">Data Apresentacao</label>
        <input class="form-control" type="date" id="txtData_Apresentacao" name="Data_Apresentacao" value="" />
    </div>
</form>

<?php require_once("../../controllers/lista/atendente.controller.js"); ?>
<?php require_once("../../controllers/cad.controller.js"); ?>

<?php require_once("../rodape.php"); ?>

</body>
</html>