<?php

require_once __DIR__."/vendor/autoload.php";

use Model\ClassDatabase\CreateTables;
use Model\ClassFitterPages\FitterPages;
use Model\ClassManagementSession\ManagementSession;


$sessionPage = new ManagementSession; 
$pageInitial = new FitterPages; 

$sessionPage->initializeSession(); 


//Verifica se existe um token e se for de usuário, ele destrói a sessão
//Resertando a sessão
if(isset($_SESSION['token']) && $_SESSION['type']=='a'){
    $sessionPage->destroySession(); // Limpa toda a sessão
    session_regenerate_id(); //Regenera a sessão
    
}

//Cria uma sessão do tipo "guest" = usuário não cadastrado.
$sessionPage->setType("g"); //Tipo de usuário
$sessionPage->setUser("Anonimo"); //Nome do usuário
$sessionPage->setUserId('0'); // Id do usuário
$sessionPage->createTokenSession(); // Cria token para asessão

//Verifica se existe a tabela no banco
$tables = new CreateTables();
$tables->verifyTables();



//Monta uma página html
$pageInitial->setVariablePath("");
$pageInitial->setTitlePage("Login");
$pageInitial->setPathPage("view/login/");
$pageInitial->setNamePage("homeLogin", "php");
$pageInitial->execute();




?>
