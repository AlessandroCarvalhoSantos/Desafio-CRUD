<?php

require_once __DIR__."/../../vendor/autoload.php";

use Model\ClassDatabase\ConnectionMySql;
use Model\ClassFitterPages\FitterPages;
use Model\ClassManagementSession\ManagementSession;
use Model\ClassPessoa\Pessoa;

$sessionPage = new ManagementSession; 
$pageInitial = new FitterPages; 

$sessionPage->initializeSession(); 




if($sessionPage->isValidToken($_SESSION["token"]) && $sessionPage->getType() == 'a'){

    if(isset($_POST['codPessoa'])){

      
        $pessoa = new Pessoa;

        $res = $pessoa->dataDelete($_POST);

        if($res){
            $_SESSION['sucesso'] = "Dado deletado com sucesso";
        }
     
        header("location: ../../controller/listagem/listagem.php");
        exit();

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