<form method="POST">

    <input type="text" name="busca"></input>
    <button type="submit">Enviar</button>

</form>


<?php

    if(isset($_POST['busca'])){

    //a função estrip remove as tags, as que estão nas aspas
    //são as tags permitidas
    echo strip_tags($_POST['busca'], "<strong> <br>");

    }

?>