<?php

    //criando pasta
    //se ("images") não for um diretorio > crie
    if(!is_dir("images")) mkdir("images");

    //para cara item dentro de images vai ser um item
    foreach (scandir("images") as $item) {

        //removendo (pulando itens) que são os caminhos "."  e  ".." 
        if(!in_array($item, array(".", ".."))){

            //apagando arquivo por arquivo da pasta images
            unlink("images/" . $item);
            
        }

    }

    echo "ITENS APAGADOS COM SUCESSO";

?>