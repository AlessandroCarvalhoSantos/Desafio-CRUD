<?php

namespace Model\ClassPessoa;

use Exception;
use Model\ClassValidations\Validations;

class Pessoa{


    private $idPessoa;
    private $endereco_id;
    private $nome;
    private $senha;
    private $cpf;
    private $rg;
    private $data_nascimento;
    private $data_cadastro;
    private $data_atualizacao;
    private $data_exclusao;

    private $cep;
    private $endereco;
    private $nuemro;
    private $ufSigla;
    private $ufNome;
    private $estado_uf;


    public function dataUpdate($dados){

        if($dados['id']>0 && $dados['id'] != ""){
            $this->idPessoa=$dados['id'];
        }
        else{
            throw Error('Houve um erro interno no servidor');
        }
       

        // $validator = new Validations();
        // echo '<pre>';
        // print_r($dados);
        // echo '</pre>';

        $_SESSION['usuario'][0] = $dados;
        // $_SESSION['usuario']["telefones"];
        

    }


    public function dataInsert($dados){
        
    }

    public function dataDelete($dados){
        
    }


}


?>