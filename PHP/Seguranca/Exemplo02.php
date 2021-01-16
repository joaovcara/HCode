<?php

$id = (isset($_GET["id"])) ? $_GET["id"] : 1;

//validando a entrada dos dados
//se não for numerico ou maior que 5 caracteres.
if(!is_numeric($id) || strlen($id) > 5){

    exit("Pegamos você");

}

$conn = mysqli_connect("localhost", "root", "maria@2020", "hcodephp");

$sql = "SELECT * FROM usuarios WHERE IdUsuario = $id";

$exec = mysqli_query($conn, $sql);

while ($resultado = mysqli_fetch_object($exec)){

    var_dump($resultado);

}

?>