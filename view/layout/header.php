<nav class="navbar navbar-expand-md navbar-dark bg-dark" id="PageHeaderAdm">
    <div class="container-fluid">

        <img class="navbar-brand" src="<?=$this->variablePath."assets/img/webdecLogoNome.png"?>" style="width:100px;">

        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNavbar">
            <span class="fas fa-bars"></span>
        </button>

        <div class="navbar-collapse collapse" id="collapseNavbar">
           
            <ul class="navbar-nav ms-auto ">

                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="<?=$this->variablePath."controller/home/home.php"?>">
                        <i class="fas fa-home"></i></i>&nbsp;Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?=$this->variablePath."controller/listagem/listagem.php"?>"> 
                        <i class="fas fa-list-alt"></i>&nbsp;Listagem
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?=$this->variablePath."controller/cadastro/cadastro.php"?>"> 
                        <i class="fas fa-pen"></i>&nbsp;Cadastro
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="<?=$this->variablePath."controller/configuracoes/configuracoes.php"?>">
                        <i class="fas fa-cog"></i>&nbsp;Configurações
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?=$this->variablePath?>">
                        <i class="fas fa-ban "></i>&nbsp;Sair
                    </a>
                </li>

            </ul>
        </div>

    </div>
</nav>