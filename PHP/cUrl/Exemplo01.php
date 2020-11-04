<?php

//variavel com o numero do CEP
$cep = "17602045";

//endereço da API com Parametro
$link = "https://viacep.com.br/ws/$cep/json/";

//chamando a biblioteca
$ch = curl_init($link);

//Comando para funcionar a biblioteca
//parametro 1 = biblioteca
//parametro 2 = constante que espera retorno
//parametro 3 = 1 quer o retorn / 0 não quer o retorno
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

//pegando a resposta
$result = curl_exec($ch);

//fecha conexao
curl_close($ch);

//gerando JSON na variavel $data 
//parametro 2 como true confirma que é para gerar um array
$data = json_decode($result, true);

//a partir daqui tem acesso a todas as chaves do JSON

print_r($data);

?>