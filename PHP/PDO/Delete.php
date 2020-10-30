<?php

    $conn = new PDO("mysql:dbname=hcodephp;host=localhost", "root", "maria@2020");

    //comando delete
    $stmt = $conn->prepare("DELETE FROM Usuarios WHERE IdUsuario = :ID");

    //atribuindo valores para os parametros
    $id = "4";

    //passando valor do parametro
    $stmt->bindParam(":ID", $id);


    //Executando o comando de delete
    $stmt->execute();

    echo "Usuário excluido";

?>