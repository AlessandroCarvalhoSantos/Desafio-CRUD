<?php

require_once __DIR__."/../../vendor/autoload.php";

use Model\ClassDatabase\ConnectionMySql;
use Model\ClassFitterPages\FitterPages;
use Model\ClassManagementSession\ManagementSession;


$sessionPage = new ManagementSession; 
$pageInitial = new FitterPages; 

$sessionPage->initializeSession(); 



if($sessionPage->isValidToken($_SESSION["token"]) && $sessionPage->getType() == 'a'){

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
    WHERE pessoas.id = ".intval($_SESSION["userId"]);
    $_SESSION['usuario'] =  $connection->execute($sql)->fetchAll(PDO::FETCH_ASSOC);


    $sql= "SELECT * FROM telefones WHERE id_pessoa = ".intval($_SESSION["userId"]);
    $_SESSION['usuario']["telefones"] =  $connection->execute($sql)->fetchAll(PDO::FETCH_ASSOC);
   
    $pageInitial->setVariablePath("../../");
    $pageInitial->setTitlePage("Configurações");
    $pageInitial->setPathPage("view/configuracoes/");
    $pageInitial->setNamePage("configuracoes", "php");
    $pageInitial->execute();
}else{
    header("location: controller/negado");
    exit();
}

?>
