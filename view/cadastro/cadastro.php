<?php

    $readonly = "";
    $senhaRequired= "required";
    $nomeBotao = "Cadastrar";
    $formPost = $this->variablePath."controller/cadastro/insercaoCad.php";
    include($this->variablePath."view/layout/form/form.php");

    unset($_SESSION['usuario']);
?>