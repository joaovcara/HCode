<?php

    //Por convenção o nome da classe é escrito com a primeira letra maiuscula
    //o nome do arquivo deve possuir o mesmo nome.
    class Pessoa{

        //atributos da classe
        //para referenciar um atributo em qualquer metodo da classe deve-se usar   $this->nomedoatributo   SEM O '$' o $this já faz o papel do '$'
        public $nome;

        //metodo falar da classe Pessoa
        public function falar(){

            //return -> retorna um resultado da função.
            return "O meu nome é ". $this->nome;

        }

    }

?>