<?php



$readonly = "readonly";
$senhaRequired= "";
$nomeBotao = "Atualizar";
$formPost = $this->variablePath."controller/listagem/updateDados.php";
include($this->variablePath."view/layout/form/form.php");


unset($_SESSION['usuario']);
?>