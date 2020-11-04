<?php

$dir1 = "Pasta_01";
$dir2 = "Pasta_02";

//se não for um diretorio
if(!is_dir($dir1)) mkdir ($dir1);
if(!is_dir($dir2)) mkdir ($dir2);

//criando arquivo na pasta 1
$fileName = "README.txt";

//se não existir o arquivo $fileName no diretorio 1
if(!file_exists($dir1.DIRECTORY_SEPARATOR.$fileName)){

    //cria o arquivo
    $file = fopen($dir1.DIRECTORY_SEPARATOR.$fileName , "w+");

    //escrevendo a data no arquivo
    fwrite($file, date("Y-m-d H:i:s"));

}

//MOVENDO PARA PASTA 2
//parametro 1 = caminho original mais nome do arquivo
//parametro 2 = novo caminho do arquivo mais nome
rename($dir1.DIRECTORY_SEPARATOR.$fileName , $dir2.DIRECTORY_SEPARATOR.$fileName)

?>