<?php

    //require_onde faz referencia ao arquivo Pessoa que é uma classe.
    //desta maneira é possivel criar um objeto para representar a classe dentro do Index
    require_once('Pessoa.php');
    
    //criando um objeto para representar a classe
    $joao = new Pessoa();

    //Acessando o atributo $nome da classe Pessoa e atribuindo o valor "João Vitor"
    $joao->nome = "João Vitor";

    //O Objeto $joao acessa o método falar() da classe Pessoa.
    //utiliza-se o 'echo' antes do objeto para visualizar na tela, porque o método falar apenas retorna o valor, não escreve para o usuário.
    echo $joao->falar();

?>