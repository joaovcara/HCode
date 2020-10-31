<?php

    class Usuario {

        //Atributos
        private $IdUsuario;
        private $Login;
        private $Senha;
        private $DataCadastro;

        //metodos get, set
        public function getIdUsuario(){ return $this->IdUsuario; }
        public function setIdUsuario($value){ $this->IdUsuario = $value; }

        public function getLogin(){ return $this->Login; }
        public function setLogin($value){ $this->Login = $value; }

        public function getSenha(){ return $this->Senha; }
        public function setSenha($value){ $this->Senha = $value; }

        public function getDataCadastro(){ return $this->DataCadastro; }
        public function setDataCadastro($value){ $this->DataCadastro = $value; }


        //metodo carrega usuario pelo ID recebe como parametro o $id
        public function loadById($id){

            //Instancio dentro do metodo a conexao e crio o objeto
            $sql = new Banco();

            //a variavel $resultado usa o metodo 'select' que está dentro da class Banco (representada pelo objeto $sql)
            //o primeiro parametro do metodo 'select' é a consulta a ser realizada
            //o segundo parametro do metodo 'select' são os parametros da função que serão atribuidos a consulta
            $resultado = $sql->select("SELECT * FROM Usuarios WHERE IdUsuario = :ID ", array(
                
                ":ID"=>$id

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

        //metodo para retornar json 
        public function __toString(){

            return json_encode(array(

                "IdUsuario"=>$this->getIdUsuario(),
                "Login"=>$this->getLogin(),
                "Senha"=>$this->getSenha(),
                "DataCadastro"=>$this->getDataCadastro()->format("d/m/Y H:i:s") 
            ));

        }

        //metodo para listar usuarios
        //static - classe não precisa ser instanciada, o metodo pode ser chamado diretamente
        public static function listaUsuarios(){

            $sql = new Banco();

            return $sql->select("SELECT * FROM Usuarios ORDER BY Login ASC");

        }

        //metodo lista usuario por busca pelo login(pesquisa com parâmetro de texto)
        public static function buscaUsuarios($login){

            $sql = new Banco();

            return $sql->select("SELECT * FROM Usuarios WHERE Login LIKE :TEXTO", array(
                ':TEXTO'=>"%".$login."%"
            ));

        }

        //Obtendo dados autenticados utilizando login e senha para fazer a autenticação
        public function login($login, $senha){

            $sql = new Banco();

            $resultado = $sql->select("SELECT * FROM Usuarios WHERE Login = :LOGIN AND Senha = :SENHA", array(
                ":LOGIN"=>$login,
                ":SENHA"=>$senha
            ));

            if(count($resultado) > 0){

                $this->setData($resultado[0]);

            } else {

                throw new Exception("Login e/ou senha inválidos");

            }

        }

        //Função de INSERT
        public function insert(){

            $sql = new Banco();

            $resultado = $sql->select("CALL sp_Usuarios_Insert(:LOGIN, :SENHA)", array(
                ":LOGIN"=>$this->getLogin(),
                ":SENHA"=>$this->getSenha()
            ));

            if(count($resultado) > 0 ){

                $this->setData($resultado[0]);

            }

        }

        public function setData($data){

            $this->setIdUsuario($data['IdUsuario']);
            $this->setLogin($data['Login']);
            $this->setSenha($data['Senha']);
            $this->setDataCadastro( new DateTime($data['DataCadastro']));

        }

        public function __construct($login = "", $senha = ""){

            $this->setLogin($login);
            $this->setSenha($senha);

        }

    }


?>