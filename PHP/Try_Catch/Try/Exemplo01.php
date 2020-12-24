<?php

//tenta executar o que esta no bloco de codigo try
try {

    //Parametro
    //new Exception = instancia da classe de erros
    //Parametro 1 - mensagem
    //Parametro 2 - Codigo do erro
    throw new Exception("Houve um erro", 400);

}
//caso de algum erro no try entra no catch
//tudo que der de erro a classe Exception armazena na variavel $e
catch(Exception $e){

    //gerando um json com o erro
    echo json_encode(array(

        //pegando a mensagem usando a função getMessage() da classe Exception
        "mensagem"=>$e->getMessage(),

        //Pegando a linha do erro usando a classe getLine()
        "line"=>$e->getLine(),

        //pegando o arquivo que deu erro usando a função getFile()
        "file"=>$e->getFile(),

        //pegando o codigo do erro
        "code"=>$e->getCode()
    ));

}

?>