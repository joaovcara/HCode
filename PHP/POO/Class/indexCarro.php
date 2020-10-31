<?php

    require_once("Carro.php");

    $veiculo = new Carro();

    $veiculo->setModelo("ASTRA");
    $veiculo->setMotor("1.8 MPFI");
    $veiculo->setAno("2000/2001");

    echo json_encode($veiculo->exibe());

?>