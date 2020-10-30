<?php

    class Usuario {

        private $IdUsuario;
        private $Login;
        private $Senha;
        private $DataCadastro;

        public function getIdUsuario(){ return $this->IdUsuario; }
        public function setIdUsuario($value){ $this->IdUsuario = $value; }

        public function getLogin(){ return $this->Login; }
        public function setLogin($value){ $this->Login = $value; }

        public function getSenha(){ return $this->Senha; }
        public function setSenha($value){ $this->Senha = $value; }

        public function getDataCadastro(){ return $this->DataCadastro; }
        public function setDataCadastro($value){ $this->DataCadastro = $value; }


        public function loadById($Id){

            //Instancio dentro do metodo a conexao e crio o objeto
            $sql = new Banco();

            //a variavel $resultado usa o metodo 'select' que está dentro da class Banco (representada pelo objeto $sql)
            //o primeiro parametro do metodo 'select' é a consulta a ser realizada
            //o segundo parametro do metodo 'select' são os parametros da função que serão atribuidos a consulta
            $resultado = $sql->select("SELECT * FROM Usuarios WHERE IdUsuario = :ID ", array(
                
                ":ID"=>$Id

            ));

            //verifica se retornou algum valor
            if(count($resultado) > 0){

                //se retornado, o valor é atribuido para a variavel $row
                $row = $resultado[0];

                //passando dados para os set's 
                //$row = linha
                //['IdUsuario'] = nome da coluna da tabela
                $this->setIdUsuario($row['IdUsuario']);
                $this->setLogin($row['Login']);
                $this->setSenha($row['Senha']);
                $this->setDataCadastro( new DateTime($row['DataCadastro'])); //new DateTime = passa a data no formado brasileiro

            }

        }

        public function __toString(){

            return json_encode(array(

                "Idusuario"=>$this->getIdUsuario(),
                "Login"=>$this->getLogin(),
                "Senha"=>$this->getSenha(),
                "DataCadastro"=>$this->getDataCadastro()->format("d/m/Y")

            ));

        }


    }


?>