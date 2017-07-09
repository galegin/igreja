<!DOCTYPE html>
<html lang="pt-br">

<head>
<?php require_once("/views/include.php"); ?>
</head>

<body>

<?php require_once("/views/cabecalho.php"); ?>

<h2>Lista de Servico</h2>

<ul class="nav nav-pills nav-stacked">
    <li class="active"><a href="#">Cadastro</a></li>
    <li><a href="views/lista/cad.reuniao.php">Reuniao</a></li>
    <li><a href="views/lista/cad.localidade.php">Localidade</a></li>
    <li><a href="views/lista/cad.tipo.servico.php">Tipo Servico</a></li>
    <li><a href="views/lista/cad.atendente.php">Atendente</a></li>
    
    <li class="active"><a href="#">Lista</a></li>
    <li><a href="views/lista/lista.impressao.php">Impressao</a></li>
    <li><a href="views/lista/lista.servico.php">Servico</a></li>
    <li><a href="views/lista/lista.batismo.php">Batismo</a></li>
    <li><a href="views/lista/lista.culto.ensinamento.php">Culto Ensinamento</a></li>
    <li><a href="views/lista/lista.santa.ceia.php">Santa Ceia</a></li>
    <li><a href="views/lista/lista.coleta.php">Coleta</a></li>
    <li><a href="views/lista/lista.reuniao.mocidade.php">Reuniao Mocidade</a></li>
    <li><a href="views/lista/lista.apresentacao.php">Apresentacao</a></li>
    <li><a href="views/lista/lista.observacao.php">Observacao</a></li>
    
    <li class="active"><a href="views/lista/sair.php">Sair</a></li>
</ul>

<?php require_once("/views/rodape.php"); ?>

</body>
</html>