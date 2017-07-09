<?php

require_once("../persistencia.php");

class Localidade extends Persistencia
{
    public $Codigo;
    public $Nome;
    public $Tipo;
    public $Anciao;
    public $Diacono;
    public $Cooperador;
    public $Cooperador_Jovem;
    public $Encarregado;
    public $Dias_Culto;
    public $Dias_Culto_Jovem;
    public $Tipo_Logradouro;
    public $Logradouro;
    public $Numero_Logradouro;
    public $Bairro;
    public $Cidade;
    public $Tipo_Imovel;
    public $Acomodacao;
    public $Comodatario;
    public $Metragem;

    function SetRecord($record)
    {
        $Codigo = $record["Codigo"];
        $Nome = $record["Nome"];
        $Tipo = $record["Tipo"];
        $Anciao = $record["Anciao"];
        $Diacono = $record["Diacono"];
        $Cooperador = $record["Cooperador"];
        $Cooperador_Jovem = $record["Cooperador_Jovem"];
        $Encarregado = $record["Encarregado"];
        $Dias_Culto = $record["Dias_Culto"];
        $Dias_Culto_Jovem = $record["Dias_Culto_Jovem"];
        $Tipo_Logradouro = $record["Tipo_Logradouro"];
        $Logradouro = $record["Logradouro"];
        $Numero_Logradouro = $record["Numero_Logradouro"];
        $Bairro = $record["Bairro"];
        $Cidade = $record["Cidade"];
        $Tipo_Imovel = $record["Tipo_Imovel"];
        $Acomodacao = $record["Acomodacao"];
        $Comodatario = $record["Comodatario"];
        $Metragem = $record["Metragem"];
    }

    function GetCmdConsultar()
    {
        return
            "select * from Localidade where Codigo = $Codigo";
    }

    function GetCmdIncluir()
    {
        return
            "insert into Localidade (Codigo,Nome,Tipo,Anciao,Cooperador,Cooperador_Jovem,Encarregado," +
                "Dias_Culto,Dias_Culto_Jovem,Tipo_Logradouro,Logradouro,Numero_Logradouro,Bairro,Cidade," + 
                "Tipo_Imovel,Acomodacao,Comodatario,Metragem) " + 
            "values ($Codigo,'$Nome',$Tipo,'$Anciao','$Cooperador','$Cooperador_Jovem','$Encarregado'," +
                "'$Dias_Culto','$Dias_Culto_Jovem','$Tipo_Logradouro','$Logradouro','$Numero_Logradouro','$Bairro','$Cidade'," + 
                "$Tipo_Imovel,'$Acomodacao','$Comodatario','$Metragem')";
    }

    function GetCmdAlterar()
    {
        return
            "update Localidade " +
            "set Nome = '$Nome' " +
            ", Tipo = $Tipo " +
            ", Anciao = '$Anciao' " +
            ", Diacono = '$Diacono' " +
            ", Cooperador = '$Cooperador' " +
            ", Cooperador_Jovem = '$Cooperador_Jovem' " +
            ", Encarregado = '$Encarregado' " +
            ", Dias_Culto = '$Dias_Culto' " +
            ", Dias_Culto_Jovem = '$Dias_Culto_Jovem' " +
            ", Tipo_Logradouro = '$Tipo_Logradouro' " +
            ", Logradouro = '$Logradouro' " +
            ", Numero_Logradouro = '$Numero_Logradouro' " +
            ", Bairro = '$Bairro' " +
            ", Cidade = '$Cidade' " +
            ", Tipo_Imovel = $Tipo_Imovel " +
            ", Acomodacao = '$Acomodacao' " +
            ", Comodatario = '$Comodatario' " +
            ", Metragem = '$Metragem' " +
            "where Codigo = $Codigo";
    }

    function GetCmdExcluir()
    {
        return
            "delete from Localidade where Codigo = $Codigo";
    }
}
?>