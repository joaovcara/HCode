<?php

    //conexão para MYSQL / MARIADB
    $conn = new PDO("mysql:dbname=hcodephp;host=localhost", "root", "maria@2020");

    $stmt = $conn->prepare("SELECT * FROM Usuarios");
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //var_dump($results); //CONSULTA EM JSON

    //Percorrendo o arquivo e listando item a item

    //primeiro foreach pega cada item principal do array e entra para suas linhas
    foreach ($results as $row) {

        //A cada linha pega a key que se refere ao nome da coluna do banco e o value que é o valor cadastrado
        foreach ($row as $key => $value) {

            echo "<strong>".$key.": </strong>".$value."<br/>";

        }

        echo "-----------------------------------------------------------------<br/>";

    }    

?>