<?php

require_once __DIR__."/../../vendor/autoload.php";

use Model\ClassDatabase\ConnectionMySql;
use Model\ClassFitterPages\FitterPages;
use Model\ClassManagementSession\ManagementSession;


$sessionPage = new ManagementSession; 
$pageInitial = new FitterPages; 

$sessionPage->initializeSession(); 




if($sessionPage->isValidToken($_SESSION["token"]) && $sessionPage->getType() == 'a'){

    if(isset($_POST['codPessoa']) || isset($_SESSION['usuario'])){

        if(!isset($_SESSION['usuario'])){

            $connection = new ConnectionMySql();
            $connection->executeConnection();
            $sql = "SELECT 
            pessoas.id, 
            pessoas.endereco_id,
            pessoas.nome,  
            pessoas.senha, 
            pessoas.cpf, 
            pessoas.rg, 
            pessoas.data_nascimento, 
            pessoas.data_cadastro, 
            pessoas.data_atualizacao, 
            pessoas.data_exclusao,
            enderecos.estado_id, 
            enderecos.cep, 
            enderecos.endereco, 
            enderecos.numero,
            estados.ufSigla, 
            estados.ufNome
            FROM pessoas
            INNER JOIN enderecos ON pessoas.endereco_id = enderecos.id
            INNER JOIN estados ON enderecos.estado_id = estados.id
            WHERE pessoas.id = ".intval($_POST['codPessoa']);
            $_SESSION['usuario'] =  $connection->execute($sql)->fetchAll(PDO::FETCH_ASSOC);


            $sql= "SELECT * FROM telefones WHERE id_pessoa = ".intval($_POST['codPessoa']);
            $_SESSION['usuario']["telefones"] =  $connection->execute($sql)->fetchAll(PDO::FETCH_ASSOC);

            $_SESSION['usuario'][0]['cpf'] = vsprintf("%s%s%s.%s%s%s.%s%s%s-%s%s",str_split($_SESSION['usuario'][0]['cpf']));
            $_SESSION['usuario'][0]['cep'] = vsprintf("%s%s%s%s%s-%s%s%s",str_split($_SESSION['usuario'][0]['cep']));
        
        }
        
        $pageInitial->setVariablePath("../../");
        $pageInitial->setTitlePage("Home");
        $pageInitial->setPathPage("view/listagem/");
        $pageInitial->setNamePage("edicao", "php");
        $pageInitial->execute();

    }
    else{
        header("location: ../../controller/home/home.php");
        exit();
    }
  
}else{
    header("location: ../../controller/negado.php");
    exit();
}

?>