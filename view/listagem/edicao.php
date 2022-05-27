<?php




echo "<pre>";

print_r($_SESSION['usuario']);

echo "</pre>";






$nomeBotao = "Atualizar";
$formPost = $this->variablePath."controller/listagem/updateDados.php";
include($this->variablePath."view/layout/form/form.php");


unset($_SESSION['usuario']);
?>