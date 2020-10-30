<?php

    //importa o arquivo de configuração que já possui a função de identificar as classes
    require_once("config.php");

    // //Instanciando o objeto da classe 'Banco'
    // $sql = new Banco();

    // //executando comento e atribuindo valor para um objeto (neste caso $usuarios que recebe o valor da consulta)
    // $usuarios = $sql->select("SELECT * FROM Usuarios");

    // echo json_encode($usuarios);


    $user = new Usuario();

    $user->loadById(1);

    echo $user;



?>