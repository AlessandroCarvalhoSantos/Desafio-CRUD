<?php

if(isset($_SESSION['usuario'][0]['data_exclusao'])){
    $dtExclusao= $_SESSION['usuario'][0]['data_exclusao'];
}else{
    $dtExclusao="";
}

if(isset($_SESSION['usuario'][0]['data_atualizacao'])){
    $dtAtualizacao= $_SESSION['usuario'][0]['data_atualizacao'];
}else{
    $dtAtualizacao="";
}


if(isset($_SESSION['usuario'][0]['cpf'])){
    $cpf= $_SESSION['usuario'][0]['cpf'];
}else{
    $cpf="";
}



if(isset($_SESSION['usuario'][0]['rg'])){
    $rg= $_SESSION['usuario'][0]['rg'];
}else{
    $rg="";
}

if(isset($_SESSION['usuario'][0]['data_nascimento'])){
    $dtNascimento= $_SESSION['usuario'][0]['data_nascimento'];
}else{
    $dtNascimento="";
}

if(isset($_SESSION['usuario'][0]['data_cadastro'])){
    $dtCadastro= $_SESSION['usuario'][0]['data_cadastro'];
}else{
    $dtCadastro=Date('Y-m-d');
}










?>




<div class=" p-5" style="background-color: rgb(240, 240, 240);">
    
    <form method="POST" class="row g-3" action="<?=$formPost?>">
           
            <div class="col-12  text-center text-md-start">
                <h3 class="m-0 mb-1 pt-2 fw-bold">Cadastrar pessoa</h3>
            </div>

            <input type="date" hidden class="form-control shadow-none"  name="dtAtualizacao" value="<?=$dtAtualizacao?>">
            <input type="date" hidden class="form-control shadow-none"  name="dtExclusao" value="<?=$dtExclusao?>">


    

            <div class="col-md-3">
                <label class="form-label"><b>CPF:</b></label>
                <input type="text" class="form-control shadow-none" oninput="string(this)" name="cpf" maxlength="11" value="<?=$cpf?>" required readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label"><b>RG:</b></label>
                <input type="text" class="form-control shadow-none" oninput="string(this)" name="rg" maxlength="20" require value="<?=$rg?>">
            </div>

            <div class="col-md-3">
                <label  class="form-label"><b>Data de nascimento:</b></label>
                <input type="date" class="form-control shadow-none"  name="dtNasc" require value="<?=$dtNascimento?>">
            </div>

            <div class="col-md-3">
                <label class="form-label"><b>Data de Cadastro:</b></label>
                <input type="date" class="form-control shadow-none"  name="dtNasc" require value="<?=$dtCadastro?>">
            </div>
        
            <div class="col-md-6">
                <label class="form-label"><b>Nome:</b></label>
                <input type="text" class="form-control shadow-none" oninput="string(this)" name="nome" maxlength="50" >
            </div>

            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" class="form-control shadow-none" oninput="string(this)" name="inputEmail" oninput="emailMask(this)" maxlength="100" >
            </div>

            <div class="col-md-6">
                <label class="form-label">Senha:</label>
                <input type="password" class="form-control shadow-none" oninput="string(this)" name="inputPassword" id="inputPassword" minlength=5 maxlength=50>
            </div>
           
            <div class="col-md-6">
                <label class="form-label">Senha (Novamente):</label>
                <input type="password" class="form-control shadow-none" oninput="string(this)" name="inputPassword2" id="inputPassword2" oninput="check(this)" minlength="5" maxlength="50">
            </div>


            <div class="col-md-12">
                <label class="form-label"><b>Estado:</b></label>
                <input type="text" class="form-control shadow-none" oninput="string(this)" name="nome" maxlength="50" >
            </div>

            <div class="col-md-12">
                <label class="form-label"><b>Endereco:</b></label>
                <input type="text" class="form-control shadow-none" oninput="string(this)" name="nome" maxlength="50" >
            </div>

            <div class="col-md-12">
                <label class="form-label"><b>CEP:</b></label>
                <input type="text" class="form-control shadow-none" oninput="string(this)" name="nome" maxlength="50" >
            </div>

            <div class="col-md-12">
                <label class="form-label"><b>Número:</b></label>
                <input type="text" class="form-control shadow-none" oninput="string(this)" name="nome" maxlength="50" >
            </div>

            <?php
                include "telefones.php";
            ?>
    

            <div class="col-12 d-flex justify-content-center">
                <button type="submit" onclick="diseabledButton(this);" class="btn btn-success rounded-pill fw-bold px-5"><?=$nomeBotao?></button>
                <a type="button" class="btn btn-danger rounded-pill fw-bold px-5 ms-4" href="<?=$this->variablePath."controller/home/home.php"?>">Cancelar</a>
            </div>
    
    
        </form>
    </div>