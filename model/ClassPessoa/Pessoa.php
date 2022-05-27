<?php

namespace Model\ClassPessoa;

use Error;
use Exception;
use Model\ClassDatabase\ConnectionMySql;
use Model\ClassEncryptDecrypt\EncryptDecrypt;
use Model\ClassValidations\Validations;
use PDO;

class Pessoa{


    private $id; 
    private $endereco_id; 
    private $senha; 
    private $cpf; 

    private $nome;
    private $rg;
    private $data_nascimento;

    private $data_cadastro; 
    private $data_atualizacao; 
    private $data_exclusao; 

    private $cep; 
    private $endereco; 
    private $numero; 
    private $estado_id; 


    public function dataUpdate($dados){

        $dados = $this->padraoDados($dados);

        $res = $this->isValidId($dados);
        if(!$res) return $res;
        $res = $this->isValidIdEndereco($dados);
        if(!$res) return $res;
        $res = $this->isValidSenha($dados, false);
        if(!$res) return $res;
        $res = $this->isValidCpf($dados, false);
        if(!$res) return $res;
        $res = $this->isValidUf($dados);
        if(!$res) return $res;

        $this->setBaseData($dados);
  

        $this->data_cadastro = $dados['data_cadastro'];
        $this->data_exclusao = null;
        $this->data_atualizacao = strval(Date('Y-m-d'));


        $enderecos = $this->setArryEnderecos();

        $connection = new ConnectionMySql();
        $connection->executeConnection();
        $connection->setTable('enderecos');
        $where = "id = ". $this->endereco_id;
        $connection->update($enderecos, $where);


        //Da update na tabela de pessoa
        $pessoa = $this->setArryPessoas();
        $connection->setTable('pessoas');
        $where = "id = ". $this->id;
        $connection->update($pessoa, $where);


        $this->insertUpdateTelefones($dados);

        $_SESSION['usuario'][0] = $dados; 
        $_SESSION['usuario']['telefones'] = $dados['telefones']; 

        return $res;
    }

    private function insertUpdateTelefones($dados){

        $connection = new ConnectionMySql();
        $connection->executeConnection();
        $connection->setTable('telefones');

        $where = 'id_pessoa ='. intval($this->id); 
        $connection->delete($where);

        for($i=0; $i<count($dados['telefones']); $i++){

            $telefone = array(
                "id_pessoa"=> $this->id,
                "telefone"=> $dados['telefones'][$i]['telefone']
            );
            $connection->insert($telefone);
        }

    }

    private function setArryEnderecos(){
        
        $enderecos = array(
            "estado_id"=> $this->estado_id,
            "cep"=> $this->cep,
            "endereco"=>$this->endereco,
            "numero" => $this->numero
        );
        return $enderecos;
    }

    private function setArryPessoas(){
        
     
        $pessoa = array(
            "endereco_id"=> $this->endereco_id,
            "nome"=> $this->nome,
            "cpf"=>$this->cpf,
            "rg" => $this->rg,
            "data_nascimento" => $this->data_nascimento,
            "data_cadastro" => $this->data_cadastro,
            "data_atualizacao" => $this->data_atualizacao,
            "data_exclusao" => $this->data_exclusao,
        );

        if($this->senha != null || $this->senha != ""){
            $pessoa['senha'] = $this->senha;
        }
        return $pessoa;

    }

    private function setBaseData($dados){

        $vd = new Validations;

        $this->nome = $dados['nome'];
        $this->rg = $dados['rg'];
        $this->data_nascimento = $dados['data_nascimento'];
        $this->cep = $vd->removeSpecialChar($dados['cep']);
        $this->numero = $dados['numero'];
        $this->endereco = $dados['endereco'];

    }

    private function isValidUf($dados){

    
        if(strlen($dados['ufSigla'])==2){

         
            $connection = new ConnectionMySql();
            $connection->executeConnection();
            $sql = "SELECT id FROM estados WHERE ufSigla = '" . $dados['ufSigla']. "'";
            $existe =  $connection->execute($sql)->fetchAll(PDO::FETCH_ASSOC);
            unset($connection);

            if(count($existe)>0){
                $this->estado_id = $existe[0]['id'];
                return true;
            }

        }
        
        $_SESSION["errorForm"]='Estado Inválido';
        return $this->dataError($dados);
        
    }

    private function isValidCpf($dados, $required=false){

        $vd = new Validations();
        $cpf = $vd->isValidCPF($dados['cpf']);
        if($cpf != false){

            if($required){
                $connection = new ConnectionMySql();
                $connection->executeConnection();
                $sql = "SELECT * FROM pessoas WHERE cpf = '" . $cpf . "'";
                $existe =  $connection->execute($sql)->fetchAll(PDO::FETCH_ASSOC);
                unset($connection);

                if(count($existe)>0){
                    $_SESSION["errorForm"]='Esse CPF já existe';
                    return $this->dataError($dados);
                }
              
            }
            $this->cpf=$cpf;
            return true;
        }
        else{
            $_SESSION["errorForm"]='Cpf Inválido';
            return $this->dataError($dados);
        }
    }

    private function isValidSenha($dados, $required=false){

        $encrypt = new EncryptDecrypt();
        if($dados['senha1']==$dados['senha2']){

            if($required && $dados['senha1']!="" && strlen($dados['senha1'])>5){
                $this->senha= $encrypt->encrypt($dados['senha1']);
                return true;
            }else{

                if($dados['senha1']!="" && strlen($dados['senha1'])>5){
                    $this->senha = $encrypt->encrypt($dados['senha1']);
                    return true;
                }

                if($dados['senha1']=="" && $dados['senha2']=="" && !$required){
                    return true;
                }
            }

            $_SESSION["errorForm"]='Houve um erro na senha, verique elas.';
            return $this->dataError($dados);
         
        }
        else{
            $_SESSION["errorForm"]='As senhas não são iguais.';
            return $this->dataError($dados);
        }
    }

    private function isValidIdEndereco($dados){
        if($dados['endereco_id']>0 && $dados['endereco_id'] != ""){
            $this->endereco_id=$dados['endereco_id'];
            return true;
        }
        else{
            $_SESSION["errorForm"]='Houve um erro interno no servidor, tente novamente';
            return $this->dataError($dados);
        }
    }

    private function isValidId($dados){
        if($dados['id']>0 && $dados['id'] != ""){
            $this->id=$dados['id'];
            return true;
        }
        else{
            $_SESSION["errorForm"]='Houve um erro interno no servidor, tente novamente';
            return $this->dataError($dados);
        }
    }

    private function padraoDados($dados){

        for($i=0; $i <count($dados['telefoneId']); $i++){
            $aux['id'] = $dados['telefoneId'][$i];
            $aux['telefone'] = $dados['telefone'][$i];
            $dados["telefones"][] = $aux;
        }
        unset($dados['telefoneId']);
        unset($dados['telefone']);

        return $dados;
    }

    public function dataError($dados){
        
        $dados = $this->padraoDados($dados);
        $_SESSION['usuario'][0] = $dados;
        $_SESSION['usuario']['telefones'] = $dados['telefones'];

        return false;
    }


    public function dataInsert($dados){
        
    }

    public function dataDelete($dados){
        
    }


}


?>