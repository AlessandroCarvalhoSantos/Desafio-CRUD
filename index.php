<?php

require_once __DIR__."/vendor/autoload.php";

use Model\ClassDatabase\CreateTables;
use Model\ClassFitterPages\FitterPages;
use Model\ClassManagementSession\ManagementSession;


$sessionPage = new ManagementSession; 
$pageInitial = new FitterPages; 

$sessionPage->initializeSession(); 


if(isset($_SESSION['token']) && $_SESSION['type']=='a'){
    $sessionPage->destroySession();
    session_regenerate_id();
    
}

$sessionPage->setType("g");
$sessionPage->setUser("Anonimo");
$sessionPage->setUserId('0');
$sessionPage->createTokenSession();

$tables = new CreateTables();
$tables->verifyTables();



$pageInitial->setVariablePath("");
$pageInitial->setTitlePage("Login");
$pageInitial->setPathPage("view/login/");
$pageInitial->setNamePage("homeLogin", "php");
$pageInitial->execute();




?>
