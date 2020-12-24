<?php

function error_handler($codigo, $mensagem, $file, $linha){

    echo json_encode(array(
        "Codigo" => $codigo,
        "Mensagem" => $mensagem,
        "Arquivo" => $file,
        "Linha" => $linha
    ));
}

set_error_handler("error_handler");

echo 100 / 0;

?>