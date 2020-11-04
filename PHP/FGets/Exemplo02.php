<?php

    //crio a variavel que representa a imagem
    $imageName = "square.jpg";

    //crio a variavel que recebera os dados da imagem
    //a função file_get_contents() le todo o arquivo e retorna um valor binário
    //para converter e base64 usa a função base64_encode()
    $base64 = base64_encode(file_get_contents($imageName));

    //pegar informações do tipo do arquivo
    //Instanciando o objeto da class finfo
    //finfo - classe nativa do PHP
    //FILEINFO_MIME_TYPE - retorna o tipo MIME do arquivo
    $fileInfo = new finfo(FILEINFO_MIME_TYPE);

    //variavel mimeType recebe as propriedades myme que for retornada 
    //da instania $fileInfo, usando a função file() da classe passando como 
    //parametro o caminho/nome da imagem representada pela variavel $imageName
    $mimeType = $fileInfo->file($imageName);

    //padrao de exibição do base64
    //data: tipo do arquivo neste caso est armazenado na variavel $mimeType
    //base64
    //conteudo: esta na variavel $base64
    $base64encode = "data:".$mimeType.";base64,".$base64;

?>

<a href="<?=$base64encode?>" target="_blank">Link para imagem</a>

<img src="<?=$base64encode?>">