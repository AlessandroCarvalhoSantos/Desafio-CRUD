<div class="container-fluid full-height">

            <div class="row">

                <div class="col-md-12 col-lg-7 bg-fundo2 full-height">

                    <div class=" row full-height justify-content-center">
                        <div class="col-9 col-xxl-7 align-self-center text-light text-center justify-content-center">

                            <img src="assets/img/webdecLogoNome.png" alt="" style="width: 450px;">
                            <h1>Seja Bem-Vindo</h1>
                            
                            <p class="text-center">
                                Desenvolvemos soluções integradas para gerar resultados 
                                e simplificar a operação do correspondente bancário.
                            </p>

                            <p>É novo? Então cadastre-se aqui!</p>
                            <a  href="./home/cadastro/" class="btn btn-light">Cadastre-se</a>
                        </div>
                    </div>
                        
                </div>
                <div class="col-md-12 col-lg-5 bg-fundo3 full-height ">
                   
                    <div class="row full-height justify-content-center p-0">

                        <div class="col-9 col-xxl-8 align-self-end">

                            <h1 class="text-center fw-bold text-primary display-5">Login</h1>
                           
                            <p class="text-center lead">Desafio CRUD da WebDec</p>


                            <?php
                                $labelCpf = "";
                                $span = "";
                                $labelSenha = "";
                                $cpf = "";
                                $senha = "";

                                if (isset($_SESSION["error"])) {
                                    if (isset($_SESSION["error"]["CPF"])) {
                                        $labelCpf  = ' border border-danger';
                                        $span = '<div class="bg-danger w-100 text-center text-light p-2">' . $_SESSION["error"]["CPF"] . '</div>';
                                    }

                                    if (isset($_SESSION["error"]["SENHA"])) {
                                        $labelSenha = ' border border-danger';
                                        $span = '<div class="bg-danger w-100 text-center text-light p-2">' . $_SESSION["error"]["SENHA"] . '</div>';
                                    }
                                    unset($_SESSION['error']);
                                }

                                if (isset($_SESSION['SENHA'])) {
                                    $senha = 'value="' . $_SESSION['SENHA'] . '"';
                                }

                                if (isset($_SESSION['CPF'])) {
                                    $cpf = 'value="' . $_SESSION['CPF'] . '"';
                                }
                            ?>
                        
                            <form method="post" action="./controller/login/verificacao.php">


                                <div class="my-2 bg-gray d-flex p-1 <?php echo $labelCpf ?>" >
                                    
                                    <label class="text-secondary">
                                        <i class="fas fa-user m-2"></i>CPF&nbsp;
                                    </label>

                                    <input name="CPF" type="text" class="border-0 out-none bg-gray flex-grow-1" oninput="cpfMask(this)" <?php echo $cpf ?> required>
                                </div>

                                <div class="my-2 bg-gray d-flex p-1 <?php echo $labelSenha ?>" >
                                
                                    <label class="text-secondary">
                                        <i class="fas fa-lock m-2" ></i>Senha&nbsp;
                                    </label>
                                    <input type="password" name="SENHA" class="border-0 out-none  bg-gray flex-grow-1" oninput="string(this)" <?php echo $senha ?> required >
                                    <i id="S1" class="fas fa-eye-slash _icon-modify _not-vision-password p-2 m-0" onclick="showPassword('SENHA','S1','S2')" ></i>
                                    <i id="S2" class="fas fa-eye _icon-modify _vision-password p-2 m-0" onclick="showPassword('SENHA','S1','S2')"></i>

                                </div>


                                <?php
                                    echo $span;
                                    unset($_SESSION['CPF']);
                                    unset($_SESSION['SENHA']);
                                ?>
                           
                        
                                <div class="row justify-content-center">
                                    <a  href="./home/Senha/" class="text-center text-decoration-none pt-2 text-secondary w-100">Esqueceu sua senha?</a>
                                </div>

                                <br>
                

                                <div class="row justify-content-center">
                                    <button type="submit" class="btn btn-primary col-4 m-1">Login</button>
                                </div>
                            </form>
                        </div>

                      
                        <div style="font-size: 12px;" class="lead col-12 text-center align-self-end  m-1">
                            &copy; Alessandro Carvalho Santos
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>