<?php

    $conn = new PDO("mysql:dbname=hcodephp;host=localhost", "root", "maria@2020");

    //comando update
    $stmt = $conn->prepare("UPDATE Usuarios SET Login = :LOGIN WHERE IdUsuario = :ID");

    //atribuindo valores para os parametros
    $login = "jose";
    $id = "4";

    //passando valor do parametro
    $stmt->bindParam(":LOGIN", $login);
    $stmt->bindParam(":ID", $id);


    //Executando o comando de update
    $stmt->execute();

    echo "Usuário alterado";

?>