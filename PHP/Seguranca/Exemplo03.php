<?php

$pasta = "arquivos";
$permissao = "0775";

//criando pasta com permissões
if(!is_dir($pasta)){

    //O PRIMEIO PARAMETRO É O NOME DA PASTA
    //O SEGUNDO É A PERMISSÃO
    mkdir($pasta, $permissao);

}

echo "Diretorio criado";

?>

<!-- PERMISSÕES DE PASTAS -->
<!-- 
    0 - SEM PERMISSÃO
    1 - PERMISSÃO DE EXECUÇÃO
    2 - PERMISSÃO DE GRAVAÇÃO
    3 - PERMISSÃO EXECUÇÃO E GRAVAÇÃO
    4 - SOMENTE LEITURA
    5 - LEITURA E EXECUÇÃO
    6 - LEITURA E GRAVAÇÃO
    7 - LEITURA EXECUÇÃO E GRAVAÇÃO 
-->