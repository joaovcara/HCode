<?php

//endereço do arquivo
$link = "https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png";

//conteudo da imagem / arquivo
$content = file_get_contents($link);

//pegando informações do arquivo
$parse = parse_url($link);

//separando o nome da arquivo
$basename = basename($parse["path"]);

//gerando arquivo fisico
$file = fopen($basename, "w+");

//escrevendo conteudo no arquivo fisico
fwrite($file, $content);

//fechando a escrita
fclose($file);

?>
<!-- Mostrando a imagem já salva no computador -->
<img src="<?=$basename?>">