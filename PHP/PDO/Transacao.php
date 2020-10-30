<?php

    $conn = new PDO("mysql:dbname=hcodephp;host=localhost", "root", "maria@2020");

    //Abertura da transação
    $conn->beginTransaction();

    //comando delete
    //? outra forma de se passar parametros
    //desta mandeira não precisa de identificador
    $stmt = $conn->prepare("DELETE FROM Usuarios WHERE IdUsuario = ?");

    //atribuindo valores para os parametros
    $id = "2";

    //Executando o comando de delete
    //quando o parametro for por '?' a atribuição é feita no execute através de um array
    //sendo assim pode-se passar N parametros, e a sequência deve ser a mesma da linha de comando.. neste caso de DELETE
    $stmt->execute(array($id));

    //roolback - cancela a execução
    // $conn->rollBack();

    //commit - confirma a transação
    $conn->commit();

    echo "Usuário excluido";

?>