<?php

namespace Model\ClassManagementSession;

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


    public function setDataUpdate($dados){

    }


    public function setDataInsert($dados){
        
    }

    public function setDataDelete($dados){
        
    }


}


?>