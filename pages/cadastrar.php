<section class="cadastro">
    <?php   include_once("php/user/cadastro_cadastrando.php");   ?>
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
                        <?php  include_once("php/user/cadastro_escolaridade.php")?>
                    </select>
                </div>
                <div class="text-box">
                    <label for="rede">Rede da sua escola</label><span> *</span>
                    <select id="rede" name="rede" required>
                        <option value="">Rede</option>
                        <?php  include_once("php/user/cadastro_rede.php")?>
                    </select>
                </div>
                
                <br>
                <a href="<?php echo INCLUDE_PATH; ?>pages/login.php">Já tem o seu cadastro?</a>

                <button type="submit" value="Cadastrar">Cadastrar</button>
            </form>
        </div>
    </div>
</section>
