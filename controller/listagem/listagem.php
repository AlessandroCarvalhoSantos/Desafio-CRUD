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
    $sql = "SELECT * FROM pessoas WHERE data_exclusao IS NULL";
    $dados =  $connection->execute($sql)->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['dadosUsers'] = $dados;

   
    $pageInitial->setVariablePath("../../");
    $pageInitial->setTitlePage("Home");
    $pageInitial->setPathPage("view/listagem/");
    $pageInitial->setNamePage("listagem", "php");
    $pageInitial->execute();
}else{
    header("location: ../../controller/negado");
    exit();
}

?>
