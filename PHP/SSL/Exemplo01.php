<?php

session_start();

//depois de verificar login e senha reinicie o ID da session

//matando a sessão
session_destroy();

//reiniciando a sessão
session_start();

session_regenerate_id();

echo session_id();

?>