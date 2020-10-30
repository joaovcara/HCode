<?php

    $conn = new PDO("mysql:dbname=hcodephp;host=localhost", "root", "maria@2020");

    //stmt = quer dizer comando
    //nos valores o insert esta sendo feito via parametros
    //a sintaxe para passar os parametros é ':XXXXX', sendo que XXXXX é um identificador do parametro e deve ser unico
    $stmt = $conn->prepare("INSERT INTO Usuarios (login, Senha) VALUES ( :LOGIN, :SENHA )");

    //atribuindo valores para os parametros
    $login = "joao";
    $senha = "123123";

    //Passando valores das variaveis para os parametros do insert
    //Utiliza a função bindparam onde voce passa como primeiro parametro o parametro do insert 
    //e o segundo parametro é a variavel com valor que sera atribuido
    $stmt->bindParam(":LOGIN", $login);
    $stmt->bindParam(":SENHA", $senha);


    //Executando o comando de insert
    $stmt->execute();

    echo "Usuário Cadastrado";

?>