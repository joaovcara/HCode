<?php

//criando arquivo se não existir
$file = fopen("teste.txt", "w+");

//fechando arquivo
fclose($file);

//apagando arquivo
unlink("teste.txt");

echo "Arquivo removido com sucesso";


?>