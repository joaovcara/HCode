<?php

class Documento{

    //atributos
    private $numero;

    //metodos get, set
    public function getNumero(){
        return $this->numero;
    }

    public function setNumero($value){

        //Passo o metodo de validar o numero digitado.
        //a variavel $resultado armazenara o resultado da validação do CPF (true ou false)
        $resultado = Documento::validaCPF($value);

        //verifico se a validação do cpf foi falsa
        if($resultado === false) {

            //gerando erro(Excessão)
            throw new Exception("CPF Inválido.", 1);

        }

        $this->numero = $value;

    }

    //Metodo Valida CPF
    public static function validaCPF($numero) : bool 
    {

        //verifica se o numero foi informado
        //empty = verifica se é vazio
        if(empty($numero)) return false;

        //Elimina mascaras
        $numero = preg_replace('[^0-9]', '', $numero);
        $numero = str_pad($numero, 11, '0', STR_PAD_LEFT);

        //Verifica se o numero digitado é diferente 11 caracteres
        //strlen = comprimento
        if(strlen($numero) != 11){ return false; }

        //verifica se alguma destas sequencias foi digitada
        else if($numero == '00000000000' ||
                $numero == '11111111111' ||
                $numero == '22222222222' ||
                $numero == '33333333333' ||
                $numero == '44444444444' ||
                $numero == '55555555555' ||
                $numero == '66666666666' ||
                $numero == '77777777777' ||
                $numero == '88888888888' ||
                $numero == '99999999999'){

            return false;

        }
        //Calcula o digito verificador para verificar se o CPF é valido
        else{
            
            for ($t = 9; $t < 11; $t++) {
                
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $numero{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($numero{$c} != $d) {
                    return false;
                }
            }

        }

        return true;

    }

}

?>