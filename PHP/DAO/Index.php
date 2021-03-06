<?php

    //importa o arquivo de configuração que já possui a função de identificar as classes
    require_once("config.php");

    // //Instanciando o objeto da classe 'Banco'
    // $sql = new Banco();

    // //executando comento e atribuindo valor para um objeto (neste caso $usuarios que recebe o valor da consulta)
    // $usuarios = $sql->select("SELECT * FROM Usuarios");

    // echo json_encode($usuarios);


    //----------------------------------------------------------------------------------------//
    //Listando 1 usuario por ID
    // $user = new Usuario();
    // $user->loadById(1);

    // echo $user;

    
    
    //----------------------------------------------------------------------------------------//
    // //Lista todos os usuários

    // //sintaxe para chamar um método de classe diretamente sem instanciar a classe (metodo precisa ser static)
    // $lista = Usuario::listaUsuarios();


    // echo json_encode($lista);

    //----------------------------------------------------------------------------------------//
    // //Lista usuarios por busca de descricao (login)

    // $busca = Usuario::buscaUsuarios("j");

    // echo json_encode($busca);



    //----------------------------------------------------------------------------------------//
    // //Carrega um usuário validando login e senha

    // $user = new Usuario();

    // $user->Login("joao", "joao");

    // echo $user;

    //----------------------------------------------------------------------------------------//
    // //INSERT USUARIO

    // $aluno = new Usuario("aluno","aluno");

    // $aluno->insert();

    // echo $aluno;

    //----------------------------------------------------------------------------------------//
    // //UPDATE USUARIO

    // $usuario = new Usuario();
    // $usuario->loadById(9);

    // $usuario->update("talita", "talita");

    // echo $usuario;

    //----------------------------------------------------------------------------------------//
    // //DELETE USUARIO

    //instancio o a classe Usuario
    $usuario = new Usuario();

    //Carrego um usuario usando o metodo loadById da classe Usuario
    $usuario->loadById(6);
    
    //deleto o usuario carregado usando o metodo delete da classe Usuario
    $usuario->delete();

    //imprimo na tela o resultado gerado pelo metodo delete
    echo $usuario;

?>