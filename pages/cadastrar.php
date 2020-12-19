<section class="cadastro">

    <?php   
    
        $redes = User::selectTypeNetwork();
        $escolaridades = User::selectSchooling();

        if(!empty($_POST['submit'])){

            $nome = $_POST['nome'];

            $email = $_POST['e-mail'];
            $conf_email = $_POST['conf_e-mail'];

            $senha = $_POST['senha'];
            $conf_senha = $_POST['conf_senha'];

            $aniversario = $_POST['aniver'];
            $escolaridade = $_POST['escolar'];
            $rede = $_POST['rede'];

            if($senha == $conf_senha and $email == $conf_email){

                $infs = User::checkEmail($email);

                $infsUser = $infs[0];
                $infsAdm = $infs[1];
                   
                if(empty($infsUser) and empty($infsAdm)){

                    $confirm = User::registerUsers($nome, $senha, $email, $aniversario, $escolaridade, $rede);

                    if($confirm == 1)
                        echo "<div class='mensagem green'><p>Cadastro feito com sucesso!</p></div>";
                    else
                        echo "<div class='mensagem red'>Houve algum erro em seu cadastro, contate-nos</div>";
                }
                else
                    echo "<div class='mensagem red'><p>Já existe um usuário com essse e-mail</p></div>";
            }else{

                if($email != $conf_email)
                    echo "<div class='mensagem red'>Os campos 'E-mail' e 'Confirmar E-mail' devem ser iguais</div>";
                if($senha != $conf_senha)
                    echo "<div class='mensagem red'>Os campos 'Senha' e 'Confirmar Senha' devem ser iguais</div>";
            }
        }
    ?>

    <div class="box">
        <div class="center">
            <h1>Crie sua conta</h1>
            <form action="<?php echo INCLUDE_PATH; ?>cadastrar" method="POST">
                <div class="text-box">
                    <label for="nome">Nome Completo</label><span> *</span>
                    <input type="text" name="nome" id="nome" class="informacoes" required>
                </div>
                <div class="text-box">
                    <label for="login">Usuário</label><span> *</span>
                    <input type="text" name="login" id="login" class="informacoes" maxlength="20" required>
                </div>
                <div class="text-box">
                    <label for="senha">Senha</label><span> *</span>
                    <input type="password" name="senha" id="senha" class="informacoes" placeholder="Senha" maxlength="15" required>
                </div>
                <div class="text-box">
                    <label for="conf_senha">Confirmar senha</label><span> *</span>
                    <input type="password" name="conf_senha" id="conf_senha" class="informacoes" placeholder="Confirmar Senha" maxlength="15" required>
                </div>
                <div class="text-box">
                    <label for="e-mail">E-mail</label><span> *</span>
                    <input type="e-mail" name="e-mail" id="e-mail" class="informacoes" placeholder="E-mail" required>
                </div>
                <div class="text-box">
                    <label for="nasc">Data de nascimento</label><span> *</span>
                    <input type="date" name="aniver" id="nasc" class="informacoes" placeholder="dd/mm/aaaa" required>
                </div>
                <div class="text-box">
                    <label for="escolar">Sua escolaridade</label><span> *</span>
                    <select id="escolar" name="escolar" required>
                        <option value="">Escolaridade</option>
                        <?php  

                            foreach ($escolaridades as $key => $escolaridade)
                                echo"<option value='".$escolaridade['id']."'>".$escolaridade['descricao']."</option>";
                        ?>
                    </select>
                </div>
                <div class="text-box">
                    <label for="rede">Rede da sua escola</label><span> *</span>
                    <select id="rede" name="rede" required>
                        <option value="">Rede</option>
                        <?php  

                            foreach ($redes as $key => $rede)
                                echo"<option value='".$rede['id']."'>".$rede['descricao']."</option>";
                        ?>
                    </select>
                </div>
                
                <br>
                <a href="<?php echo INCLUDE_PATH; ?>pages/login.php" class="link">Já tem o seu cadastro?</a>

                <button type="submit" name="submit" value="Cadastrar">Cadastrar</button>
            </form>
        </div>
    </div>
</section>
