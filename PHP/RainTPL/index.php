<?php

require_once("vendor/autoload.php");

use Rain\Tpl;

$config = array(
    "tpl_dir"   => "templates/",
    "cache_dir" => "cache/",
);

Tpl::configure($config);

$tpl = new Tpl;

$tpl -> assign ("name", "Hcode");
$tpl -> assign ("version", PHP_VERSION);

$tpl -> draw ("index");

?>