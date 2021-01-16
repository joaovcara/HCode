<?php

$data = [
    "nome"=>"Hcode"
];

//chaves
define('SECRET_IV', pack('a16', 'senha'));
define('SECRET', pack('a16', 'senha'));

//encriptando
$openssl = openssl_encrypt(
    json_encode($data),
    'AES-128-CBC',
    SECRET,
    0,
    SECRET_IV
);

//apresentando a criptografia
echo base64_encode($openssl);

//descriptografando
$string = openssl_decrypt($openssl, 'AES-128-CBC', SECRET, 0, SECRET_IV);

//mostrando string
var_dump(json_decode($string, true));

?>