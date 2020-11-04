<?php

    //passando arquivo para variavel
    $fileName = "usuarios.csv";

    //verificando se o arquivo existe
    if(file_exists($fileName)){

        //abrindo arquivo atraves da variavel e setando que é apenas leitura "r"
        //e passando os dados para a variavel $file
        $file = fopen($fileName, "r");

        //separando os titulos das colunas
        //fgets = pega a primeira linha do arquivo
        //explode = remove a separação (",")
        $tituloColunas = explode("," , fgets($file));

        $data = array();

        //enquanto a variavel $row receber linhas na função fgets executa o comando dentro do while
        while($row = fgets($file)){

            //gerando as linhas
            $rowData = (explode(",", $row));

            $linha = array();
            //alocando as colunas das linhas na mesma posição dos titulos das colunas
            for ($i = 0; $i < count($tituloColunas); $i++){

                //posição $i do cabeçalho (identifica o nome da coluna)
                //recebe como valor a posição $i da minha linha que esta na variavel $rowData
                $linha[$tituloColunas[$i]] = $rowData[$i];

            }

            array_push($data, $linha);

        }

        //fechando arquivo 
        fclose($file);

        //removendo comandos de quebra de linha substituindo por "" (vazio)
        echo str_replace('\r\n', '', json_encode($data));

    }

?>