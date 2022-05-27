<?php

require_once __DIR__."/../../vendor/autoload.php";


use Model\ClassFitterPages\FitterPages;
use Model\ClassManagementSession\ManagementSession;
use Model\ClassPessoa\Pessoa;


$sessionPage = new ManagementSession; 
$pageInitial = new FitterPages; 

$sessionPage->initializeSession(); 


if($sessionPage->isValidToken($_SESSION["token"]) && $sessionPage->getType() == 'a'){



    if(isset($_POST)){


        $pessoa = new Pessoa();
        $res = $pessoa->dataUpdate($_POST);

        if($res){
            $_SESSION['sucesso'] = "Dados Atualizados com sucesso";
        }
     
        header("location: ../../controller/configuracoes/configuracoes.php");
        exit();

    }
    else{
        header("location: ../../controller/home/home.php");
        exit();
    }
  
}else{
    header("location: ../../controller/negado");
    exit();
}

?>