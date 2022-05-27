negado

<?php

require_once __DIR__."/../../vendor/autoload.php";

use Model\ClassManagementSession\ManagementSession;



 
    $sessionPage = new ManagementSession();
    $sessionPage->initializeSession();
 

echo '<pre>';
print_r($_SESSION);
echo '</pre>'



?>