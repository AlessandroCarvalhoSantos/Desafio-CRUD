<?php

$_SESSION['usuario'][0]['cpf'] = vsprintf("%s%s%s.%s%s%s.%s%s%s-%s%s",str_split($_SESSION['usuario'][0]['cpf']));
$_SESSION['usuario'][0]['cep'] = vsprintf("%s%s%s%s%s-%s%s%s",str_split($_SESSION['usuario'][0]['cep']));


echo "<pre>";

print_r($_SESSION['usuario']);

echo "</pre>";






$nomeBotao = "Atualizar";
$formPost = $this->variablePath."controller/listagem/updateDados.php";
include($this->variablePath."view/layout/form/form.php");


unset($_SESSION['usuario']);
?>