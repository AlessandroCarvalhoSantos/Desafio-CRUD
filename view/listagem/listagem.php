<div class="container-lg p-0 pb-0">

    <h1 class="text-center my-5">Listagem de Pessoas Cadastradas</h1>

    <div class="table-responsive">
        <table class="table m-0 table-bordered text-center table-striped">

            <?php
                include_once "tableHeader.php";
                include_once "tableBody.php";
            ?>

        </table> 
    </div>
</div>

<?php
    unset($_SESSION['dadosUsers']);
?>