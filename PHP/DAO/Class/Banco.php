<?php

    class Banco extends PDO{
        
        //declaração de variavel privada, só é vista dentro desta classe
        private $conn;

        //Metodo construtor, toda vez que a variavel for instanciada executa o código dentro do método
        public function __construct(){

            $this->conn =  new PDO("mysql:dbname=hcodephp;host=localhost", "root", "maria@2020");

        }

        //metodo que seta N parametros
        private function setParams($statement, $parameters = array()){

            //recebe os parametros do metodo e percorre passando para a variavel statement
            foreach ($parameters as $key => $value) {
                
                //aqui é chamado o metodo que seta apenas 1 parametro, sendo assim o foreach usa o outro metodo em vez de ter que reescrever aqui.
                $this->setParam($statement, $key, $value);

            }

        }


        //metodo que seta apenas 1 parametro
        //neste caso como é apenas 1 parametro a chave e o valor já são passados como parametros do proprio metodo.
        private function setParam($statement, $key, $value){

            $statement->bindParam($key, $value);

        }


        //metodo para execução, recebe 2 parametros sendo:
        //$consulta a query do banco e $parametros os parametros desta consulta(query) que é um array pois podem ser N parametros da consulta
        public function query($consulta, $parametros = array()){

            //aqui é criado o comando
            $stmt = $this->conn->prepare($consulta);
            
            $this->setParams($stmt, $parametros);

            //executa o comando
            $stmt->execute();

            //retorna o objeto preenchido
            return $stmt;
        }

        //metodo de select
        //o ':array = demonstra que o metodo retorna N valores em forma de array'
        public function select($consulta, $parametros = array()):array
        {

            $stmt = $this->query($consulta, $parametros);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);            

        }

    }

?>