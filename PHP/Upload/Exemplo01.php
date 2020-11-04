<!-- Formulário para anexar os arquivos 
enctype="multipart/form-data - passa os dados como binários"-->
<form method="POST" enctype="multipart/form-data">

    <input type="file" name="fileUpload">

    <button type="submit">Enviar</button>

</form>

<?php

    //variavel de ambiente $_SERVER["REQUEST_METHOD"] armazena o metodo de envio do formulário
    //se for igual POST entra no if
    if($_SERVER["REQUEST_METHOD"] === "POST"){

        //recuperar o arquivo que esta sendo enviado
        //para recuperar arquivo usa-se $_FILES
        $file = $_FILES["fileUpload"];

        if($file["error"]){

            //caso haja algum erro mostra mensagem
            throw new Exception("Error: ".$file["error"]);

        }

        //variavel para armazenar os uploads
        //diretorio "UploadFiles"
        $dirUpload = "UploadFiles";

        //se não existir o diretorio
        if(!is_dir($dirUpload)){

            //cria o diretório
            mkdir($dirUpload);

        }

        //movendo arquivo para novo destino
        //verifica se o upload foi realizado
        //função para mover: move_uploaded_file(arquivo com nome temporario, destino do arquivo 
        //passando como nome sua propriedade name)
        if(move_uploaded_file($file["tmp_name"], $dirUpload.DIRECTORY_SEPARATOR.$file["name"])){

            echo "Upload realizado com sucesso";

        }else{

            throw new Exception("Não foi possível realizar o upload");

        }

    }


?>