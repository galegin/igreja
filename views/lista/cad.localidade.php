<!DOCTYPE html>
<html lang="pt-br">

<head>
<?php require_once("include.php"); ?>
</head>

<body>

<?php require_once("../cabecalho.php"); ?>

<h2>Localidade</h2>

<?php require_once("cad.botao.php"); ?>

<form id="frmCadLocalidade">
    <div class="form-group">
        <label for="txtCodigo">Codigo</label>
        <input class="form-control" type="text" id="txtCodigo" name="Codigo" value="" />
    </div>

    <div class="form-group">
        <label for="txtNome">Nome</label>
        <input class="form-control" type="text" id="txtNome" name="Nome" value="" />
    </div>

    <div class="form-group">
        <label for="cmbTipo">Tipo</label>
        <select class="form-control" id="cmbTipo" name="Tipo">
        <option value="1">Igreja</option>
        <option value="0">Local</option>
        </select>
    </div>

    <div class="form-group">
        <label for="txtAnciao">Anciao</label>
        <input class="form-control" type="text" id="txtAnciao" name="Anciao" value="" />
    </div>

    <div class="form-group">
        <label for="txtDiacono">Diacono</label>
        <input class="form-control" type="text" id="txtDiacono" name="Diacono" value="" />
    </div>

    <div class="form-group">
        <label for="txtCooperador">Cooperador</label>
        <input class="form-control" type="text" id="txtCooperador" name="Cooperador" value="" />
    </div>

    <div class="form-group">
        <label for="txtCooperador_Jovem">Cooperador de Jovem</label>
        <input class="form-control" type="text" id="txtCooperador_Jovem" name="Cooperador_Jovem" value="" size="50" />
    </div>

    <div class="form-group">
        <label for="txtEncarregado">Encarregado</label>
        <input class="form-control" type="text" id="txtEncarregado" name="Encarregado" value="" size="50" />
    </div>

    <div class="form-group">
        <label>Dias de Culto Oficial</label>
        
        <div class="form-inline">
            <span size="50">Domingo<span>
            <select class="form-control" id="cmbCultoOficialDom" name="CultoOficialDom">
            <option value=""></option>
            <option value="DM">Manha</option>
            <option value="DT">Tarde</option>
            <option value="DN">Noite</option>
            </select>
        </div>
            
        <div class="form-inline">
            <span>Segunda<span>
            <select class="form-control" id="cmbCultoOficialSeg" name="CultoOficialSeg">
            <option value=""></option>
            <option value="2M">Manha</option>
            <option value="2T">Tarde</option>
            <option value="2N">Noite</option>
            </select>
        </div>
            
        <div class="form-inline">
            <span>Terca<span>
            <select class="form-control" id="cmbCultoOficialTer" name="CultoOficialTer">
            <option value=""></option>
            <option value="3M">Manha</option>
            <option value="3T">Tarde</option>
            <option value="3N">Noite</option>
            </select>
        </div>
            
        <div class="form-inline">
            <span>Quarta<span>
            <select class="form-control" id="cmbCultoOficialQua" name="CultoOficialQua">
            <option value=""></option>
            <option value="4M">Manha</option>
            <option value="4T">Tarde</option>
            <option value="4N">Noite</option>
            </select>
        </div>
            
        <div class="form-inline">
            <span>Quinta<span>
            <select class="form-control" id="cmbCultoOficialQui" name="CultoOficialQui">
            <option value=""></option>
            <option value="5M">Manha</option>
            <option value="5T">Tarde</option>
            <option value="5N">Noite</option>
            </select>
        </div>
            
        <div class="form-inline">
            <span>Sexta<span>
            <select class="form-control" id="cmbCultoOficialSex" name="CultoOficialSex">
            <option value=""></option>
            <option value="6M">Manha</option>
            <option value="6T">Tarde</option>
            <option value="6N">Noite</option>
            </select>
        </div>
            
        <div class="form-inline">
            <span>Sabado<span>
            <select class="form-control" id="cmbCultoOficialSab" name="CultoOficialSab">
            <option value=""></option>
            <option value="SM">Manha</option>
            <option value="ST">Tarde</option>
            <option value="SN">Noite</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label>Dias de Culto de Jovem</label><br>
        <div class="checkbox">
            <label><input type="checkbox" id="chkCultoJovem1Dom" name="CultoJovem1Dom" />1 Domingo</label>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" id="chkCultoJovem2Dom" name="CultoJovem2Dom" />2 Domingo</label>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" id="chkCultoJovem3Dom" name="CultoJovem3Dom" />3 Domingo</label>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" id="chkCultoJovem4Dom" name="CultoJovem4Dom" />4 Domingo</label>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" id="chkCultoJovem5Dom" name="CultoJovem5Dom" />5 Domingo</label>        
        </div>
    </div>
</form>

<?php require_once("../../controllers/lista/localidade.controller.js"); ?>
<?php require_once("../../controllers/cad.controller.js"); ?>

<?php require_once("../rodape.php"); ?>

</body>
</html>