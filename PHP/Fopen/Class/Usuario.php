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

                /***ESTAS LINHAS DE CÓDIGO DENTRO DESTE IF FORAM SUBSTITUIDAS NOS MÉTODOS SEGUINTES */
                /***FOI CRIADO O MÉTODO setData */

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

            //instancia a classe do banco
            $sql = new Banco();

            //retorna o select 
            return $sql->select("SELECT * FROM Usuarios ORDER BY Login ASC");

        }

        //metodo lista usuario por busca pelo login(pesquisa com parâmetro de texto)
        public static function buscaUsuarios($login){

            $sql = new Banco();

            return $sql->select("SELECT * FROM Usuarios WHERE Login LIKE :TEXTO", array(
                ":TEXTO"=>"%".$login."%"
            ));

        }

        //Obtendo dados autenticados utilizando login e senha para fazer a autenticação
        public function login($login, $senha){

            $sql = new Banco();

            //select utilizando o metodo select da classe Banco, e no where passa os parametros que devem ser pesquisados
            $resultado = $sql->select("SELECT * FROM Usuarios WHERE Login = :LOGIN AND Senha = :SENHA", array(
                ":LOGIN"=>$login,
                ":SENHA"=>$senha
            ));

            //se trouxer os resultados
            if(count($resultado) > 0){

                //seta os dados para os atributos através do metodo setData
                $this->setData($resultado[0]);

            } else {

                //estoura excessão acusando que está inválido
                throw new Exception("Login e/ou senha inválidos");

            }

        }

        //metodo de INSERT de usuário
        public function insert(){

            //instancia da classe Banco
            $sql = new Banco();

            //execução da procedure que foi criada no banco de dados
            //CALL -> chama procedure sp_Usuarios_Insert e passa os parametros :LOGIN, :SENHA
            //dentro da procedure estão os comandos de insert e o select que trará o resultado 
            //e será armazenado na variável $resultado
            $resultado = $sql->select("CALL sp_Usuarios_Insert(:LOGIN, :SENHA)", array(
                ":LOGIN"=>$this->getLogin(),
                ":SENHA"=>$this->getSenha()
            ));

            //se trouxer algum resultado
            if(count($resultado) > 0 ){

                //seta os dados para os atributos através do metodo setData
                $this->setData($resultado[0]);

            }

        }

        //função que seta os dados para os atributos da classe
        public function setData($data){

            //setando os dados para os atributos da classe
            //passando dados para os set's 
            //$row = linha
            //['IdUsuario'] = nome da coluna da tabela
            $this->setIdUsuario($data['IdUsuario']);
            $this->setLogin($data['Login']);
            $this->setSenha($data['Senha']);
            $this->setDataCadastro( new DateTime($data['DataCadastro']));

        }

        //metodo construtor que pode receber automaticamente login e senha quando a classe for instanciada
        //a passagem dos parametros ($login = "", $senha = "") passa-se (= "") porque não torna obrigatória a passagem
        //sendo assim se não for passado parametro na instanciação da classe Usuario será passado "" (vazio)
        public function __construct($login = "", $senha = ""){

            $this->setLogin($login);
            $this->setSenha($senha);

        }

        //metodo update usuario
        public function update($login, $senha){  //no update passa-se nos parametros as variaveis dos campos da tabela que podem ser alterados

            //setando os valores recebidos no update para os atributos da classe usuário
            $this->setLogin($login);
            $this->setSenha($senha);

            //instanciação da classe
            $sql = new Banco();

            //execução da query através do metodo query que pertence a classe Banco.
            $sql->query("UPDATE Usuarios SET Login = :LOGIN, Senha = :LOGIN WHERE IdUsuario = :ID", array(

                //na passagem dos parametros para a query pegamos os valores já nos atributos pois foram 
                //preenchidos acima quando receberam os parametros do metodo update
                ":LOGIN"=>$this->getLogin(),
                ":SENHA"=>$this->getSenha(),
                ":ID"=>$this->getIdUsuario()
            ));

        }

        //metodo deleta usuario
        public function delete(){

            $sql = new Banco();

            $sql->query("DELETE FROM Usuarios WHERE IdUsuario = :ID", array(
                ":ID"=>$this->getIdUsuario()
            ));

            $this->limpaDados();

        }

        //metodo limpa campos
        public function limpaDados(){

            $this->setIdUsuario("");
            $this->setLogin("");
            $this->setSenha("");
            $this->setDataCadastro(new DateTime()); //passando a data atual para o campo

        }
    }

?>