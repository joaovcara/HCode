<?php

//fopen recebe dois parametros
//fopen("caminho do arquivo + nome", "ação que será executada no arquivo")
//parametro 2 "w+" = w: escreva    +: crie como o arquivo não existe irá criar  VER MAIS NA DOCUMENTAÇÃO PHP
//a+ = preserva o coteudo existente e posiciona o cursor no final do arquivo para adicionar mais conteudo
$file = fopen("log.txt", "a+");  

//função para colocar a informação dentro do arquivo
//recebe 2 parametros 
//primeiro qual o arquivo
//segundo dados que serão escritos
// ."\r\n" pula linha
fwrite($file, date("d/m/Y H:i:s"). "\r\n");

//finalizando o processo, terminar a escrita
//fclose() = fexe o arquivo
fclose($file);

echo "Arquivo criado com sucesso";

?>