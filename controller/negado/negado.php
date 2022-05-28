<?php

require_once __DIR__."/../../vendor/autoload.php";


use Model\ClassFitterPages\FitterPages;
use Model\ClassManagementSession\ManagementSession;


$sessionPage = new ManagementSession; 
$pageInitial = new FitterPages; 

$sessionPage->initializeSession(); 


$pageInitial->setVariablePath("../../");
$pageInitial->setTitlePage("Home");
$pageInitial->setPathPage("view/negado/");
$pageInitial->setNamePage("negado", "php");
$pageInitial->execute();


?>
