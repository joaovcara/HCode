<?php

    //metodo magico __autoload recebe como parametro o nome da classe que será utilizada
    //este método faz o require_once deste arquivo, e dos demais que são herdados nas classes
    //contudo só faz a busca no mesmo diretorio
    function __autoload($nameClass){

        require_once("$nameClass.php");

    }



    //OPÇÃO DE AUTOLOAD 2
    
    //função para incluir classes
    function incluiClasses($nameClass){
        
        //verifica se o arquivo com o nome da classe existe
        if(file_exists($nameClass.".php") === true){ 

            require_once($nameClass.".php");

        }
    }

    //metodo para fazer autoload das classes
    spl_autoload_register("incluiClasses");

?>