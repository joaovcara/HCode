<?php

    //arquivo de configuração que carrega automaticamente as classes
    spl_autoload_register(function($class_name){

        //A variavel $filename recebe o caminho do arquivo que esta na pasta Class + 'Nome XXXX($class_name)' + extensão(.php)
        $filename = "Class".DIRECTORY_SEPARATOR.$class_name.".php";

        if(file_exists(($filename))){

            require_once($filename);
            
        }

    });

?>