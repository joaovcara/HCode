<?php

$data = array(
    "empresa" => "NOME DA EMPRESA"
);

//criando um cookie
//Parametro 1 = nome do cookie
//Parametro 2 = valor do cookie
//Parametro 3 = data de validade (em segundos)
setcookie("NOME", json_encode($data), time() + 3600 );

echo "Cookie criado";

?>