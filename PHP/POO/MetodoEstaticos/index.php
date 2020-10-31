<?php

require_once("Documento.php");

$cpf = new Documento();
$cpf->setNumero("41516246861");

var_dump($cpf->getNumero());


//para usar o metodo statico sem instanciar a class
//Documento = nome da classe
//:: acessa o metodo
//validarCPF o metodo
//retornando true ou false
var_dump(Documento::validaCPF("41516246861"));

?>