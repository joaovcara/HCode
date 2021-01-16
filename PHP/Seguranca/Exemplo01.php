<?php

if($_SERVER["REQUEST_METHOD"] === 'POST'){

    //utilizando a função escapeshellcmd para escapar 
    //de comandos que não são esperados
    $cmd = escapeshellcmd($_POST["cmd"]);

    var_dump($cmd);

    echo "<pre>";

    $comando = system($cmd, $retorno);

    echo "</pre>";

}

?>

<form action="#" method="POST">

    <input type="text" name="cmd">
    <button type="submit">Enviar</button>

</form>