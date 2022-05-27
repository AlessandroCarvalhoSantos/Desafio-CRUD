<?php

namespace Model\ClassDatabase;

use Model\ClassDatabase\ConnectionMySql;
use Model\ClassEncryptDecrypt\EncryptDecrypt;
use PDO;

class CreateTables{

    private $connection=null;
     
    public function verifyTables(){

        $this->connection = new ConnectionMySql();
        $this->connection->executeConnection();
        $dados =  $this->connection->execute("SHOW TABLES;")->fetchAll(PDO::FETCH_COLUMN);

 

        if(!in_array("estados", $dados)){
            $this->createTableEstados();
            $this->insertUF();
        }

        if(!in_array("enderecos", $dados)){
            $this->createTableEnderecos();
        }

        if(!in_array("pessoas", $dados)){
            $this->createTablePessoas();
            $this->insertPessoas();
        }

        if(!in_array("telefones", $dados)){
            $this->createTableTelefone();
            $this->insertTelefones();
        }
    }

    private function insertUF(){


        $uf = array(
            "RO"=>"Rondônia",	
            "AC"=>"Acre",	
            "AM"=>"Amazonas",	
            "RR"=>"Roraima",
            "PA"=>"Pará",	
            "AP"=>"Amapá",	
            "TO"=>"Tocantins",
            "MA"=>"Maranhão",
            "PI"=>"Piauí",
            "CE"=>"Ceará",
            "RN"=>"Rio Grande do Norte",
            "PB"=>"Paraíba",
            "PE"=>"Pernambuco",
            "AL"=>"Alagoas",
            "SE"=>"Sergipe",
            "BA"=>"Bahia",
            "MG"=>"Minas Gerais",
            "ES"=>"Espírito Santo",
            "RJ"=>"Rio de Janeiro",
            "SP"=>"São Paulo",
            "PR"=>"Paraná",
            "SC"=>"Santa Catarina",
            "RS"=>"Rio Grande do Sul",
            "MS"=>"Mato Grosso do Sul",
            "MT"=>"Mato Grosso",
            "GO"=>"Goiás",
            "DF"=>"Distrito Federal"	
        );

        foreach($uf as $key=>$value){
            $sql ="INSERT INTO `estados`(`ufSigla`, `ufNome`) VALUES ('$key','$value')";
            $this->connection->execute($sql);
        }

    }

    private function insertTelefones(){

     
        $dados = array(
            "id_pessoa"=> $this->id,
            "telefone"=> "28999762587"
        );

        $this->connection->setTable('telefones');
        $this->connection->insert($dados);

        $dados = array(
            "id_pessoa"=> $this->id,
            "telefone"=> "28999298577"
        );

        $this->connection->setTable('telefones');
        $this->connection->insert($dados);
    }

    private function insertPessoas(){
        $dados = array(
            "estado_id"=> 18,
            "cep"=> "29290000",
            "endereco"=>"Avenida x perto da rua Y",
            "numero" => "55"
        );

        $this->connection->setTable('enderecos');
        $id=$this->connection->insert($dados);


        $encrypt = new EncryptDecrypt();
        $password = $encrypt->encrypt("123456");

        $dados = array(
            "endereco_id"=> $id,
            "nome"=> "Alessandro Carvalho Santos",
            "cpf"=>"46086722072",
            "rg" => "000000-ES",
            "senha" => "$password",
            "data_nascimento" => "2000-07-08",
            "data_cadastro" => "2022-05-26",
            "data_atualizacao" => null,
            "data_exclusao" => null,
        );

        $this->connection->setTable('pessoas');
        $id=$this->connection->insert($dados);

        $this->id = $id;


    }



    private function createTablePessoas(){
        $this->connection->execute("CREATE TABLE `webdec`.`pessoas` 
        (`id` INT NOT NULL AUTO_INCREMENT , 
        `endereco_id` INT NOT NULL , 
        `nome` VARCHAR(50) NOT NULL ,
        `senha` VARCHAR(40) NOT NULL ,
        `cpf` VARCHAR(11) NOT NULL , 
        `rg` VARCHAR(20) NOT NULL , 
        `data_nascimento` DATE NOT NULL , 
        `data_cadastro` DATE NOT NULL , 
        `data_atualizacao` DATE  , 
        `data_exclusao` DATE  , PRIMARY KEY (`id`),
        CONSTRAINT FK_PessoaEndereco FOREIGN KEY (`endereco_id`)
        REFERENCES enderecos(`id`)
        ) ENGINE = InnoDB;");
    }

    private function createTableTelefone(){
        $this->connection->execute("CREATE TABLE `webdec`.`telefones` 
        (`id` INT NOT NULL AUTO_INCREMENT , 
        `id_pessoa` INT NOT NULL , 
        `telefone` VARCHAR(20) NOT NULL , 
        CONSTRAINT FK_TelefonePessoa FOREIGN KEY (`id_pessoa`)
        REFERENCES pessoas(`id`),
        PRIMARY KEY (`id`)) ENGINE = InnoDB;");
    }

    private function createTableEstados(){
        $this->connection->execute("
        CREATE TABLE `webdec`.`estados` 
            (`id` INT NOT NULL AUTO_INCREMENT ,
            `ufSigla` CHAR(2) NOT NULL , 
            `ufNome` VARCHAR(30) NOT NULL , 
            PRIMARY KEY (`id`)) ENGINE = InnoDB;");
    }

    private function createTableEnderecos(){
        $this->connection->execute("CREATE TABLE `webdec`.`enderecos` 
        (`id` INT NOT NULL AUTO_INCREMENT , 
        `estado_id` INT NOT NULL , 
        `cep` VARCHAR(8) NOT NULL , 
        `endereco` VARCHAR(150) NOT NULL , 
        `numero` INT NOT NULL , 
        PRIMARY KEY (`id`),
        CONSTRAINT FK_EnderecoEstado FOREIGN KEY (`estado_id`)
        REFERENCES estados(`id`)
        ) ENGINE = InnoDB;");
    }


}