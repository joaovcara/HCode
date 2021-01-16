<?php

require_once("vendor/autoload.php");

//uso de rotas com Slim Framwork
$app = new \Slim\Slim();

//Rota 1
$app->get('/', function(){

    echo json_encode(array(
        'date'=>date("d/m/Y")
    ));
});

//Rota 2
$app->get('hello/:name', function($name){

    echo "Hello, " . $name;

});

$app->run();

?>