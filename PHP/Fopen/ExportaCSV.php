<?php

//fazendo referencia ao arquivo de configuraçao
require_once("config.php");

//instanciando a classe de banco de dados
$sql = new Banco();

//executando uma query que esta na classe banco
$result = $sql->select("SELECT * FROM Usuarios ORDER BY Login");

//GERANDO CVS

//identificando as colunas
$colunas = array();

//adicionando os nomes das colunas em um array
//$result variavel que esta com os dados na posição 0 que é a posição do cabeçalho
//$key nome da coluna
//$value valor da coluna (nesta etapa não é importante pois estamos apenas pegano o nome das colunas)
foreach ($result[0] as $key => $value) {

    //função ucfirst() converte em letras MAIUSCULAS
    array_push($colunas, ucfirst($key));

}

//criando arquivo cvs
$file = fopen("usuarios.csv", "w+");

//adicionando os cabeçalhos ao arquivo e dando quebra de linha
fwrite($file, implode("," , $colunas). "\r\n");

//adicionando os dados
//passando pela consulta  separando por linha separado por virgula entre colunas
//ESTE PRIMEIRO FOREACH ESTA PASSANDO DE LINHA EM LINHA DA CONSUTA
foreach ($result as $row) {
    
    //variavel $data vai receber os valores
    $data = array();

    //passando pelas linhas adicionando a separação por virgula
    //ESTE SEGUNDO FOREACH ESTA PASSANDO COLUNA POR COLUNA DA LINHA
    foreach($row as $key => $value){

        //para cada linha que vier estou pegando o valor que é a variavel $value
        //e passando para a variavel $data que vai armazenar os resultados.
        array_push($data, $value);
        
    }

    //depois que pegou os dados das colunas de UMA linha escreve essa linha no arquivo
    //no arquivo $file, sera escrito separado por virgulas os valores da linha que estão na variavel $data, por ultimo pule uma linha
    fwrite($file, implode(",", $data) . "\r\n");


}


//finalizando escrita no arquivo
fclose($file);


//função implode recebe dois parametros
//primeiro parametro é o que eu quero adicionar
//segundo é onde será adicionado
//neste caso será adicionado no término de cada posição do array
// //echo implode("," , $colunas);




?>