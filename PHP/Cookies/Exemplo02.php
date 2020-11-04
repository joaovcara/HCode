<?php

//verificando se o cookie existe
if(isset($_COOKIE["NOME"])){

    //recuperando os valores
    $obj = json_decode($_COOKIE["NOME"]);

    //gerando um objeto e acessando sua propriedade
    echo $obj->empresa;

}
?>