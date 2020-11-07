<section class="cadastro">
    <?php   include_once("php/user/cadastro_cadastrando.php");   ?>
    <div class="box-cadastro">
        <div class="center">
            <h1>Fazer Cadastro</h1>
            <form action="<?php echo INCLUDE_PATH; ?>cadastrar" method="POST">
                    <input type="text" name="nome" id="nome" class="informacoes" placeholder="Nome Completo" required>
                    <input type="text" name="login" id="usuario" class="informacoes" placeholder="Login" maxlength="20" required>
                    <input type="password" name="senha" id="senha" class="informacoes" placeholder="Senha" maxlength="15" required>
                    <input type="password" name="conf_senha" id="conf_senha" class="informacoes" placeholder="Confirmar Senha" maxlength="15" required>
                    <input type="e-mail" name="e-mail" id="e-mail" class="informacoes" placeholder="E-mail" required>
                    <input type="date" name="aniver" id="aniver" class="informacoes" placeholder="dd/mm/aaaa" required>

                    <select id="escolar" name="escolar" required>
                        <option value="">Escolaridade</option>
                        <?php  include_once("php/user/cadastro_escolaridade.php")?>
                    </select>
                    <select id="rede" name="rede" required>
                        <option value="">Rede</option>
                        <?php  include_once("php/user/cadastro_rede.php")?>
                    </select>
                    
                    <button type="submit" value="Cadastrar" name="submit" id="btn-cadastrar">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</section>
