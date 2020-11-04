<?php

//variavel name que recebe o nome do diretorio
$name = "images";

//verifica se o diretorio não existe
//se não existir
if(!is_dir($name)){

    //comando mkdir cria o diretorio com nome atribuido a variavel $name
    mkdir($name);

    //imprime mensagem de sucesso
    echo "Diretório $name criado com sucesso";

}else{

    //função rmdir() remove o diretorio
    rmdir($name);

    //caso já exista imprime mensagem
    echo "Diretório já existente.";

}

?>