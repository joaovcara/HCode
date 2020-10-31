<?php

    class Carro{

        //atributos privados não são acessados fora da classe
        //para acessá-los deve-se utilizar os métodos get, set
        private $modelo;
        private $motor;
        private $ano;

        //metodos get, set
        //metodos iniciam com letras minusculas
        public function getModelo(){

            //retorna o valor no atributo modelo
            return $this->modelo;

        }

        //metodo que atrubui valor para o atributo modelo
        //parametro $value é o valor que o método vai receber e atribuir 
        //posteirormente ao atributo modelo
        public function setModelo($value){

            //o atributo($modelo) recebe o valor do parametro ($value)
            $this->modelo = $value;

        }

        public function getMotor(){

            return $this->motor;

        }

        public function setMotor($value){

            $this->motor = $value;

        }

        public function getAno(){

            return $this->ano;

        }

        public function setAno($value){

            $this->ano = $value;

        }

        //metodo que exibe os atributos do veiculo
        public function exibe(){

            return array(
                "modelo"=>$this->getModelo(),
                "motor"=>$this->getMotor(),
                "ano"=>$this->getAno()
            );

        }

    }

?>