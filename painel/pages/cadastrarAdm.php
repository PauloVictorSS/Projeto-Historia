<?php

    $adms = Adm::getAdms();

?>
<div class="box-content">
    <h1>Cadastrar um Administrador</h1>
    <form action="" method="POST" class="blue">

        <div class="box-category">
            <h2>Administradores já cadastrados</h2>

            <table>
                <tr>
                    <th>Nome</th>
                    <th>Login</th>
                    <th>Cargo</th>
                </tr>
            <?php
                foreach ($adms as $key => $value) { 
            ?>
                <tr>        
                    <td><?php echo $value["nome"]; ?></td>
                    <td><?php echo $value["login"]; ?></td>
                    <td><?php echo Adm::getOffice($value["type"]); ?></td>
                </tr>   

            <?php } ?>

            </table>
        </div>

        <div class="box-category">
            <h2>Cadastrar um Administrador</h2>

            <input type="text" name="alter_a" placeholder="Nome" required><span> *</span>
            <input type="password" name="alter_a" placeholder="Login" required><span> *</span>
            <input type="password" name="alter_a" placeholder="Senha" required><span> *</span>
            <input type="text" name="alter_a" placeholder="Confirmar a senha" required><span> *</span>

        </div>

        <div class="buttons">
            <p>* Preenchimento Obrigatório</p>
            <button type="submit" value="1"  name="action1">Adicionar</button>
        </div>

    </form>
</div>