<?php

$image = scandir("images");

$data = array();

//percorrendo o retorno do scandir para listar imagem por imagem
foreach ($image as $img){

    //percorrendo os valores para excluir os diretorios ".", e ".." para não serem listados
    //a função in_array, para,etro 1 oque voce precisa, segundo parametro a referencia
    //se encontrar estas referencias ele pula.
    if(!in_array($img, array(".", ".."))){

        //variavel $fileName recebe o caminho da imagem que esta na pasta "images"
        //DIRECTORY_SEPARATOR = é utilizado no lugar da / ou \ pois há variação entre sistemas operacionais
        //$img o nome da imagem encontrada
        $fileName = "images".DIRECTORY_SEPARATOR.$img;

        //variavel $info recebe atraves da função pathinfo informações sobre a imagem que foi passada 
        //neste caso atraves da variavel $fileName que possui o caminho mais nome da imagem
        $info = pathinfo($fileName);

        //pegando o tamanho do arquivo
        //dentro das informações ($info) adicione a propriedade ["size"]
        //para pegar o tamanho usa-se a função filesize e passa como parametro o arquivo ($fileName) (O TAMANHO É MOSTRADO EM BYTES)
        $info["size"] = filesize($fileName);

        //pegando a data da ultima modificação do arquivo
        //adicione a propriedade modified no formado data :   = date("d/m/Y H:i:s")
        //função filemtime pega o valor da data da ultima modificação do arquivo
        $info["modified"] = date("d/m/Y H:i:s", filemtime($fileName));

        //adicionando uma url para acessar o arquivo
        //como estamos usando o DIRECTORY_SEPARATOR a barra ficara invertida, para corrigir usa-se a função str_replace
        //str_replace("o que eu quero trocar", "pelo que vou trocar", onde vou trocar)
        $info["url"] = "http://localhost/hcode/PHP/Diretorio/".str_replace("\\", "/",$fileName);

        //função array_push serve para inserir valores no array
        //primeiro parametro é o nome do array, neste caso é a variavel $data
        //segundo parametro são os valores que estão na variavel $info
        array_push($data, $info);

    }

}

echo json_encode($data);

?>